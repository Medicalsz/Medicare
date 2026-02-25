<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260220021000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(120) NOT NULL, slug VARCHAR(140) NOT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_E7D6FCC16C6E55B5 (nom), UNIQUE INDEX UNIQ_E7D6FCC1989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_medecin ADD specialite_ref_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_medecin ADD CONSTRAINT FK_2B2DE8699DA3180F FOREIGN KEY (specialite_ref_id) REFERENCES specialite (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_2B2DE8699DA3180F ON demande_medecin (specialite_ref_id)');
        $this->addSql('ALTER TABLE medecin ADD specialite_ref_id INT DEFAULT NULL, DROP adresse_cabinet, DROP numero_cabinet, DROP documents');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C69DA3180F FOREIGN KEY (specialite_ref_id) REFERENCES specialite (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_1BDA53C69DA3180F ON medecin (specialite_ref_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_medecin DROP FOREIGN KEY FK_2B2DE8699DA3180F');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C69DA3180F');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP INDEX IDX_1BDA53C69DA3180F ON medecin');
        $this->addSql('ALTER TABLE medecin ADD adresse_cabinet LONGTEXT DEFAULT NULL, ADD numero_cabinet VARCHAR(20) DEFAULT NULL, ADD documents JSON DEFAULT NULL, DROP specialite_ref_id');
        $this->addSql('DROP INDEX IDX_2B2DE8699DA3180F ON demande_medecin');
        $this->addSql('ALTER TABLE demande_medecin DROP specialite_ref_id');
    }
}
