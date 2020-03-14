<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314160948 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE round_judge_score (id INT AUTO_INCREMENT NOT NULL, round_id_id INT NOT NULL, judge_id_id INT NOT NULL, score INT NOT NULL, INDEX IDX_95A36EC9A9378AAE (round_id_id), INDEX IDX_95A36EC98F0DF8AC (judge_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE round_judge_score ADD CONSTRAINT FK_95A36EC9A9378AAE FOREIGN KEY (round_id_id) REFERENCES round (id)');
        $this->addSql('ALTER TABLE round_judge_score ADD CONSTRAINT FK_95A36EC98F0DF8AC FOREIGN KEY (judge_id_id) REFERENCES judge (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE round_judge_score');
    }
}
