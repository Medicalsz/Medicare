<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260219143000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add report fields for forum topics and comments';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_topic ADD is_reported TINYINT(1) NOT NULL DEFAULT 0, ADD reported_reason VARCHAR(255) DEFAULT NULL, ADD reported_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD reported_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE forum_comment ADD is_reported TINYINT(1) NOT NULL DEFAULT 0, ADD reported_reason VARCHAR(255) DEFAULT NULL, ADD reported_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD reported_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE forum_topic ADD CONSTRAINT FK_2B9114A9925E2B58 FOREIGN KEY (reported_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_comment ADD CONSTRAINT FK_3D5A8F7A925E2B58 FOREIGN KEY (reported_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2B9114A9925E2B58 ON forum_topic (reported_by_id)');
        $this->addSql('CREATE INDEX IDX_3D5A8F7A925E2B58 ON forum_comment (reported_by_id)');
        $this->addSql('CREATE INDEX IDX_2B9114A9DEBA89A ON forum_topic (is_reported)');
        $this->addSql('CREATE INDEX IDX_3D5A8F7ADEBA89A ON forum_comment (is_reported)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE forum_comment DROP FOREIGN KEY FK_3D5A8F7A925E2B58');
        $this->addSql('ALTER TABLE forum_topic DROP FOREIGN KEY FK_2B9114A9925E2B58');
        $this->addSql('DROP INDEX IDX_3D5A8F7A925E2B58 ON forum_comment');
        $this->addSql('DROP INDEX IDX_2B9114A9925E2B58 ON forum_topic');
        $this->addSql('DROP INDEX IDX_2B9114A9DEBA89A ON forum_topic');
        $this->addSql('DROP INDEX IDX_3D5A8F7ADEBA89A ON forum_comment');
        $this->addSql('ALTER TABLE forum_comment DROP reported_by_id, DROP is_reported, DROP reported_reason, DROP reported_at');
        $this->addSql('ALTER TABLE forum_topic DROP reported_by_id, DROP is_reported, DROP reported_reason, DROP reported_at');
    }
}
