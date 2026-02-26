<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260226230000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rendez-vous: masquage patient/medecin dans les listes';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE rendez_vous ADD hidden_by_patient TINYINT(1) DEFAULT 0 NOT NULL, ADD hidden_by_medecin TINYINT(1) DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE rendez_vous DROP hidden_by_patient, DROP hidden_by_medecin');
    }
}

