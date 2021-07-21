<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721133809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, article LONGTEXT NOT NULL, author VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, continent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_8244BE22921F4C77 (continent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, continent_id INT DEFAULT NULL, film_id INT DEFAULT NULL, serie_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_DA88B137921F4C77 (continent_id), INDEX IDX_DA88B137567F5183 (film_id), INDEX IDX_DA88B137D94388BD (serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, continent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_AA3A9334921F4C77 (continent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22921F4C77');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137921F4C77');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334921F4C77');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137567F5183');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137D94388BD');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE serie');
    }
}
