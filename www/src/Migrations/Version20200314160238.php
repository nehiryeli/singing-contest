<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314160238 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE round_contestant_score (id INT AUTO_INCREMENT NOT NULL, round_id_id INT NOT NULL, contestant_id_id INT NOT NULL, score NUMERIC(4, 1) NOT NULL, INDEX IDX_B5B66325A9378AAE (round_id_id), INDEX IDX_B5B663252DFC32D3 (contestant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE round_contestant_score ADD CONSTRAINT FK_B5B66325A9378AAE FOREIGN KEY (round_id_id) REFERENCES round (id)');
        $this->addSql('ALTER TABLE round_contestant_score ADD CONSTRAINT FK_B5B663252DFC32D3 FOREIGN KEY (contestant_id_id) REFERENCES contestant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE round_contestant_score');
    }
}
