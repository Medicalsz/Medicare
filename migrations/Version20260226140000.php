<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260226140000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rendez-vous: workflow report admin + notifications patient/medecin';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE rendez_vous ADD report_pending_medecin_response TINYINT(1) DEFAULT 0 NOT NULL, ADD report_proposed_by_admin TINYINT(1) DEFAULT 0 NOT NULL, ADD patient_notification_type VARCHAR(80) DEFAULT NULL, ADD patient_notification_message LONGTEXT DEFAULT NULL, ADD patient_notification_version INT DEFAULT 0 NOT NULL, ADD patient_notification_at DATETIME DEFAULT NULL, ADD medecin_notification_type VARCHAR(80) DEFAULT NULL, ADD medecin_notification_message LONGTEXT DEFAULT NULL, ADD medecin_notification_version INT DEFAULT 0 NOT NULL, ADD medecin_notification_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE rendez_vous DROP report_pending_medecin_response, DROP report_proposed_by_admin, DROP patient_notification_type, DROP patient_notification_message, DROP patient_notification_version, DROP patient_notification_at, DROP medecin_notification_type, DROP medecin_notification_message, DROP medecin_notification_version, DROP medecin_notification_at');
    }
}

