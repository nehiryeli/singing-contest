<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314141419 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contest_contestant (id INT AUTO_INCREMENT NOT NULL, contest_id_id INT NOT NULL, contestant_id_id INT NOT NULL, INDEX IDX_AC1CEB17339EE7F (contest_id_id), INDEX IDX_AC1CEB12DFC32D3 (contestant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contest_contestant ADD CONSTRAINT FK_AC1CEB17339EE7F FOREIGN KEY (contest_id_id) REFERENCES contest (id)');
        $this->addSql('ALTER TABLE contest_contestant ADD CONSTRAINT FK_AC1CEB12DFC32D3 FOREIGN KEY (contestant_id_id) REFERENCES contestant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contest_contestant');
    }
}
