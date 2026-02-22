<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260219152000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create forum topic reactions table (like/love)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE forum_topic_reaction (id INT AUTO_INCREMENT NOT NULL, topic_id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8DA2AC521F55203D (topic_id), INDEX IDX_8DA2AC52A76ED395 (user_id), UNIQUE INDEX uniq_forum_topic_user_reaction (topic_id, user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forum_topic_reaction ADD CONSTRAINT FK_8DA2AC521F55203D FOREIGN KEY (topic_id) REFERENCES forum_topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_topic_reaction ADD CONSTRAINT FK_8DA2AC52A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE forum_topic_reaction');
    }
}
