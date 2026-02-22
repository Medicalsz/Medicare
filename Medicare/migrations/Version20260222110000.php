<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260222110000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add topic type and video URL for medical video topics';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE forum_topic ADD type VARCHAR(16) NOT NULL DEFAULT 'text'");
        $this->addSql('ALTER TABLE forum_topic ADD video_url VARCHAR(500) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_topic DROP video_url');
        $this->addSql('ALTER TABLE forum_topic DROP type');
    }
}

