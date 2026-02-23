<?php

namespace App\Controller;

use App\Entity\Don;
use App\Entity\Donateur;
use App\Entity\Cause;
use App\Entity\Badge;
use App\Enum\TypeDon;
use App\Enum\ModePaiement;
use App\Enum\StatutDon;
use App\Enum\StatutCause;
use App\Entity\ObjetDon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Dompdf\Dompdf;
use Dompdf\Options;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Psr\Log\LoggerInterface;

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

    #[Route('/api/assistant/top-causes', name: 'api_assistant_top_causes', methods: ['GET'])]
    public function getTopCauses(EntityManagerInterface $entityManager): JsonResponse
    {
        $causes = $entityManager->getRepository(Cause::class)->findAll();
        
        $causesData = [];
        foreach ($causes as $cause) {
            // On ne prend que les causes actives et non terminées
            if ($cause->getStatut() === StatutCause::ACTIVE) {
                $objectif = $cause->getObjectifMontant() ?? 0;
                $actuel = $cause->getMontantActuel() ?? 0;
                $manque = $objectif - $actuel;
                
                if ($manque > 0) {
                    $causesData[] = [
                        'id' => $cause->getId(),
                        'titre' => $cause->getTitre(),
                        'objectif' => $objectif,
                        'actuel' => $actuel,
                        'manque' => $manque
                    ];
                }
            }
        }
        
        // Trier par manque décroissant (les plus loin de l'objectif en premier)
        usort($causesData, function ($a, $b) {
            return $b['manque'] <=> $a['manque'];
        });
        
        // Prendre les 3 premiers
        $top3 = array_slice($causesData, 0, 3);
        
        return $this->json($top3);
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

    #[Route('/donnation/{id}', name: 'app_donation_show', requirements: ['id' => '\d+'])]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $cause = $entityManager->getRepository(Cause::class)->find($id);

        if (!$cause) {
            throw $this->createNotFoundException('La cause demandée n\'existe pas.');
        }

        // On utilise l'objectif défini dans la cause, ou une valeur par défaut si non défini
        $objectif = $cause->getObjectifMontant() ?? 10000;
        
        // On utilise le montant actuel stocké dans la cause
        $montantCollecte = $cause->getMontantActuel() ?? 0.0;
        
        // Si le montant actuel n'est pas encore initialisé, on peut le recalculer pour être sûr (optionnel mais prudent)
        if ($montantCollecte == 0) {
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
            // On sauvegarde le calcul si c'était 0
            if ($montantCollecte > 0) {
                $cause->setMontantActuel($montantCollecte);
                $entityManager->flush();
            }
        }

        $pourcentage = ($objectif > 0) ? min(100, ($montantCollecte / $objectif) * 100) : 0;

        // --- Logique Badge Utilisateur ---
        $user = $this->getUser();
        $userBadge = null;

        if ($user) {
            $donateurs = $user->getDonateurs();
            $totalDonationsUser = 0;

            // 1. Calculer la somme totale de tous les dons d'argent confirmés de l'utilisateur (tous ses profils donateur confondus)
            foreach ($donateurs as $donateur) {
                foreach ($donateur->getDons() as $don) {
                    $type = $don->getTypeDon();
                    $statut = $don->getStatutDon();
                    
                    $typeStr = ($type instanceof \BackedEnum) ? $type->value : (string)$type;
                    $statutStr = ($statut instanceof \BackedEnum) ? $statut->value : (string)$statut;
                    
                    // On ne compte que les dons d'argent confirmés
                    if ($typeStr === 'argent' && $statutStr === 'confirmé') {
                        $totalDonationsUser += $don->getMontant();
                    }
                }
            }

            // 2. Déterminer le badge correspondant
            $newBadge = null;
            if ($totalDonationsUser >= 100000) {
                $newBadge = 'diamond';
            } elseif ($totalDonationsUser >= 50000) {
                $newBadge = 'platine';
            } elseif ($totalDonationsUser >= 10000) {
                $newBadge = 'emeraude';
            } elseif ($totalDonationsUser >= 5000) {
                $newBadge = 'or';
            } elseif ($totalDonationsUser >= 1000) {
                $newBadge = 'argent';
            } elseif ($totalDonationsUser >= 100) {
                $newBadge = 'bronze';
            }

            // 3. Mettre à jour le badge pour tous les profils donateur de l'utilisateur
            $badgeRepo = $entityManager->getRepository(Badge::class);
            
            if ($newBadge) {
                $userBadge = $newBadge;
                foreach ($donateurs as $donateur) {
                    $badgeEntity = $badgeRepo->findOneBy(['donateur' => $donateur]);
                    
                    if (!$badgeEntity) {
                        $badgeEntity = new Badge();
                        $badgeEntity->setDonateur($donateur);
                    }
                    
                    if ($badgeEntity->getBadge() !== $newBadge) {
                        $badgeEntity->setBadge($newBadge);
                        $entityManager->persist($badgeEntity);
                    }
                }
                $entityManager->flush();
            } else {
                // Si pas de nouveau badge calculé (ex: < 100), on regarde s'il y en a un existant
                foreach ($donateurs as $donateur) {
                    $existingBadge = $badgeRepo->findOneBy(['donateur' => $donateur]);
                    if ($existingBadge) {
                        $userBadge = $existingBadge->getBadge();
                        break;
                    }
                }
            }
        }

        $badgeExtension = 'png'; // Default
        if ($userBadge) {
            $badgeExtensions = [
                'bronze' => 'png',
                'argent' => 'png',
                'or' => 'png',
                'emeraude' => 'jpg',
                'platine' => 'jpg',
                'diamond' => 'jpg',
            ];
            $badgeExtension = $badgeExtensions[$userBadge] ?? 'png';
        }

        return $this->render('donation/show.html.twig', [
            'cause' => $cause,
            'objectif' => $objectif,
            'montantCollecte' => $montantCollecte,
            'pourcentage' => $pourcentage,
            'userBadge' => $userBadge,
            'badgeExtension' => $badgeExtension,
        ]);
    }

    #[Route('/donnation/send-code', name: 'app_donation_send_code', methods: ['POST'])]
    public function sendVerificationCode(Request $request, MailerInterface $mailer, LoggerInterface $logger): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Vous devez être connecté.'], 403);
        }

        $email = $user->getEmail();
        if (!$email) {
            return $this->json(['success' => false, 'message' => 'Aucune adresse email trouvée pour ce compte.'], 400);
        }

        // Log via LoggerInterface
        $dsn = $_SERVER['MAILER_DSN'] ?? getenv('MAILER_DSN') ?? 'Non défini';
        $logger->critical("Tentative d'envoi de code à : " . $email);
        $logger->critical("DSN utilisé : " . $dsn);

        // Générer un code à 6 chiffres
        $code = (string)random_int(100000, 999999);
        
        // Stocker en session
        $session = $request->getSession();
        $session->set('donation_verification_code', $code);
        $session->set('donation_verification_expiry', time() + 600); // 10 minutes

        try {
            $emailMessage = (new Email())
                ->from('samermfarrej@gmail.com')
                ->to($email)
                ->subject('Code de vérification - Don Medicare')
                ->html("
                    <div style='font-family: Arial, sans-serif; color: #333;'>
                        <h2>Confirmation de votre don</h2>
                        <p>Bonjour {$user->getPrenom()},</p>
                        <p>Vous avez initié un don important. Pour confirmer cette transaction, veuillez utiliser le code ci-dessous :</p>
                        <div style='background-color: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center; margin: 20px 0;'>
                            <span style='font-size: 24px; font-weight: bold; color: #0d6efd; letter-spacing: 2px;'>{$code}</span>
                        </div>
                        <p>Ce code est valable pendant 10 minutes.</p>
                        <p>Merci pour votre générosité !</p>
                        <hr>
                        <small>Si vous n'êtes pas à l'origine de cette demande, veuillez ignorer cet email.</small>
                    </div>
                ");

            $mailer->send($emailMessage);
        } catch (\Throwable $e) {
            // En cas d'erreur (ex: pas de config SMTP), on renvoie une erreur
            return $this->json(['success' => false, 'message' => 'Erreur d\'envoi email: ' . $e->getMessage()], 500);
        }

        return $this->json(['success' => true, 'message' => 'Un code de vérification a été envoyé à ' . $email]);
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
                // --- Validation du code pour les gros montants ---
                if ((float)$amount > 10000) {
                    $userCode = $request->request->get('verification_code');
                    $session = $request->getSession();
                    $storedCode = $session->get('donation_verification_code');
                    $expiry = $session->get('donation_verification_expiry');

                    if (empty($userCode)) {
                        $errors['verification_code'] = 'La vérification est requise pour les dons > 10 000 DT.';
                    } elseif (!$storedCode) {
                         // Session expirée ou code non généré
                         $errors['verification_code'] = 'Session expirée ou code introuvable. Veuillez demander un nouveau code.';
                    } elseif ($storedCode !== $userCode) {
                        $errors['verification_code'] = 'Code de vérification incorrect. (Attendu: ' . $storedCode . ', Reçu: ' . $userCode . ')'; // Debug info added temporarily
                    } elseif (time() > $expiry) {
                        $errors['verification_code'] = 'Code expiré. Veuillez en demander un nouveau.';
                    } else {
                        // Code valide, on nettoie la session pour éviter la réutilisation
                        $session->remove('donation_verification_code');
                        $session->remove('donation_verification_expiry');
                    }
                }

                $constraints = new Assert\Collection([
                    'card_number' => [
                        new Assert\NotBlank(['message' => 'Veuillez saisir votre numéro de carte bancaire.']),
                        new Assert\Regex([
                            'pattern' => '/^[0-9]+$/',
                            'message' => 'Le numéro de carte ne doit contenir que des chiffres.'
                        ]),
                        new Assert\Length([
                            'min' => 16,
                            'max' => 16,
                            'exactMessage' => 'Le numéro de carte doit comporter exactement {{ limit }} chiffres.'
                        ])
                    ],
                    'amount' => [
                        new Assert\NotBlank(['message' => 'Le montant est requis pour un don d\'argent.']),
                        new Assert\Type(['type' => 'numeric', 'message' => 'Le montant doit être une valeur numérique.']),
                        new Assert\Positive(['message' => 'Le montant doit être un nombre positif (ex: 50.00).'])
                    ],
                    'card_type' => [
                        new Assert\NotBlank(['message' => 'Veuillez sélectionner le type de votre carte (Visa ou Mastercard).'])
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
                        new Assert\NotBlank(['message' => 'Veuillez nommer cet objet.']),
                        new Assert\Length(['min' => 3, 'minMessage' => 'Le nom est trop court.'])
                    ];
                    $materialConstraintsFields["objet_qty_$i"] = [
                        new Assert\NotBlank(['message' => 'Indiquez la quantité.']),
                        new Assert\Positive(['message' => 'La quantité doit être supérieure à 0.'])
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
            
            // Récupération de la géolocalisation
            $latitude = $request->request->get('latitude');
            $longitude = $request->request->get('longitude');
            if ($latitude && $longitude) {
                $don->setLatitude((float)$latitude);
                $don->setLongitude((float)$longitude);
            }
            
            if ($donationType === 'money') {
                $don->setTypeDon(TypeDon::ARGENT);
                $don->setMontant((float)$amount);
                $don->setModePaiement(ModePaiement::CARTE);
                // Les dons d'argent sont automatiquement confirmés car le paiement est fait par carte
                $don->setStatutDon(StatutDon::CONFIRME);
                // On met l'adresse à "pas d'adresse" par défaut pour l'argent
                $don->setAdresse('pas d\'adresse');
                $don->setIsPickupAddressConfirmed(true);

                // Mise à jour du montant actuel de la cause
                $newMontant = ($cause->getMontantActuel() ?? 0) + (float)$amount;
                $cause->setMontantActuel($newMontant);
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

                        // Gestion de la photo par objet
                        /** @var UploadedFile $photoFile */
                        $photoFile = $request->files->get("objet_photo_$i");
                        if ($photoFile) {
                            $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                            $safeFilename = preg_replace('/[^a-zA-Z0-9]/', '', $originalFilename);
                            $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();

                            try {
                                $photoFile->move(
                                    $this->getParameter('kernel.project_dir') . '/public/uploads/donations',
                                    $newFilename
                                );
                                $objet->setPhoto($newFilename);
                            } catch (FileException $e) {
                                $this->addFlash('error', 'Une erreur est survenue lors de l\'upload de la photo pour l\'objet ' . ($i+1));
                            }
                        }

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
