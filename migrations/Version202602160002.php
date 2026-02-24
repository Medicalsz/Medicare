<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version202602160002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Set usernames for existing users based on their email prefix';
    }

    public function up(Schema $schema): void
    {
        // Update existing users to have a username based on their email prefix
        $this->addSql("UPDATE user SET username = SUBSTRING_INDEX(email, '@', 1) WHERE username IS NULL");
    }

    public function down(Schema $schema): void
    {
        // No rollback needed as we're just setting a default value
    }
}
