<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128120143 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stockage (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_CABCB492727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stockage ADD CONSTRAINT FK_CABCB492727ACA70 FOREIGN KEY (parent_id) REFERENCES stockage (id)');
        $this->addSql('ALTER TABLE produit ADD stockage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27DAA83D7F FOREIGN KEY (stockage_id) REFERENCES stockage (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27DAA83D7F ON produit (stockage_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27DAA83D7F');
        $this->addSql('ALTER TABLE stockage DROP FOREIGN KEY FK_CABCB492727ACA70');
        $this->addSql('DROP TABLE stockage');
        $this->addSql('DROP INDEX IDX_29A5EC27DAA83D7F ON produit');
        $this->addSql('ALTER TABLE produit DROP stockage_id');
    }
}
