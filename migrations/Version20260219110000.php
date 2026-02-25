<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260219110000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Demande medecin: certificats as text + identity document paths';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demande_medecin CHANGE certificats certificats LONGTEXT DEFAULT NULL, ADD carte_identite VARCHAR(255) DEFAULT NULL, ADD carte_service VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demande_medecin DROP carte_identite, DROP carte_service, CHANGE certificats certificats VARCHAR(500) DEFAULT NULL');
    }
}
