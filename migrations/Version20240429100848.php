<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240401072017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dossier_medical (id INT AUTO_INCREMENT NOT NULL, enfants_id INT NOT NULL, id_dm INT NOT NULL, traitementcourant VARCHAR(255) DEFAULT NULL, allergie VARCHAR(255) DEFAULT NULL, suivi_psychologique VARCHAR(255) DEFAULT NULL, certificat_medical TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3581EE62A586286C (enfants_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier_scolaire (id INT AUTO_INCREMENT NOT NULL, enfants_id INT NOT NULL, id_ds INT NOT NULL, parcoursscolaire VARCHAR(255) NOT NULL, classe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_94CE34BCA586286C (enfants_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier_stage (id INT AUTO_INCREMENT NOT NULL, enfants_id INT DEFAULT NULL, id_dst INT NOT NULL, priseencharge VARCHAR(255) NOT NULL, module_opt VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BFC892EA586286C (enfants_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfant (id INT AUTO_INCREMENT NOT NULL, personne_responsable_id INT NOT NULL, id_e INT NOT NULL, nom VARCHAR(55) NOT NULL, prenom VARCHAR(25) NOT NULL, age INT NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_34B70CA22E847616 (personne_responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, id_f INT NOT NULL, nompere VARCHAR(55) NOT NULL, prenompere VARCHAR(25) NOT NULL, nommere VARCHAR(55) NOT NULL, prenommere VARCHAR(25) NOT NULL, fratrie VARCHAR(255) DEFAULT NULL, relation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille_enfant (famille_id INT NOT NULL, enfant_id INT NOT NULL, INDEX IDX_52CA771697A77B84 (famille_id), INDEX IDX_52CA7716450D2529 (enfant_id), PRIMARY KEY(famille_id, enfant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne_responsable (id INT AUTO_INCREMENT NOT NULL, id_rp INT NOT NULL, nom_pr VARCHAR(55) NOT NULL, prenom_pr VARCHAR(25) NOT NULL, telephone_pr INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dossier_medical ADD CONSTRAINT FK_3581EE62A586286C FOREIGN KEY (enfants_id) REFERENCES enfant (id)');
        $this->addSql('ALTER TABLE dossier_scolaire ADD CONSTRAINT FK_94CE34BCA586286C FOREIGN KEY (enfants_id) REFERENCES enfant (id)');
        $this->addSql('ALTER TABLE dossier_stage ADD CONSTRAINT FK_BFC892EA586286C FOREIGN KEY (enfants_id) REFERENCES enfant (id)');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA22E847616 FOREIGN KEY (personne_responsable_id) REFERENCES personne_responsable (id)');
        $this->addSql('ALTER TABLE famille_enfant ADD CONSTRAINT FK_52CA771697A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE famille_enfant ADD CONSTRAINT FK_52CA7716450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossier_medical DROP FOREIGN KEY FK_3581EE62A586286C');
        $this->addSql('ALTER TABLE dossier_scolaire DROP FOREIGN KEY FK_94CE34BCA586286C');
        $this->addSql('ALTER TABLE dossier_stage DROP FOREIGN KEY FK_BFC892EA586286C');
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA22E847616');
        $this->addSql('ALTER TABLE famille_enfant DROP FOREIGN KEY FK_52CA771697A77B84');
        $this->addSql('ALTER TABLE famille_enfant DROP FOREIGN KEY FK_52CA7716450D2529');
        $this->addSql('DROP TABLE dossier_medical');
        $this->addSql('DROP TABLE dossier_scolaire');
        $this->addSql('DROP TABLE dossier_stage');
        $this->addSql('DROP TABLE enfant');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE famille_enfant');
        $this->addSql('DROP TABLE personne_responsable');
        $this->addSql('DROP TABLE messenger_messages');
    }
}