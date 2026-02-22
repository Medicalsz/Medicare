<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250216100000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Legacy baseline migration kept for local DB compatibility.';
    }

    public function up(Schema $schema): void
    {
    }

    public function down(Schema $schema): void
    {
    }
}
