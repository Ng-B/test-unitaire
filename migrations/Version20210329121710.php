<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329121710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cotisation BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE lieu (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, coordonnees VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE trajet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lieu_depart_id INTEGER NOT NULL, lieu_arrivee_id INTEGER NOT NULL, date_depart DATETIME NOT NULL, heure_depart TIME NOT NULL, nbr_places INTEGER NOT NULL, array CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B5BA98CC16565FC ON trajet (lieu_depart_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B5BA98CBF9A3FF6 ON trajet (lieu_arrivee_id)');
        $this->addSql('CREATE TABLE utilisateur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, is_adherent_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3F4960126 ON utilisateur (is_adherent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE utilisateur');
    }
}
