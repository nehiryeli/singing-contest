<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314140024 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contestant_score (id INT AUTO_INCREMENT NOT NULL, contestant_id_id INT NOT NULL, genre_id_id INT NOT NULL, score INT NOT NULL, INDEX IDX_60219BD52DFC32D3 (contestant_id_id), INDEX IDX_60219BD5C2428192 (genre_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contestant_score ADD CONSTRAINT FK_60219BD52DFC32D3 FOREIGN KEY (contestant_id_id) REFERENCES contestant (id)');
        $this->addSql('ALTER TABLE contestant_score ADD CONSTRAINT FK_60219BD5C2428192 FOREIGN KEY (genre_id_id) REFERENCES genre (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contestant_score');
    }
}
