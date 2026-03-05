<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260305120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add tags column to forum_topic for automatic tag generation';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE forum_topic ADD tags JSON DEFAULT NULL");
        $this->addSql("UPDATE forum_topic SET tags = '[]' WHERE tags IS NULL");
        $this->addSql("ALTER TABLE forum_topic MODIFY tags JSON NOT NULL");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_topic DROP tags');
    }
}
