<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231101191008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE filter (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, contrat VARCHAR(255) NOT NULL, client VARCHAR(255) NOT NULL, compagnie_assurance VARCHAR(255) NOT NULL, prime_ttc INT NOT NULL, montant_paye INT NOT NULL, reste_apayer INT NOT NULL, action VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE filtre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE filtre (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', contrat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, compagnie_assurance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prime_ttc DOUBLE PRECISION NOT NULL, montant_payer DOUBLE PRECISION NOT NULL, reste_apayer DOUBLE PRECISION NOT NULL, action VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE filter');
    }
}
