<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190821155807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E662053762E');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784182053762E');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C2053762E');
        $this->addSql('CREATE TABLE period (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lower INT NOT NULL, upper INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE `range`');
        $this->addSql('DROP INDEX IDX_23A0E662053762E ON article');
        $this->addSql('ALTER TABLE article CHANGE range_id_id period_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664EEC1632 FOREIGN KEY (period_id_id) REFERENCES period (id)');
        $this->addSql('CREATE INDEX IDX_23A0E664EEC1632 ON article (period_id_id)');
        $this->addSql('DROP INDEX IDX_14B784182053762E ON photo');
        $this->addSql('ALTER TABLE photo CHANGE range_id_id period_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784184EEC1632 FOREIGN KEY (period_id_id) REFERENCES period (id)');
        $this->addSql('CREATE INDEX IDX_14B784184EEC1632 ON photo (period_id_id)');
        $this->addSql('DROP INDEX IDX_7CC7DA2C2053762E ON video');
        $this->addSql('ALTER TABLE video ADD period_id_id INT DEFAULT NULL, DROP range_id_id');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C4EEC1632 FOREIGN KEY (period_id_id) REFERENCES period (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C4EEC1632 ON video (period_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664EEC1632');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784184EEC1632');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C4EEC1632');
        $this->addSql('CREATE TABLE `range` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, lower_range INT NOT NULL, upper_range INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE period');
        $this->addSql('DROP INDEX IDX_23A0E664EEC1632 ON article');
        $this->addSql('ALTER TABLE article CHANGE period_id_id range_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E662053762E FOREIGN KEY (range_id_id) REFERENCES `range` (id)');
        $this->addSql('CREATE INDEX IDX_23A0E662053762E ON article (range_id_id)');
        $this->addSql('DROP INDEX IDX_14B784184EEC1632 ON photo');
        $this->addSql('ALTER TABLE photo CHANGE period_id_id range_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784182053762E FOREIGN KEY (range_id_id) REFERENCES `range` (id)');
        $this->addSql('CREATE INDEX IDX_14B784182053762E ON photo (range_id_id)');
        $this->addSql('DROP INDEX IDX_7CC7DA2C4EEC1632 ON video');
        $this->addSql('ALTER TABLE video ADD range_id_id INT NOT NULL, DROP period_id_id');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C2053762E FOREIGN KEY (range_id_id) REFERENCES `range` (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C2053762E ON video (range_id_id)');
    }
}
