<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260212181344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collaboration (id BIGINT AUTO_INCREMENT NOT NULL, partner_id BIGINT NOT NULL, organization_id BIGINT DEFAULT NULL, contract_start DATE NOT NULL, contract_end DATE DEFAULT NULL, status VARCHAR(30) NOT NULL, terms LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_DA3AE3239393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id BIGINT AUTO_INCREMENT NOT NULL, type VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, registration_number VARCHAR(255) DEFAULT NULL, phone VARCHAR(50) DEFAULT NULL, email VARCHAR(150) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, postal_code VARCHAR(20) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE collaboration ADD CONSTRAINT FK_DA3AE3239393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medecin ADD adresse_cabinet LONGTEXT DEFAULT NULL, ADD numero_cabinet VARCHAR(20) DEFAULT NULL, ADD documents JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collaboration DROP FOREIGN KEY FK_DA3AE3239393F8FE');
        $this->addSql('DROP TABLE collaboration');
        $this->addSql('DROP TABLE partner');
        $this->addSql('ALTER TABLE medecin DROP adresse_cabinet, DROP numero_cabinet, DROP documents');
    }
}
