<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240626155039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aboutfull (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, changed DATETIME DEFAULT NULL, titleodile VARCHAR(255) NOT NULL, contentodile LONGTEXT NOT NULL, titlephilo VARCHAR(255) NOT NULL, contentphilo LONGTEXT NOT NULL, titlemission VARCHAR(255) NOT NULL, contentmission LONGTEXT NOT NULL, titlevision VARCHAR(255) NOT NULL, contentvision LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE aboutfull');
    }
}
