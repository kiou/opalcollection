<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240618190617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE the_collection_galerie (the_collection_id INT NOT NULL, galerie_id INT NOT NULL, INDEX IDX_ED647118CA1A9EB5 (the_collection_id), INDEX IDX_ED647118825396CB (galerie_id), PRIMARY KEY(the_collection_id, galerie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE the_collection_galerie ADD CONSTRAINT FK_ED647118CA1A9EB5 FOREIGN KEY (the_collection_id) REFERENCES thecollection (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE the_collection_galerie ADD CONSTRAINT FK_ED647118825396CB FOREIGN KEY (galerie_id) REFERENCES galerie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE the_collection_galerie DROP FOREIGN KEY FK_ED647118CA1A9EB5');
        $this->addSql('ALTER TABLE the_collection_galerie DROP FOREIGN KEY FK_ED647118825396CB');
        $this->addSql('DROP TABLE the_collection_galerie');
    }
}
