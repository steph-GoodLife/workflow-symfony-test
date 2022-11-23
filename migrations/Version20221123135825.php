<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221123135825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE toy_request_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE toy_request (id INT NOT NULL, utilisateur_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, status TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_736D0B65FB88E14F ON toy_request (utilisateur_id)');
        $this->addSql('COMMENT ON COLUMN toy_request.status IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE toy_request ADD CONSTRAINT FK_736D0B65FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE toy_request_id_seq CASCADE');
        $this->addSql('ALTER TABLE toy_request DROP CONSTRAINT FK_736D0B65FB88E14F');
        $this->addSql('DROP TABLE toy_request');
    }
}
