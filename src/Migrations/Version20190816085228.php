<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190816085228 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) DEFAULT NULL, surname VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `range` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) DEFAULT NULL, lower_range INT NOT NULL, upper_range INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE source (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, date DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE source_author (source_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_B50FD2E953C1C61 (source_id), INDEX IDX_B50FD2EF675F31B (author_id), PRIMARY KEY(source_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(15) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(30) NOT NULL, name VARCHAR(20) DEFAULT NULL, surname VARCHAR(20) DEFAULT NULL, activation TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, range_id_id INT NOT NULL, place_id_id INT DEFAULT NULL, author_id_id INT NOT NULL, date DATE NOT NULL, orientation_date TINYINT(1) DEFAULT NULL, title VARCHAR(30) NOT NULL, format VARCHAR(10) DEFAULT NULL, size INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, path VARCHAR(255) NOT NULL, adding_date DATETIME DEFAULT NULL, subtitle VARCHAR(35) DEFAULT NULL, lastest_modification DATETIME DEFAULT NULL, topic VARCHAR(255) NOT NULL, publicated TINYINT(1) DEFAULT NULL, INDEX IDX_7CC7DA2C9D86650F (user_id_id), INDEX IDX_7CC7DA2C2053762E (range_id_id), INDEX IDX_7CC7DA2CD6328574 (place_id_id), INDEX IDX_7CC7DA2C69CCBE9A (author_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_source (video_id INT NOT NULL, source_id INT NOT NULL, INDEX IDX_67DDDFBE29C1004E (video_id), INDEX IDX_67DDDFBE953C1C61 (source_id), PRIMARY KEY(video_id, source_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE source_author ADD CONSTRAINT FK_B50FD2E953C1C61 FOREIGN KEY (source_id) REFERENCES source (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE source_author ADD CONSTRAINT FK_B50FD2EF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C2053762E FOREIGN KEY (range_id_id) REFERENCES `range` (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CD6328574 FOREIGN KEY (place_id_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C69CCBE9A FOREIGN KEY (author_id_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE video_source ADD CONSTRAINT FK_67DDDFBE29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_source ADD CONSTRAINT FK_67DDDFBE953C1C61 FOREIGN KEY (source_id) REFERENCES source (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE source_author DROP FOREIGN KEY FK_B50FD2EF675F31B');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C69CCBE9A');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CD6328574');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C2053762E');
        $this->addSql('ALTER TABLE source_author DROP FOREIGN KEY FK_B50FD2E953C1C61');
        $this->addSql('ALTER TABLE video_source DROP FOREIGN KEY FK_67DDDFBE953C1C61');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C9D86650F');
        $this->addSql('ALTER TABLE video_source DROP FOREIGN KEY FK_67DDDFBE29C1004E');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE `range`');
        $this->addSql('DROP TABLE source');
        $this->addSql('DROP TABLE source_author');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE video_source');
    }
}
