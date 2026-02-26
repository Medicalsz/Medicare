<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version202602140001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Remove roles column from user table and is_online from medecin table';
    }

    public function up(Schema $schema): void
    {
        // Remove roles column from user table
        $this->addSql('ALTER TABLE user DROP roles');

        // Remove is_online column from medecin table
        $this->addSql('ALTER TABLE medecin DROP is_online');
    }

    public function down(Schema $schema): void
    {
        // Add roles column back to user table
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL');

        // Add is_online column back to medecin table
        $this->addSql('ALTER TABLE medecin ADD is_online BOOLEAN DEFAULT NULL');
    }
}
