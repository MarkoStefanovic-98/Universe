<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210221182820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trounoir (id INT AUTO_INCREMENT NOT NULL, idg_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_6C199FE2CD7AFD24 (idg_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trounoir ADD CONSTRAINT FK_6C199FE2CD7AFD24 FOREIGN KEY (idg_id) REFERENCES galaxie (id)');
        $this->addSql('DROP TABLE galaxiee');
        $this->addSql('DROP TABLE trou_noir');
        $this->addSql('ALTER TABLE galaxie DROP FOREIGN KEY FK_1C8807116F858F92');
        $this->addSql('DROP INDEX IDX_1C8807116F858F92 ON galaxie');
        $this->addSql('ALTER TABLE galaxie CHANGE id_u_id idu_id INT NOT NULL');
        $this->addSql('ALTER TABLE galaxie ADD CONSTRAINT FK_1C880711376A6230 FOREIGN KEY (idu_id) REFERENCES univers (id)');
        $this->addSql('CREATE INDEX IDX_1C880711376A6230 ON galaxie (idu_id)');
        $this->addSql('ALTER TABLE planete DROP FOREIGN KEY FK_490E3E574AEED04E');
        $this->addSql('DROP INDEX IDX_490E3E574AEED04E ON planete');
        $this->addSql('ALTER TABLE planete ADD ids_id INT NOT NULL, ADD nb_satelite INT NOT NULL, DROP id_s_id, DROP nb_sattelite');
        $this->addSql('ALTER TABLE planete ADD CONSTRAINT FK_490E3E5712013DEC FOREIGN KEY (ids_id) REFERENCES systeme (id)');
        $this->addSql('CREATE INDEX IDX_490E3E5712013DEC ON planete (ids_id)');
        $this->addSql('ALTER TABLE systeme DROP FOREIGN KEY FK_95796DE395951086');
        $this->addSql('DROP INDEX IDX_95796DE395951086 ON systeme');
        $this->addSql('ALTER TABLE systeme CHANGE id_g_id idg_id INT NOT NULL');
        $this->addSql('ALTER TABLE systeme ADD CONSTRAINT FK_95796DE3CD7AFD24 FOREIGN KEY (idg_id) REFERENCES galaxie (id)');
        $this->addSql('CREATE INDEX IDX_95796DE3CD7AFD24 ON systeme (idg_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE galaxiee (id INT AUTO_INCREMENT NOT NULL, idu_id INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_8576D2AF376A6230 (idu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE trou_noir (id INT AUTO_INCREMENT NOT NULL, id_g_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_AB27242D95951086 (id_g_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE galaxiee ADD CONSTRAINT FK_8576D2AF376A6230 FOREIGN KEY (idu_id) REFERENCES univers (id)');
        $this->addSql('ALTER TABLE trou_noir ADD CONSTRAINT FK_AB27242D95951086 FOREIGN KEY (id_g_id) REFERENCES galaxie (id)');
        $this->addSql('DROP TABLE trounoir');
        $this->addSql('ALTER TABLE galaxie DROP FOREIGN KEY FK_1C880711376A6230');
        $this->addSql('DROP INDEX IDX_1C880711376A6230 ON galaxie');
        $this->addSql('ALTER TABLE galaxie CHANGE idu_id id_u_id INT NOT NULL');
        $this->addSql('ALTER TABLE galaxie ADD CONSTRAINT FK_1C8807116F858F92 FOREIGN KEY (id_u_id) REFERENCES univers (id)');
        $this->addSql('CREATE INDEX IDX_1C8807116F858F92 ON galaxie (id_u_id)');
        $this->addSql('ALTER TABLE planete DROP FOREIGN KEY FK_490E3E5712013DEC');
        $this->addSql('DROP INDEX IDX_490E3E5712013DEC ON planete');
        $this->addSql('ALTER TABLE planete ADD id_s_id INT NOT NULL, ADD nb_sattelite INT NOT NULL, DROP ids_id, DROP nb_satelite');
        $this->addSql('ALTER TABLE planete ADD CONSTRAINT FK_490E3E574AEED04E FOREIGN KEY (id_s_id) REFERENCES systeme (id)');
        $this->addSql('CREATE INDEX IDX_490E3E574AEED04E ON planete (id_s_id)');
        $this->addSql('ALTER TABLE systeme DROP FOREIGN KEY FK_95796DE3CD7AFD24');
        $this->addSql('DROP INDEX IDX_95796DE3CD7AFD24 ON systeme');
        $this->addSql('ALTER TABLE systeme CHANGE idg_id id_g_id INT NOT NULL');
        $this->addSql('ALTER TABLE systeme ADD CONSTRAINT FK_95796DE395951086 FOREIGN KEY (id_g_id) REFERENCES galaxie (id)');
        $this->addSql('CREATE INDEX IDX_95796DE395951086 ON systeme (id_g_id)');
    }
}
