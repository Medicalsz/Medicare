<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version202602160003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Drop user_id column from medecin table and add required fields';
    }

    public function up(Schema $schema): void
    {
        // Check if user_id column exists first
        $columns = $this->connection->fetchAllAssociative("SHOW COLUMNS FROM medecin LIKE 'user_id'");
        
        if (!empty($columns)) {
            // Drop user_id foreign key and column if they exist
            $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY IF EXISTS FK_8A9A5B7A76ED395');
            $this->addSql('ALTER TABLE medecin DROP INDEX IF EXISTS IDX_8A9A5B7A76ED395');
            $this->addSql('ALTER TABLE medecin DROP COLUMN user_id');
        }

        // Check if nom column exists before adding
        $nomColumns = $this->connection->fetchAllAssociative("SHOW COLUMNS FROM medecin LIKE 'nom'");
        if (empty($nomColumns)) {
            $this->addSql('ALTER TABLE medecin ADD COLUMN nom VARCHAR(100) NOT NULL');
        }

        // Check if prenom column exists before adding
        $prenomColumns = $this->connection->fetchAllAssociative("SHOW COLUMNS FROM medecin LIKE 'prenom'");
        if (empty($prenomColumns)) {
            $this->addSql('ALTER TABLE medecin ADD COLUMN prenom VARCHAR(100) NOT NULL');
        }

        // Check if email column exists before adding
        $emailColumns = $this->connection->fetchAllAssociative("SHOW COLUMNS FROM medecin LIKE 'email'");
        if (empty($emailColumns)) {
            $this->addSql('ALTER TABLE medecin ADD COLUMN email VARCHAR(180) NOT NULL');
            $this->addSql('CREATE UNIQUE INDEX UNIQ_8A9A5B7A76ED395 ON medecin (email)');
        }

        // Check if password column exists before adding
        $passwordColumns = $this->connection->fetchAllAssociative("SHOW COLUMNS FROM medecin LIKE 'password'");
        if (empty($passwordColumns)) {
            $this->addSql('ALTER TABLE medecin ADD COLUMN password VARCHAR(255) NOT NULL');
        }

        // Check if numero column exists before adding
        $numeroColumns = $this->connection->fetchAllAssociative("SHOW COLUMNS FROM medecin LIKE 'numero'");
        if (empty($numeroColumns)) {
            $this->addSql('ALTER TABLE medecin ADD COLUMN numero VARCHAR(20) DEFAULT NULL');
        }

        // Check if adresse column exists before adding
        $adresseColumns = $this->connection->fetchAllAssociative("SHOW COLUMNS FROM medecin LIKE 'adresse'");
        if (empty($adresseColumns)) {
            $this->addSql('ALTER TABLE medecin ADD COLUMN adresse VARCHAR(255) DEFAULT NULL');
        }
    }

    public function down(Schema $schema): void
    {
        // Drop the added columns
        $this->addSql('ALTER TABLE medecin DROP COLUMN nom');
        $this->addSql('ALTER TABLE medecin DROP COLUMN prenom');
        $this->addSql('ALTER TABLE medecin DROP COLUMN email');
        $this->addSql('ALTER TABLE medecin DROP COLUMN password');
        $this->addSql('ALTER TABLE medecin DROP COLUMN numero');
        $this->addSql('ALTER TABLE medecin DROP COLUMN adresse');

        // Drop unique index
        $this->addSql('DROP INDEX UNIQ_8A9A5B7A76ED395 ON medecin');

        // Re-add user_id column
        $this->addSql('ALTER TABLE medecin ADD COLUMN user_id INT NOT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_8A9A5B7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8A9A5B7A76ED395 ON medecin (user_id)');
    }
}
