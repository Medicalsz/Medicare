<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260220084408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cause (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, objectif_montant DOUBLE PRECISION DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE collaboration (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, statut VARCHAR(255) NOT NULL, partner_id INT NOT NULL, INDEX IDX_DA3AE3239393F8FE (partner_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, date_consultation DATETIME NOT NULL, description LONGTEXT NOT NULL, ordonnance LONGTEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, medecin_id INT NOT NULL, patient_id INT NOT NULL, rendez_vous_id INT NOT NULL, INDEX IDX_964685A64F31A84 (medecin_id), INDEX IDX_964685A66B899279 (patient_id), UNIQUE INDEX UNIQ_964685A691EF7EAA (rendez_vous_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE demande_medecin (id INT AUTO_INCREMENT NOT NULL, specialite VARCHAR(255) NOT NULL, cabinet VARCHAR(255) NOT NULL, adresse VARCHAR(500) NOT NULL, bio LONGTEXT DEFAULT NULL, certificats VARCHAR(500) DEFAULT NULL, statut VARCHAR(255) NOT NULL, date_demande DATETIME NOT NULL, date_traitement DATETIME DEFAULT NULL, raison_rejet LONGTEXT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_2B2DE869A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE disponibilite (id INT AUTO_INCREMENT NOT NULL, jour_semaine VARCHAR(255) NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, medecin_id INT NOT NULL, INDEX IDX_2CBACE2F4F31A84 (medecin_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, type_don VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, date_don DATETIME NOT NULL, mode_paiement VARCHAR(255) NOT NULL, statut_don VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, is_pickup_address_confirmed TINYINT DEFAULT 0 NOT NULL, cause_id INT NOT NULL, donateur_id INT NOT NULL, INDEX IDX_F8F081D966E2221E (cause_id), INDEX IDX_F8F081D9A9C80E3 (donateur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE donateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, user_id INT DEFAULT NULL, INDEX IDX_9CD3DE50A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE image_cause (id INT AUTO_INCREMENT NOT NULL, url_image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, cause_id INT NOT NULL, INDEX IDX_E79FFB1666E2221E (cause_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, specialite VARCHAR(255) NOT NULL, cabinet VARCHAR(255) NOT NULL, bio LONGTEXT DEFAULT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_1BDA53C6A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE objet_don (id INT AUTO_INCREMENT NOT NULL, nom_objet VARCHAR(255) NOT NULL, quantite INT NOT NULL, description LONGTEXT NOT NULL, don_id INT NOT NULL, INDEX IDX_186F716F7B3C9061 (don_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, name VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, date_partenariat DATE NOT NULL, type_partenaire VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, date_naissance DATE DEFAULT NULL, groupe_sanguin VARCHAR(10) DEFAULT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_1ADAD7EBA76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, statut VARCHAR(255) NOT NULL, medecin_id INT NOT NULL, patient_id INT NOT NULL, INDEX IDX_65E8AA0A4F31A84 (medecin_id), INDEX IDX_65E8AA0A6B899279 (patient_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, numero VARCHAR(20) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, is_verified TINYINT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE collaboration ADD CONSTRAINT FK_DA3AE3239393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A64F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A691EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id)');
        $this->addSql('ALTER TABLE demande_medecin ADD CONSTRAINT FK_2B2DE869A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2F4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D966E2221E FOREIGN KEY (cause_id) REFERENCES cause (id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D9A9C80E3 FOREIGN KEY (donateur_id) REFERENCES donateur (id)');
        $this->addSql('ALTER TABLE donateur ADD CONSTRAINT FK_9CD3DE50A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE image_cause ADD CONSTRAINT FK_E79FFB1666E2221E FOREIGN KEY (cause_id) REFERENCES cause (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE objet_don ADD CONSTRAINT FK_186F716F7B3C9061 FOREIGN KEY (don_id) REFERENCES don (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collaboration DROP FOREIGN KEY FK_DA3AE3239393F8FE');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A64F31A84');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A66B899279');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A691EF7EAA');
        $this->addSql('ALTER TABLE demande_medecin DROP FOREIGN KEY FK_2B2DE869A76ED395');
        $this->addSql('ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2F4F31A84');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D966E2221E');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D9A9C80E3');
        $this->addSql('ALTER TABLE donateur DROP FOREIGN KEY FK_9CD3DE50A76ED395');
        $this->addSql('ALTER TABLE image_cause DROP FOREIGN KEY FK_E79FFB1666E2221E');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C6A76ED395');
        $this->addSql('ALTER TABLE objet_don DROP FOREIGN KEY FK_186F716F7B3C9061');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBA76ED395');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A4F31A84');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6B899279');
        $this->addSql('DROP TABLE cause');
        $this->addSql('DROP TABLE collaboration');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE demande_medecin');
        $this->addSql('DROP TABLE disponibilite');
        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE donateur');
        $this->addSql('DROP TABLE image_cause');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE objet_don');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
