<?php

namespace App\Command;

use App\Entity\Donation\Cause;
use App\Entity\Donation\ImageCause;
use App\Enum\Donation\StatutCause;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:seed-causes',
    description: 'Ajoute des causes de test pour les donnations',
)]
class SeedCausesCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $causesData = [
            [
                'titre' => 'Aide aux patients cancéreux',
                'description' => 'Soutenez les patients atteints de cancer en finançant leurs traitements coûteux et en améliorant leur confort de vie pendant la chimiothérapie.',
                'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=800&q=80',
                'objectif' => 50000
            ],
            [
                'titre' => 'Équipement pour pédiatrie',
                'description' => 'Nous collectons des fonds pour l\'achat de nouveaux incubateurs et de matériel médical spécialisé pour notre service de néonatalogie.',
                'image' => 'https://images.unsplash.com/photo-1581594632702-fbd8b494133a?auto=format&fit=crop&w=800&q=80',
                'objectif' => 25000
            ],
            [
                'titre' => 'Clinique mobile rurale',
                'description' => 'Aidez-nous à financer une clinique mobile pour apporter des soins médicaux de base aux populations vivant dans les zones rurales reculées.',
                'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=800&q=80',
                'objectif' => 100000
            ],
            [
                'titre' => 'Lutte contre le SIDA',
                'description' => 'Financement des programmes de dépistage, de sensibilisation et d\'accès aux traitements antirétroviraux pour les personnes touchées par le VIH/SIDA.',
                'image' => 'https://images.unsplash.com/photo-1532187875605-7fe3584d0ee5?auto=format&fit=crop&w=800&q=80',
                'objectif' => 60000
            ],
            [
                'titre' => 'Prévention du cancer du sein',
                'description' => 'Campagnes de mammographie gratuite et sensibilisation à l\'autodépistage pour réduire la mortalité liée au cancer du sein.',
                'image' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=800&q=80',
                'objectif' => 45000
            ],
            [
                'titre' => 'Soutien à la santé mentale',
                'description' => 'Mise en place de lignes d\'écoute et de centres de consultation psychologique gratuits pour les personnes en situation de détresse mentale.',
                'image' => 'https://images.unsplash.com/photo-1527137342181-19aab11a8ee1?auto=format&fit=crop&w=800&q=80',
                'objectif' => 35000
            ]
        ];

        foreach ($causesData as $data) {
            // Vérifier si la cause existe déjà pour éviter les doublons
            $existingCause = $this->entityManager->getRepository(Cause::class)->findOneBy(['titre' => $data['titre']]);
            if ($existingCause) {
                continue;
            }

            $cause = new Cause();
            $cause->setTitre($data['titre']);
            $cause->setDescription($data['description']);
            $cause->setObjectifMontant($data['objectif']);
            $cause->setDateDebut(new \DateTimeImmutable());
            $cause->setStatut(StatutCause::ACTIVE);

            $image = new ImageCause();
            $image->setUrlImage($data['image']);
            $image->setCause($cause);

            $this->entityManager->persist($cause);
            $this->entityManager->persist($image);
        }

        $this->entityManager->flush();

        $io->success('Les causes de test ont été ajoutées ou mises à jour avec succès.');

        return Command::SUCCESS;
    }
}
