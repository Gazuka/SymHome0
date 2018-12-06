<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181201222901 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etape ADD recette_id INT NOT NULL');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_285F75DD89312FE9 ON etape (recette_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DD89312FE9');
        $this->addSql('DROP INDEX IDX_285F75DD89312FE9 ON etape');
        $this->addSql('ALTER TABLE etape DROP recette_id');
    }
}
