<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319102637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, cotisation TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, coordonnees VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, lieu_depart_id INT NOT NULL, lieu_arrivee_id INT NOT NULL, date_depart DATETIME NOT NULL, heure_depart TIME NOT NULL, nbr_places INT NOT NULL, array LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_2B5BA98CC16565FC (lieu_depart_id), UNIQUE INDEX UNIQ_2B5BA98CBF9A3FF6 (lieu_arrivee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, is_adherent_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3F4960126 (is_adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CC16565FC FOREIGN KEY (lieu_depart_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CBF9A3FF6 FOREIGN KEY (lieu_arrivee_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3F4960126 FOREIGN KEY (is_adherent_id) REFERENCES adherent (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3F4960126');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CC16565FC');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CBF9A3FF6');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE utilisateur');
    }
}
