<?php

namespace App\DataFixtures;

use App\Entity\Partnership\Collaboration;
use App\Entity\Partnership\Partner;
use App\Enum\Partnership\StatutCollaboration;
use App\Enum\Partnership\StatutPartenaire;
use App\Enum\Partnership\TypePartenaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Create 10 Partners
        $partners = [];
        for ($i = 0; $i < 10; $i++) {
            $partner = new Partner();
            $partner->setName($faker->company);
            $partner->setAdresse($faker->address);
            $partner->setTelephone($faker->phoneNumber);
            $partner->setEmail($faker->companyEmail);
            
            $date = $faker->dateTimeThisDecade;
            $immutableDate = \DateTimeImmutable::createFromMutable($date);
            $partner->setDatePartenariat($immutableDate);

            $partner->setTypePartenaire($faker->randomElement(TypePartenaire::cases()));
            $partner->setStatut($faker->randomElement(StatutPartenaire::cases()));
            $manager->persist($partner);
            $partners[] = $partner;
        }

        // Create 10 Collaborations
        for ($i = 0; $i < 10; $i++) {
            $collaboration = new Collaboration();
            $collaboration->setTitre($faker->sentence(4));
            $collaboration->setDescription($faker->paragraph);

            $dateDebut = \DateTimeImmutable::createFromMutable($faker->dateTimeThisYear);
            $collaboration->setDateDebut($dateDebut);

            $dateFin = \DateTimeImmutable::createFromMutable($faker->dateTimeBetween('+1 month', '+2 years'));
            $collaboration->setDateFin($dateFin);
            
            $collaboration->setStatut($faker->randomElement(StatutCollaboration::cases()));
            $collaboration->setPartner($faker->randomElement($partners));
            $manager->persist($collaboration);
        }

        $manager->flush();
    }
}
