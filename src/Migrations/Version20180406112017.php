<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180406112017 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC3865B5147C8');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993BD95B80F');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBD95B80F');
        $this->addSql('ALTER TABLE procontrat DROP FOREIGN KEY FK_3F05F247BD95B80F');
        $this->addSql('ALTER TABLE proreservation DROP FOREIGN KEY FK_92F5088DBD95B80F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BD95B80F');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999319EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E1823061F');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386924DD2B5');
        $this->addSql('ALTER TABLE proimage DROP FOREIGN KEY FK_4838C136BD95B80F');
        $this->addSql('ALTER TABLE procontrat DROP FOREIGN KEY FK_3F05F24776C50E4A');
        $this->addSql('ALTER TABLE proreservation DROP FOREIGN KEY FK_92F5088D76C50E4A');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC38695B4D7FA');
        $this->addSql('CREATE TABLE test_r (id INT AUTO_INCREMENT NOT NULL, okk VARCHAR(50) NOT NULL, papa VARCHAR(25) NOT NULL, age VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE localite');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE probien');
        $this->addSql('DROP TABLE procontrat');
        $this->addSql('DROP TABLE proimage');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE proreservation');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE text_contrat');
        $this->addSql('DROP TABLE type_bien');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, bien_parent_id INT DEFAULT NULL, localite_id INT NOT NULL, type_bien_id INT NOT NULL, nomBien VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, etat TINYINT(1) NOT NULL, description LONGTEXT NOT NULL COLLATE utf8_unicode_ci, prixlocation INT NOT NULL, INDEX IDX_45EDC3865B5147C8 (bien_parent_id), INDEX IDX_45EDC386924DD2B5 (localite_id), INDEX IDX_45EDC38695B4D7FA (type_bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, numPiece INT NOT NULL, nomComplet VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, tel INT NOT NULL, adresse VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, email VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_C7440455E9505DD2 (numPiece), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, bien_id INT DEFAULT NULL, dateContrat DATE NOT NULL, caution VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, duree VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, INDEX UNIQ_60349993BD95B80F (bien_id), INDEX UNIQ_6034999319EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, bien_id INT NOT NULL, image BLOB NOT NULL, INDEX IDX_C53D045FBD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, contrat_id INT DEFAULT NULL, datePaiement DATE NOT NULL, montant INT NOT NULL, periode VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_B1DC7A1E1823061F (contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE probien (id INT AUTO_INCREMENT NOT NULL, localite VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, type_bien VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, nomBien VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, etat VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE procontrat (id INT AUTO_INCREMENT NOT NULL, bien_id INT DEFAULT NULL, proprietaire_id INT DEFAULT NULL, dateContrat DATETIME NOT NULL, caution INT NOT NULL, duree VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_3F05F247BD95B80F (bien_id), UNIQUE INDEX UNIQ_3F05F24776C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proimage (id INT AUTO_INCREMENT NOT NULL, bien_id INT NOT NULL, image BLOB NOT NULL, INDEX IDX_4838C136BD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, numPiece VARCHAR(25) NOT NULL COLLATE utf8_unicode_ci, nomComplet VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, adresse VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, tel INT NOT NULL, email VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, codeBanque VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_69E399D6F037AB0F (tel), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proreservation (id INT AUTO_INCREMENT NOT NULL, bien_id INT DEFAULT NULL, proprietaire_id INT DEFAULT NULL, dateReservation DATETIME NOT NULL, etat VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_92F5088DBD95B80F (bien_id), UNIQUE INDEX UNIQ_92F5088D76C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, bien_id INT DEFAULT NULL, client_id INT DEFAULT NULL, dateReservation DATE NOT NULL, etat VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, INDEX UNIQ_42C84955BD95B80F (bien_id), INDEX UNIQ_42C8495519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_contrat (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_bien (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC3865B5147C8 FOREIGN KEY (bien_parent_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC38695B4D7FA FOREIGN KEY (type_bien_id) REFERENCES type_bien (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E1823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE procontrat ADD CONSTRAINT FK_3F05F24776C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE procontrat ADD CONSTRAINT FK_3F05F247BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE proimage ADD CONSTRAINT FK_4838C136BD95B80F FOREIGN KEY (bien_id) REFERENCES probien (id)');
        $this->addSql('ALTER TABLE proreservation ADD CONSTRAINT FK_92F5088D76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE proreservation ADD CONSTRAINT FK_92F5088DBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('DROP TABLE test_r');
    }
}
