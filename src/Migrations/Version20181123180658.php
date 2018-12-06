<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181123180658 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE boite (id INT AUTO_INCREMENT NOT NULL, plat_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, contenu VARCHAR(255) DEFAULT NULL, INDEX IDX_7718EDEFD73DB560 (plat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_preparation DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boite ADD CONSTRAINT FK_7718EDEFD73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boite DROP FOREIGN KEY FK_7718EDEFD73DB560');
        $this->addSql('DROP TABLE boite');
        $this->addSql('DROP TABLE plat');
    }
}
