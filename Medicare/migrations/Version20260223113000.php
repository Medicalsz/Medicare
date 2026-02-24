<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260223113000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create notification table for in-app forum notifications';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, recipient_id INT NOT NULL, type VARCHAR(32) NOT NULL, message VARCHAR(255) NOT NULL, link VARCHAR(500) NOT NULL, author_name VARCHAR(160) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_read TINYINT(1) NOT NULL DEFAULT 0, INDEX IDX_BF5476CAA76ED395 (recipient_id), INDEX IDX_BF5476CA97CB3D06 (created_at), INDEX IDX_BF5476CA4FD6C0B6 (is_read), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (recipient_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE notification');
    }
}

