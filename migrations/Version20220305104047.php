<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220305104047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annee (id INT AUTO_INCREMENT NOT NULL, diplome_id INT DEFAULT NULL, code_etape VARCHAR(20) NOT NULL, code_version VARCHAR(10) NOT NULL, libelle VARCHAR(255) NOT NULL, ordre INT NOT NULL, INDEX IDX_DE92C5CF26F859E2 (diplome_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apc_apprentissage_critique (id INT AUTO_INCREMENT NOT NULL, niveau_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, code VARCHAR(20) NOT NULL, INDEX IDX_A99B947AB3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apc_competence (id INT AUTO_INCREMENT NOT NULL, diplome_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, nom_court VARCHAR(50) NOT NULL, couleur VARCHAR(20) NOT NULL, INDEX IDX_B949FC0F26F859E2 (diplome_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apc_composante_essentielle (id INT AUTO_INCREMENT NOT NULL, competence_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_AC23ECFF15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apc_niveau (id INT AUTO_INCREMENT NOT NULL, competence_id INT DEFAULT NULL, annee_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, ordre INT NOT NULL, INDEX IDX_5CE8A82315761DAB (competence_id), INDEX IDX_5CE8A823543EC5F0 (annee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apc_parcours (id INT AUTO_INCREMENT NOT NULL, diplome_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, code VARCHAR(10) NOT NULL, actif TINYINT(1) NOT NULL, INDEX IDX_5DA884A526F859E2 (diplome_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apc_parcours_niveau (id INT AUTO_INCREMENT NOT NULL, niveau_id INT DEFAULT NULL, parcours_id INT DEFAULT NULL, INDEX IDX_5B6EBDC7B3E9C81 (niveau_id), INDEX IDX_5B6EBDC76E38C0DB (parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apc_situation_professionnelle (id INT AUTO_INCREMENT NOT NULL, competence_id INT DEFAULT NULL, libelle LONGTEXT NOT NULL, INDEX IDX_29E092C315761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diplome (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, sigle VARCHAR(40) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B723AF33E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B0F6A6D5E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trace_file (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, description LONGTEXT NOT NULL, date_post DATETIME NOT NULL, date_validated DATETIME DEFAULT NULL, validate TINYINT(1) NOT NULL, fichier VARCHAR(50) NOT NULL, taille DOUBLE PRECISION NOT NULL, type_fichier VARCHAR(20) NOT NULL, INDEX IDX_2BC37F65CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trace_url (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, description LONGTEXT NOT NULL, date_post DATETIME NOT NULL, date_validated DATETIME DEFAULT NULL, validate TINYINT(1) NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_CF19514ACB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annee ADD CONSTRAINT FK_DE92C5CF26F859E2 FOREIGN KEY (diplome_id) REFERENCES diplome (id)');
        $this->addSql('ALTER TABLE apc_apprentissage_critique ADD CONSTRAINT FK_A99B947AB3E9C81 FOREIGN KEY (niveau_id) REFERENCES apc_niveau (id)');
        $this->addSql('ALTER TABLE apc_competence ADD CONSTRAINT FK_B949FC0F26F859E2 FOREIGN KEY (diplome_id) REFERENCES diplome (id)');
        $this->addSql('ALTER TABLE apc_composante_essentielle ADD CONSTRAINT FK_AC23ECFF15761DAB FOREIGN KEY (competence_id) REFERENCES apc_competence (id)');
        $this->addSql('ALTER TABLE apc_niveau ADD CONSTRAINT FK_5CE8A82315761DAB FOREIGN KEY (competence_id) REFERENCES apc_competence (id)');
        $this->addSql('ALTER TABLE apc_niveau ADD CONSTRAINT FK_5CE8A823543EC5F0 FOREIGN KEY (annee_id) REFERENCES annee (id)');
        $this->addSql('ALTER TABLE apc_parcours ADD CONSTRAINT FK_5DA884A526F859E2 FOREIGN KEY (diplome_id) REFERENCES diplome (id)');
        $this->addSql('ALTER TABLE apc_parcours_niveau ADD CONSTRAINT FK_5B6EBDC7B3E9C81 FOREIGN KEY (niveau_id) REFERENCES apc_niveau (id)');
        $this->addSql('ALTER TABLE apc_parcours_niveau ADD CONSTRAINT FK_5B6EBDC76E38C0DB FOREIGN KEY (parcours_id) REFERENCES apc_parcours (id)');
        $this->addSql('ALTER TABLE apc_situation_professionnelle ADD CONSTRAINT FK_29E092C315761DAB FOREIGN KEY (competence_id) REFERENCES apc_competence (id)');
        $this->addSql('ALTER TABLE trace_file ADD CONSTRAINT FK_2BC37F65CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE trace_url ADD CONSTRAINT FK_CF19514ACB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apc_niveau DROP FOREIGN KEY FK_5CE8A823543EC5F0');
        $this->addSql('ALTER TABLE apc_composante_essentielle DROP FOREIGN KEY FK_AC23ECFF15761DAB');
        $this->addSql('ALTER TABLE apc_niveau DROP FOREIGN KEY FK_5CE8A82315761DAB');
        $this->addSql('ALTER TABLE apc_situation_professionnelle DROP FOREIGN KEY FK_29E092C315761DAB');
        $this->addSql('ALTER TABLE apc_apprentissage_critique DROP FOREIGN KEY FK_A99B947AB3E9C81');
        $this->addSql('ALTER TABLE apc_parcours_niveau DROP FOREIGN KEY FK_5B6EBDC7B3E9C81');
        $this->addSql('ALTER TABLE apc_parcours_niveau DROP FOREIGN KEY FK_5B6EBDC76E38C0DB');
        $this->addSql('ALTER TABLE annee DROP FOREIGN KEY FK_DE92C5CF26F859E2');
        $this->addSql('ALTER TABLE apc_competence DROP FOREIGN KEY FK_B949FC0F26F859E2');
        $this->addSql('ALTER TABLE apc_parcours DROP FOREIGN KEY FK_5DA884A526F859E2');
        $this->addSql('ALTER TABLE trace_file DROP FOREIGN KEY FK_2BC37F65CB944F1A');
        $this->addSql('ALTER TABLE trace_url DROP FOREIGN KEY FK_CF19514ACB944F1A');
        $this->addSql('DROP TABLE annee');
        $this->addSql('DROP TABLE apc_apprentissage_critique');
        $this->addSql('DROP TABLE apc_competence');
        $this->addSql('DROP TABLE apc_composante_essentielle');
        $this->addSql('DROP TABLE apc_niveau');
        $this->addSql('DROP TABLE apc_parcours');
        $this->addSql('DROP TABLE apc_parcours_niveau');
        $this->addSql('DROP TABLE apc_situation_professionnelle');
        $this->addSql('DROP TABLE diplome');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE trace_file');
        $this->addSql('DROP TABLE trace_url');
    }
}
