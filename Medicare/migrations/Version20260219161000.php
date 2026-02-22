<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260219161000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create forum comment reactions table (like/love)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE forum_comment_reaction (id INT AUTO_INCREMENT NOT NULL, comment_id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_39BAEC86F8697D13 (comment_id), INDEX IDX_39BAEC86A76ED395 (user_id), UNIQUE INDEX uniq_forum_comment_user_reaction (comment_id, user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forum_comment_reaction ADD CONSTRAINT FK_39BAEC86F8697D13 FOREIGN KEY (comment_id) REFERENCES forum_comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_comment_reaction ADD CONSTRAINT FK_39BAEC86A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE forum_comment_reaction');
    }
}
