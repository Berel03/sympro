<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231101221441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE filter CHANGE contrat contrat VARCHAR(255) DEFAULT NULL, CHANGE compagnie_assurance compagnie_assurance VARCHAR(255) DEFAULT NULL, CHANGE prime_ttc prime_ttc INT DEFAULT NULL, CHANGE montant_paye montant_paye INT DEFAULT NULL, CHANGE reste_apayer reste_apayer INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE filter CHANGE contrat contrat VARCHAR(255) NOT NULL, CHANGE compagnie_assurance compagnie_assurance VARCHAR(255) NOT NULL, CHANGE prime_ttc prime_ttc INT NOT NULL, CHANGE montant_paye montant_paye INT NOT NULL, CHANGE reste_apayer reste_apayer INT NOT NULL');
    }
}
