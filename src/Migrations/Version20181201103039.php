<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181201103039 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, descriptif LONGTEXT NOT NULL, position INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etape_ingredient (etape_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_5B37942C4A8CA2AD (etape_id), INDEX IDX_5B37942C933FE08C (ingredient_id), PRIMARY KEY(etape_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, aliment_id INT NOT NULL, recette_id INT NOT NULL, quantite DOUBLE PRECISION NOT NULL, INDEX IDX_6BAF7870415B9F11 (aliment_id), INDEX IDX_6BAF787089312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, portions INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etape_ingredient ADD CONSTRAINT FK_5B37942C4A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etape_ingredient ADD CONSTRAINT FK_5B37942C933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870415B9F11 FOREIGN KEY (aliment_id) REFERENCES aliment (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787089312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etape_ingredient DROP FOREIGN KEY FK_5B37942C4A8CA2AD');
        $this->addSql('ALTER TABLE etape_ingredient DROP FOREIGN KEY FK_5B37942C933FE08C');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787089312FE9');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE etape_ingredient');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recette');
    }
}
