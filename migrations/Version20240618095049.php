<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240618095049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE galerieimage (id INT AUTO_INCREMENT NOT NULL, galerie_id INT NOT NULL, url VARCHAR(255) NOT NULL, created DATETIME NOT NULL, INDEX IDX_C017D875825396CB (galerie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE galerieimage ADD CONSTRAINT FK_C017D875825396CB FOREIGN KEY (galerie_id) REFERENCES galerie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galerieimage DROP FOREIGN KEY FK_C017D875825396CB');
        $this->addSql('DROP TABLE galerieimage');
    }
}
