<?php

namespace App\Controller\Donation;

use App\Entity\Donation\Don;
use App\Entity\Donation\Donateur;
use App\Entity\Donation\Cause;
use App\Enum\Donation\TypeDon;
use App\Enum\Donation\ModePaiement;
use App\Enum\Donation\StatutDon;
use App\Enum\Donation\StatutCause;
use App\Entity\Donation\ObjetDon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class DonationController extends AbstractController
{
    #[Route('/mes-dons', name: 'app_user_donations')]
    public function myDonations(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        $user = $this->getUser();
        $dons = [];
        
        // On récupère tous les dons via les entités Donateur liées à l'utilisateur
        foreach ($user->getDonateurs() as $donateur) {
            foreach ($donateur->getDons() as $don) {
                $dons[] = $don;
            }
        }

        // Tri par date décroissante
        usort($dons, fn($a, $b) => $b->getDateDon() <=> $a->getDateDon());

        return $this->render('donation/my_donations.html.twig', [
            'dons' => $dons,
        ]);
    }

    #[Route('/mes-dons/modifier-materiel/{id}', name: 'app_user_donation_edit_material', methods: ['POST'])]
    public function editMaterialDonation(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $don = $entityManager->getRepository(Don::class)->find($id);

        if (!$don || $don->getTypeDon() !== TypeDon::MATERIEL) {
            return $this->json(['success' => false, 'message' => 'Don introuvable ou type incorrect.'], 404);
        }

        // Vérification de sécurité : le don appartient bien à l'utilisateur connecté
        $isOwner = false;
        foreach ($this->getUser()->getDonateurs() as $donateur) {
            if ($don->getDonateur() === $donateur) {
                $isOwner = true;
                break;
            }
        }

        if (!$isOwner) {
            return $this->json(['success' => false, 'message' => 'Accès refusé.'], 403);
        }

        /* Commenté temporairement pour permettre la modification même si confirmé
        if ($don->getStatutDon() !== StatutDon::EN_ATTENTE) {
            return $this->json(['success' => false, 'message' => 'Un don déjà confirmé ou annulé ne peut plus être modifié.'], 400);
        }
        */

        $data = json_decode($request->getContent(), true);
        if (!$data || !isset($data['objets'])) {
            return $this->json(['success' => false, 'message' => 'Données invalides.'], 400);
        }

        // Supprimer les anciens objets non présents dans la nouvelle liste
        $newObjectIds = array_filter(array_column($data['objets'], 'id'));
        foreach ($don->getObjets() as $oldObjet) {
            if (!in_array($oldObjet->getId(), $newObjectIds)) {
                $entityManager->remove($oldObjet);
            }
        }

        // Mettre à jour ou ajouter les objets
        $descriptionParts = [];
        $totalQty = 0;
        foreach ($data['objets'] as $item) {
            $qty = (int)$item['quantite'];
            $totalQty += $qty;
            
            $desc = $item['nom'] . ' (x' . $qty . ')';
            $descriptionParts[] = $desc;

            if (isset($item['id']) && $item['id']) {
                // Mise à jour
                $objet = $entityManager->getRepository(ObjetDon::class)->find($item['id']);
                if ($objet && $objet->getDon() === $don) {
                    $objet->setNomObjet($item['nom']);
                    $objet->setQuantite($qty);
                }
            } else {
                // Nouvel objet
                $objet = new ObjetDon();
                $objet->setNomObjet($item['nom']);
                $objet->setQuantite($qty);
                $objet->setDescription('Ajouté via modification');
                $objet->setDon($don);
                $entityManager->persist($objet);
            }
        }

        // Mettre à jour les données globales du Don
        $don->setDescription('Don de : ' . implode(', ', $descriptionParts));
        $don->setMontant((float)$totalQty);
        
        $entityManager->flush();

        return $this->json(['success' => true, 'message' => 'Don mis à jour avec succès !']);
    }

    #[Route('/donnation/confirm-pickup/{id}', name: 'app_donation_confirm_pickup', methods: ['POST'])]
    public function confirmPickup(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $don = $entityManager->getRepository(Don::class)->find($id);
        
        if (!$don) {
            return $this->json(['success' => false, 'message' => 'Don introuvable.'], 404);
        }

        $adresse = $request->request->get('adresse');
        
        if (!$adresse && $don->getTypeDon() === TypeDon::MATERIEL) {
            return $this->json(['success' => false, 'message' => 'L\'adresse est requise.'], 400);
        }

        if ($don->getTypeDon() === TypeDon::ARGENT) {
            $don->setAdresse('pas d\'adresse');
        } else {
            $don->setAdresse($adresse);
        }

        $don->setIsPickupAddressConfirmed(true);
        $entityManager->flush();

        return $this->json(['success' => true]);
    }

    #[Route('/donnation', name: 'app_donation_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $causes = $entityManager->getRepository(Cause::class)->findBy([
            'statut' => StatutCause::ACTIVE
        ]);

        return $this->render('donation/index.html.twig', [
            'causes' => $causes,
        ]);
    }

    #[Route('/donnation/{id}', name: 'app_donation_show')]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $cause = $entityManager->getRepository(Cause::class)->find($id);

        if (!$cause) {
            throw $this->createNotFoundException('La cause demandée n\'existe pas.');
        }

        // On s'assure que l'objectif est fixé à 10000 DT comme demandé
        $objectif = 10000;
        
        // Calcul du montant total des dons d'argent confirmés (pour la barre de progression)
        $montantCollecte = 0;
        foreach ($cause->getDons() as $don) {
            // Comparaison simplifiée au maximum par les valeurs brutes stockées en base
            $statut = $don->getStatutDon();
            $type = $don->getTypeDon();
            
            // On récupère la valeur string de l'enum pour éviter tout souci d'objet
            $statutStr = ($statut instanceof \BackedEnum) ? $statut->value : (string)$statut;
            $typeStr = ($type instanceof \BackedEnum) ? $type->value : (string)$type;

            if ($statutStr === 'confirmé' && $typeStr === 'argent') {
                $montantCollecte += (float)$don->getMontant();
            }
        }

        $pourcentage = ($objectif > 0) ? min(100, ($montantCollecte / $objectif) * 100) : 0;

        return $this->render('donation/show.html.twig', [
            'cause' => $cause,
            'objectif' => $objectif,
            'montantCollecte' => $montantCollecte,
            'pourcentage' => $pourcentage,
        ]);
    }

    #[Route('/donnation/{id}/faire-un-don', name: 'app_donation_form', methods: ['GET', 'POST'])]
    public function form(int $id, Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $cause = $entityManager->getRepository(Cause::class)->find($id);

        if (!$cause) {
            throw $this->createNotFoundException('La cause demandée n\'existe pas.');
        }

        $errors = [];

        if ($request->isMethod('POST')) {
            $donationType = $request->request->get('donation_type');
            $description = $request->request->get('description');
            $adresse = $request->request->get('adresse');
            $amount = $request->request->get('amount');
            $cardNumber = str_replace(' ', '', $request->request->get('card_number', ''));
            $cardType = $request->request->get('card_type');
            $materialCount = $request->request->get('material_count', 1);
            
            // 1. Validation manuelle des champs spécifiques (Carte bancaire ou Matériel)
            if ($donationType === 'money') {
                $constraints = new Assert\Collection([
                    'card_number' => [
                        new Assert\NotBlank(message: 'Veuillez saisir votre numéro de carte bancaire.'),
                        new Assert\Regex(
                            pattern: '/^[0-9]+$/',
                            message: 'Le numéro de carte ne doit contenir que des chiffres.'
                        ),
                        new Assert\Length(
                            min: 16,
                            max: 16,
                            exactMessage: 'Le numéro de carte doit comporter exactement {{ limit }} chiffres.'
                        )
                    ],
                    'amount' => [
                        new Assert\NotBlank(message: 'Le montant est requis pour un don d\'argent.'),
                        new Assert\Type(type: 'numeric', message: 'Le montant doit être une valeur numérique.'),
                        new Assert\Positive(message: 'Le montant doit être un nombre positif (ex: 50.00).')
                    ],
                    'card_type' => [
                        new Assert\NotBlank(message: 'Veuillez sélectionner le type de votre carte (Visa ou Mastercard).')
                    ],
                    'donation_type' => new Assert\Optional(),
                    'description' => new Assert\Optional(),
                ]);

                $inputData = [
                    'card_number' => $cardNumber,
                    'amount' => $amount,
                    'card_type' => $cardType,
                    'donation_type' => $donationType,
                    'description' => $description,
                ];

                $violations = $validator->validate($inputData, $constraints);
                if (count($violations) > 0) {
                    foreach ($violations as $violation) {
                        $propertyPath = str_replace(['[', ']'], '', $violation->getPropertyPath());
                        $errors[$propertyPath] = $violation->getMessage();
                    }
                }
            } elseif ($donationType === 'material') {
                $materialData = [];
                $materialConstraintsFields = [];

                for ($i = 0; $i < $materialCount; $i++) {
                    $materialData["objet_nom_$i"] = $request->request->get("objet_nom_$i");
                    $materialData["objet_qty_$i"] = $request->request->get("objet_qty_$i");

                    $materialConstraintsFields["objet_nom_$i"] = [
                        new Assert\NotBlank(message: 'Veuillez nommer cet objet.'),
                        new Assert\Length(min: 3, minMessage: 'Le nom est trop court.')
                    ];
                    $materialConstraintsFields["objet_qty_$i"] = [
                        new Assert\NotBlank(message: 'Indiquez la quantité.'),
                        new Assert\Positive(message: 'La quantité doit être supérieure à 0.')
                    ];
                }

                $constraints = new Assert\Collection([
                    'fields' => $materialConstraintsFields,
                    'allowExtraFields' => true
                ]);

                $violations = $validator->validate($materialData, $constraints);
                if (count($violations) > 0) {
                    foreach ($violations as $violation) {
                        $propertyPath = str_replace(['[', ']'], '', $violation->getPropertyPath());
                        $errors[$propertyPath] = $violation->getMessage();
                    }
                }
            }

            // 2. Validation de l'entité Don
            $don = new Don();
            $don->setCause($cause);
            $don->setDescription($description ?? '');
            $don->setDateDon(new \DateTimeImmutable());
            
            if ($donationType === 'money') {
                $don->setTypeDon(TypeDon::ARGENT);
                $don->setMontant((float)$amount);
                $don->setModePaiement(ModePaiement::CARTE);
                // Les dons d'argent sont automatiquement confirmés car le paiement est fait par carte
                $don->setStatutDon(StatutDon::CONFIRME);
                // On met l'adresse à "pas d'adresse" par défaut pour l'argent
                $don->setAdresse('pas d\'adresse');
                $don->setIsPickupAddressConfirmed(true);
            } else {
                $don->setTypeDon(TypeDon::MATERIEL);
                
                // Calcul du montant comme somme des quantités d'objets
                $totalQty = 0;
                for ($i = 0; $i < $materialCount; $i++) {
                    $qty = (int)$request->request->get("objet_qty_$i", 0);
                    $totalQty += $qty;
                    
                    if (!empty($request->request->get("objet_nom_$i"))) {
                        $objet = new ObjetDon();
                        $objet->setNomObjet($request->request->get("objet_nom_$i"));
                        $objet->setQuantite($qty);
                        $objet->setDescription("Objet de donation matériel");
                        $don->addObjet($objet);
                    }
                }
                
                $don->setMontant((float)$totalQty);
                $don->setModePaiement(ModePaiement::MATERIEL);
                // Les dons matériels restent en attente de validation admin
                $don->setStatutDon(StatutDon::EN_ATTENTE);
            }

            $entityViolations = $validator->validate($don);
            if (count($entityViolations) > 0) {
                foreach ($entityViolations as $violation) {
                    $errors[$violation->getPropertyPath()] = $violation->getMessage();
                }
            }

            // S'il n'y a pas d'erreurs, on procède à l'enregistrement
            if (empty($errors)) {
                // On récupère l'utilisateur connecté s'il existe
                $user = $this->getUser();
                $donateur = null;

                if ($user) {
                    $donateur = $entityManager->getRepository(Donateur::class)->findOneBy(['email' => $user->getEmail()]);
                    if (!$donateur) {
                        $donateur = new Donateur();
                        $donateur->setNom($user->getNom());
                        $donateur->setPrenom($user->getPrenom());
                        $donateur->setEmail($user->getEmail());
                        $donateur->setAdresse($user->getAdresse() ?? 'Non spécifiée');
                        $donateur->setTelephone($user->getNumero() ?? '00000000');
                        $donateur->setUser($user);
                        $entityManager->persist($donateur);
                    } else if (!$donateur->getUser()) {
                        $donateur->setUser($user);
                    }
                } else {
                    $donateur = $entityManager->getRepository(Donateur::class)->findOneBy(['email' => 'visiteur@medicare.tn']);
                    if (!$donateur) {
                        $donateur = new Donateur();
                        $donateur->setNom('Visiteur');
                        $donateur->setPrenom('Anonyme');
                        $donateur->setEmail('visiteur@medicare.tn');
                        $donateur->setAdresse('Tunis');
                        $donateur->setTelephone('00000000');
                        $entityManager->persist($donateur);
                    }
                }
                
                $don->setDonateur($donateur);
                $entityManager->persist($don);
                $entityManager->flush();

                $this->addFlash('success', 'Merci pour votre générosité ! Votre don a été enregistré.');
                return $this->redirectToRoute('app_donation_show', ['id' => $id]);
            }
        }

        return $this->render('donation/form.html.twig', [
            'cause' => $cause,
            'errors' => $errors,
            'old_data' => $request->request->all()
        ]);
    }

    #[Route('/admin/donations/pdf', name: 'app_admin_donations_pdf')]
    public function exportPdf(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $donsArgent = $entityManager->getRepository(Don::class)->findBy(['typeDon' => TypeDon::ARGENT], ['dateDon' => 'DESC']);
        $donsMateriel = $entityManager->getRepository(Don::class)->findBy(['typeDon' => TypeDon::MATERIEL], ['dateDon' => 'DESC']);

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($pdfOptions);

        $html = $this->renderView('admin/donations_pdf.html.twig', [
            'donsArgent' => $donsArgent,
            'donsMateriel' => $donsMateriel,
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="liste_donations.pdf"'
        ]);
    }
}
