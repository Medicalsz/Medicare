<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260220103000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add nested replies and soft-hide for forum topics/comments';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_topic ADD is_hidden TINYINT(1) NOT NULL DEFAULT 0');
        $this->addSql('ALTER TABLE forum_comment ADD is_hidden TINYINT(1) NOT NULL DEFAULT 0, ADD parent_id INT DEFAULT NULL, ADD INDEX IDX_2EC6E094727ACA70 (parent_id)');
        $this->addSql('ALTER TABLE forum_comment ADD CONSTRAINT FK_2EC6E094727ACA70 FOREIGN KEY (parent_id) REFERENCES forum_comment (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_comment DROP FOREIGN KEY FK_2EC6E094727ACA70');
        $this->addSql('DROP INDEX IDX_2EC6E094727ACA70 ON forum_comment');
        $this->addSql('ALTER TABLE forum_comment DROP is_hidden, DROP parent_id');
        $this->addSql('ALTER TABLE forum_topic DROP is_hidden');
    }
}

