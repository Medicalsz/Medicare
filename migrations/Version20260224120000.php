<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260224120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rendez-vous: report propose par medecin en attente de validation patient';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE rendez_vous ADD proposed_date DATE DEFAULT NULL, ADD proposed_heure TIME DEFAULT NULL, ADD report_pending_patient_response TINYINT(1) DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE rendez_vous DROP proposed_date, DROP proposed_heure, DROP report_pending_patient_response');
    }
}
