<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260306120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add forum topics/comments/reactions and notifications tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user ENGINE = InnoDB');

        $this->addSql('CREATE TABLE forum_topic (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, reported_by_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, type VARCHAR(16) NOT NULL DEFAULT \'text\', video_url VARCHAR(500) DEFAULT NULL, summary LONGTEXT DEFAULT NULL, tags JSON NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, is_reported TINYINT(1) NOT NULL, is_hidden TINYINT(1) NOT NULL, reported_reason VARCHAR(255) DEFAULT NULL, reported_at DATETIME DEFAULT NULL, INDEX IDX_9BA4C28BF675F31B (author_id), INDEX IDX_9BA4C28BE1CFE6F5 (reported_by_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_comment (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, topic_id INT NOT NULL, parent_id INT DEFAULT NULL, reported_by_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, is_reported TINYINT(1) NOT NULL, is_hidden TINYINT(1) NOT NULL, reported_reason VARCHAR(255) DEFAULT NULL, reported_at DATETIME DEFAULT NULL, INDEX IDX_1A0AFA1AF675F31B (author_id), INDEX IDX_1A0AFA1A1F55203D (topic_id), INDEX IDX_1A0AFA1A727ACA70 (parent_id), INDEX IDX_1A0AFA1AE1CFE6F5 (reported_by_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_topic_reaction (id INT AUTO_INCREMENT NOT NULL, topic_id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX uniq_forum_topic_user_reaction (topic_id, user_id), INDEX IDX_6408B6ED1F55203D (topic_id), INDEX IDX_6408B6EDA76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_comment_reaction (id INT AUTO_INCREMENT NOT NULL, comment_id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX uniq_forum_comment_user_reaction (comment_id, user_id), INDEX IDX_7706AF08F8697D13 (comment_id), INDEX IDX_7706AF08A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, recipient_id INT NOT NULL, type VARCHAR(32) NOT NULL, message VARCHAR(255) NOT NULL, link VARCHAR(500) NOT NULL, author_name VARCHAR(160) NOT NULL, created_at DATETIME NOT NULL, is_read TINYINT(1) NOT NULL DEFAULT 0, INDEX IDX_BF5476CAA4C0A3C3 (recipient_id), INDEX IDX_BF5476CA82C9F (is_read), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE forum_topic ADD CONSTRAINT FK_9BA4C28BF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_topic ADD CONSTRAINT FK_9BA4C28BE1CFE6F5 FOREIGN KEY (reported_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_comment ADD CONSTRAINT FK_1A0AFA1AF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_comment ADD CONSTRAINT FK_1A0AFA1A1F55203D FOREIGN KEY (topic_id) REFERENCES forum_topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_comment ADD CONSTRAINT FK_1A0AFA1A727ACA70 FOREIGN KEY (parent_id) REFERENCES forum_comment (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE forum_comment ADD CONSTRAINT FK_1A0AFA1AE1CFE6F5 FOREIGN KEY (reported_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_topic_reaction ADD CONSTRAINT FK_6408B6ED1F55203D FOREIGN KEY (topic_id) REFERENCES forum_topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_topic_reaction ADD CONSTRAINT FK_6408B6EDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_comment_reaction ADD CONSTRAINT FK_7706AF08F8697D13 FOREIGN KEY (comment_id) REFERENCES forum_comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_comment_reaction ADD CONSTRAINT FK_7706AF08A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA4C0A3C3 FOREIGN KEY (recipient_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_comment_reaction DROP FOREIGN KEY FK_7706AF08F8697D13');
        $this->addSql('ALTER TABLE forum_comment_reaction DROP FOREIGN KEY FK_7706AF08A76ED395');
        $this->addSql('ALTER TABLE forum_topic_reaction DROP FOREIGN KEY FK_6408B6ED1F55203D');
        $this->addSql('ALTER TABLE forum_topic_reaction DROP FOREIGN KEY FK_6408B6EDA76ED395');
        $this->addSql('ALTER TABLE forum_comment DROP FOREIGN KEY FK_1A0AFA1AF675F31B');
        $this->addSql('ALTER TABLE forum_comment DROP FOREIGN KEY FK_1A0AFA1A1F55203D');
        $this->addSql('ALTER TABLE forum_comment DROP FOREIGN KEY FK_1A0AFA1A727ACA70');
        $this->addSql('ALTER TABLE forum_comment DROP FOREIGN KEY FK_1A0AFA1AE1CFE6F5');
        $this->addSql('ALTER TABLE forum_topic DROP FOREIGN KEY FK_9BA4C28BF675F31B');
        $this->addSql('ALTER TABLE forum_topic DROP FOREIGN KEY FK_9BA4C28BE1CFE6F5');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA4C0A3C3');

        $this->addSql('DROP TABLE forum_comment_reaction');
        $this->addSql('DROP TABLE forum_topic_reaction');
        $this->addSql('DROP TABLE forum_comment');
        $this->addSql('DROP TABLE forum_topic');
        $this->addSql('DROP TABLE notification');
    }
}

