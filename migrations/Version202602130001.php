<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version202602130001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add ville, delegation, prixConsultation, and isOnline fields to Medecin';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin ADD ville VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD delegation VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD prix_consultation DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin ADD is_online BOOLEAN DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin DROP ville');
        $this->addSql('ALTER TABLE medecin DROP delegation');
        $this->addSql('ALTER TABLE medecin DROP prix_consultation');
        $this->addSql('ALTER TABLE medecin DROP is_online');
    }
}
