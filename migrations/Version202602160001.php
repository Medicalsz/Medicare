<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version202602160001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add username, photo to user table and photo, certificate to medecin table';
    }

    public function up(Schema $schema): void
    {
        // Add username column to user table
        $this->addSql('ALTER TABLE user ADD COLUMN username VARCHAR(100) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');

        // Add photo column to user table
        $this->addSql('ALTER TABLE user ADD COLUMN photo VARCHAR(255) DEFAULT NULL');

        // Add photo column to medecin table
        $this->addSql('ALTER TABLE medecin ADD COLUMN photo VARCHAR(255) DEFAULT NULL');

        // Add certificate column to medecin table
        $this->addSql('ALTER TABLE medecin ADD COLUMN certificate VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // Drop columns in reverse order
        $this->addSql('ALTER TABLE medecin DROP COLUMN certificate');
        $this->addSql('ALTER TABLE medecin DROP COLUMN photo');
        $this->addSql('ALTER TABLE user DROP COLUMN photo');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('ALTER TABLE user DROP COLUMN username');
    }
}
