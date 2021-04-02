<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329132038 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_2B5BA98CBF9A3FF6');
        $this->addSql('DROP INDEX UNIQ_2B5BA98CC16565FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__trajet AS SELECT id, lieu_depart_id, lieu_arrivee_id, date_depart, heure_depart, nbr_places, array FROM trajet');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('CREATE TABLE trajet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lieu_depart_id INTEGER NOT NULL, lieu_arrivee_id INTEGER NOT NULL, date_depart DATETIME NOT NULL, heure_depart TIME NOT NULL, nbr_places INTEGER NOT NULL, array CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:array)
        , CONSTRAINT FK_2B5BA98CC16565FC FOREIGN KEY (lieu_depart_id) REFERENCES lieu (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2B5BA98CBF9A3FF6 FOREIGN KEY (lieu_arrivee_id) REFERENCES lieu (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO trajet (id, lieu_depart_id, lieu_arrivee_id, date_depart, heure_depart, nbr_places, array) SELECT id, lieu_depart_id, lieu_arrivee_id, date_depart, heure_depart, nbr_places, array FROM __temp__trajet');
        $this->addSql('DROP TABLE __temp__trajet');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B5BA98CBF9A3FF6 ON trajet (lieu_arrivee_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B5BA98CC16565FC ON trajet (lieu_depart_id)');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3F4960126');
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateur AS SELECT id, is_adherent_id, nom, prenom, date_naissance, password, email FROM utilisateur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('CREATE TABLE utilisateur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, is_adherent_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL COLLATE BINARY, prenom VARCHAR(255) NOT NULL COLLATE BINARY, date_naissance DATETIME NOT NULL, password VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_1D1C63B3F4960126 FOREIGN KEY (is_adherent_id) REFERENCES adherent (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO utilisateur (id, is_adherent_id, nom, prenom, date_naissance, password, email) SELECT id, is_adherent_id, nom, prenom, date_naissance, password, email FROM __temp__utilisateur');
        $this->addSql('DROP TABLE __temp__utilisateur');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3F4960126 ON utilisateur (is_adherent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_2B5BA98CC16565FC');
        $this->addSql('DROP INDEX UNIQ_2B5BA98CBF9A3FF6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__trajet AS SELECT id, lieu_depart_id, lieu_arrivee_id, date_depart, heure_depart, nbr_places, array FROM trajet');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('CREATE TABLE trajet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lieu_depart_id INTEGER NOT NULL, lieu_arrivee_id INTEGER NOT NULL, date_depart DATETIME NOT NULL, heure_depart TIME NOT NULL, nbr_places INTEGER NOT NULL, array CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('INSERT INTO trajet (id, lieu_depart_id, lieu_arrivee_id, date_depart, heure_depart, nbr_places, array) SELECT id, lieu_depart_id, lieu_arrivee_id, date_depart, heure_depart, nbr_places, array FROM __temp__trajet');
        $this->addSql('DROP TABLE __temp__trajet');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B5BA98CC16565FC ON trajet (lieu_depart_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B5BA98CBF9A3FF6 ON trajet (lieu_arrivee_id)');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3F4960126');
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateur AS SELECT id, is_adherent_id, nom, prenom, date_naissance, password, email FROM utilisateur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('CREATE TABLE utilisateur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, is_adherent_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO utilisateur (id, is_adherent_id, nom, prenom, date_naissance, password, email) SELECT id, is_adherent_id, nom, prenom, date_naissance, password, email FROM __temp__utilisateur');
        $this->addSql('DROP TABLE __temp__utilisateur');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3F4960126 ON utilisateur (is_adherent_id)');
    }
}
