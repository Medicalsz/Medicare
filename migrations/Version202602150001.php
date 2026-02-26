<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version202602150001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Drop old tables and create admin table';
    }

    public function up(Schema $schema): void
    {
        // Disable foreign key checks
        $this->addSql('SET FOREIGN_KEY_CHECKS = 0');

        // Drop old tables
        $this->addSql('DROP TABLE IF EXISTS consultation');
        $this->addSql('DROP TABLE IF EXISTS demande_medecin');
        $this->addSql('DROP TABLE IF EXISTS disponibilite');
        $this->addSql('DROP TABLE IF EXISTS patient');
        $this->addSql('DROP TABLE IF EXISTS rendez_vous');

        // Re-enable foreign key checks
        $this->addSql('SET FOREIGN_KEY_CHECKS = 1');

        // Create admin table
        $this->addSql('CREATE TABLE admin (
            id INT AUTO_INCREMENT NOT NULL,
            nom VARCHAR(100) NOT NULL,
            prenom VARCHAR(100) NOT NULL,
            email VARCHAR(180) NOT NULL,
            password VARCHAR(255) NOT NULL,
            secret_key VARCHAR(255) DEFAULT NULL,
            online_duration VARCHAR(50) DEFAULT NULL,
            UNIQUE INDEX UNIQ_8D93D649E7927C74 (email),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // Drop admin table
        $this->addSql('DROP TABLE IF EXISTS admin');

        // Re-enable foreign key checks
        $this->addSql('SET FOREIGN_KEY_CHECKS = 1');

        // Recreate old tables (empty)
        $this->addSql('CREATE TABLE consultation (
            id INT AUTO_INCREMENT NOT NULL,
            medecin_id INT NOT NULL,
            date_consultation DATETIME NOT NULL,
            notes LONGTEXT DEFAULT NULL,
            INDEX IDX_964325A7AEF5B5F (medecin_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE demande_medecin (
            id INT AUTO_INCREMENT NOT NULL,
            user_id INT NOT NULL,
            specialite VARCHAR(255) NOT NULL,
            cabinet VARCHAR(255) NOT NULL,
            bio TEXT DEFAULT NULL,
            statut VARCHAR(50) NOT NULL,
            date_demande DATETIME NOT NULL,
            INDEX IDX_5B9022DAA76ED395 (user_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE disponibilite (
            id INT AUTO_INCREMENT NOT NULL,
            medecin_id INT NOT NULL,
            jour_semaine VARCHAR(20) NOT NULL,
            heure_debut TIME NOT NULL,
            heure_fin TIME NOT NULL,
            INDEX IDX_4D72267A7AEF5B5F (medecin_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE patient (
            id INT AUTO_INCREMENT NOT NULL,
            user_id INT NOT NULL,
            date_naissance DATE DEFAULT NULL,
            numero_securite_sociale VARCHAR(50) DEFAULT NULL,
            INDEX IDX_1ADAD7EB1A76ED395 (user_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE rendez_vous (
            id INT AUTO_INCREMENT NOT NULL,
            patient_id INT NOT NULL,
            medecin_id INT NOT NULL,
            date_rendez_vous DATETIME NOT NULL,
            statut VARCHAR(50) NOT NULL,
            notes LONGTEXT DEFAULT NULL,
            INDEX IDX_40C5C8E76B3CA4B (patient_id),
            INDEX IDX_40C5C8E7AEF5B5F (medecin_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }
}
