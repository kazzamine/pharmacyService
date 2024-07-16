<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716092956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE puser (id INT AUTO_INCREMENT NOT NULL, user_created INT DEFAULT NULL, user_updated INT DEFAULT NULL, type TINYINT(1) DEFAULT NULL, cmd_pharmacie TINYINT(1) DEFAULT NULL, menu_position TINYINT(1) DEFAULT NULL, username VARCHAR(150) NOT NULL, password VARCHAR(255) DEFAULT NULL, nom VARCHAR(150) DEFAULT NULL, prenom VARCHAR(150) DEFAULT NULL, join_at DATETIME DEFAULT NULL, roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', email VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) DEFAULT NULL, theme VARCHAR(150) DEFAULT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, original_name VARCHAR(255) DEFAULT NULL, mime_type VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL, tele VARCHAR(100) DEFAULT NULL, adresse LONGTEXT DEFAULT NULL, tele_personnel VARCHAR(255) DEFAULT NULL, tele_entreprise VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, sexe VARCHAR(255) DEFAULT NULL, signature LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_93271E87F85E0677 (username), UNIQUE INDEX UNIQ_93271E87E7927C74 (email), INDEX IDX_93271E87EA30A9B2 (user_created), INDEX IDX_93271E879E9688FD (user_updated), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE puser ADD CONSTRAINT FK_93271E87EA30A9B2 FOREIGN KEY (user_created) REFERENCES puser (id)');
        $this->addSql('ALTER TABLE puser ADD CONSTRAINT FK_93271E879E9688FD FOREIGN KEY (user_updated) REFERENCES puser (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE puser DROP FOREIGN KEY FK_93271E87EA30A9B2');
        $this->addSql('ALTER TABLE puser DROP FOREIGN KEY FK_93271E879E9688FD');
        $this->addSql('DROP TABLE puser');
    }
}
