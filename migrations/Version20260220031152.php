<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260220031152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disponibilite ADD ferme TINYINT(1) DEFAULT 0 NOT NULL, ADD matin_debut TIME DEFAULT NULL, ADD matin_fin TIME DEFAULT NULL, ADD pause_debut TIME DEFAULT NULL, ADD pause_fin TIME DEFAULT NULL, ADD apres_midi_debut TIME DEFAULT NULL, ADD apres_midi_fin TIME DEFAULT NULL, DROP heure_debut, DROP heure_fin');
        $this->addSql('CREATE UNIQUE INDEX uniq_disponibilite_medecin_jour ON disponibilite (medecin_id, jour_semaine)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_disponibilite_medecin_jour ON disponibilite');
        $this->addSql('ALTER TABLE disponibilite ADD heure_debut TIME NOT NULL, ADD heure_fin TIME NOT NULL, DROP ferme, DROP matin_debut, DROP matin_fin, DROP pause_debut, DROP pause_fin, DROP apres_midi_debut, DROP apres_midi_fin');
    }
}
