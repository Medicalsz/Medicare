<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260211171712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_medecin (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, specialite VARCHAR(255) NOT NULL, cabinet VARCHAR(255) NOT NULL, adresse VARCHAR(500) NOT NULL, bio LONGTEXT DEFAULT NULL, certificats VARCHAR(500) DEFAULT NULL, statut VARCHAR(255) NOT NULL, date_demande DATETIME NOT NULL, date_traitement DATETIME DEFAULT NULL, raison_rejet LONGTEXT DEFAULT NULL, INDEX IDX_2B2DE869A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_medecin ADD CONSTRAINT FK_2B2DE869A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_medecin DROP FOREIGN KEY FK_2B2DE869A76ED395');
        $this->addSql('DROP TABLE demande_medecin');
    }
}
