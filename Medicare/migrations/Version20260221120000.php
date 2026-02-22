<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260221120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add summary column for forum topic automatic summaries';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_topic ADD summary LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_topic DROP summary');
    }
}