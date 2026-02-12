<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260212132123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forum_comment (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_topic (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_medecin CHANGE certificats certificats VARCHAR(500) DEFAULT NULL, CHANGE date_traitement date_traitement DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE patient CHANGE date_naissance date_naissance DATE DEFAULT NULL, CHANGE groupe_sanguin groupe_sanguin VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE forum_comment');
        $this->addSql('DROP TABLE forum_topic');
        $this->addSql('ALTER TABLE demande_medecin CHANGE certificats certificats VARCHAR(500) DEFAULT \'NULL\', CHANGE date_traitement date_traitement DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE patient CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\', CHANGE groupe_sanguin groupe_sanguin VARCHAR(10) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\', CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
