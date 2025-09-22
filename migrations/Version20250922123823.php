<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250922123823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add collaboration table for user collaboration management';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collaboration (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, collaborator_id INT NOT NULL, role VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', accepted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(20) NOT NULL, INDEX IDX_DA3ED8AD7E3C61F9 (owner_id), INDEX IDX_DA3ED8AD7AB25A0E (collaborator_id), UNIQUE INDEX UNIQ_COLLABORATION (owner_id, collaborator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE collaboration ADD CONSTRAINT FK_DA3ED8AD7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE collaboration ADD CONSTRAINT FK_DA3ED8AD7AB25A0E FOREIGN KEY (collaborator_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collaboration DROP FOREIGN KEY FK_DA3ED8AD7E3C61F9');
        $this->addSql('ALTER TABLE collaboration DROP FOREIGN KEY FK_DA3ED8AD7AB25A0E');
        $this->addSql('DROP TABLE collaboration');
    }
}
