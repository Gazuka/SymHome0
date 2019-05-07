<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190403111359 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE unite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aliment ADD unite_default_id INT NOT NULL');
        $this->addSql('ALTER TABLE aliment ADD CONSTRAINT FK_70FF972B6A758F16 FOREIGN KEY (unite_default_id) REFERENCES unite (id)');
        $this->addSql('CREATE INDEX IDX_70FF972B6A758F16 ON aliment (unite_default_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aliment DROP FOREIGN KEY FK_70FF972B6A758F16');
        $this->addSql('DROP TABLE unite');
        $this->addSql('DROP INDEX IDX_70FF972B6A758F16 ON aliment');
        $this->addSql('ALTER TABLE aliment DROP unite_default_id');
    }
}
