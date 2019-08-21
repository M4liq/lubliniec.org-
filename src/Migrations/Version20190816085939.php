<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190816085939 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, author_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, category_id_id INT DEFAULT NULL, place_id_id INT DEFAULT NULL, range_id_id INT DEFAULT NULL, title VARCHAR(60) NOT NULL, subtitle VARCHAR(60) DEFAULT NULL, orientation_date TINYINT(1) DEFAULT NULL, date DATE DEFAULT NULL, adding_date DATETIME DEFAULT NULL, lastest_modification DATETIME DEFAULT NULL, topic VARCHAR(50) DEFAULT NULL, publicated TINYINT(1) DEFAULT NULL, INDEX IDX_23A0E6669CCBE9A (author_id_id), INDEX IDX_23A0E669D86650F (user_id_id), INDEX IDX_23A0E669777D11E (category_id_id), INDEX IDX_23A0E66D6328574 (place_id_id), INDEX IDX_23A0E662053762E (range_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_photo (id INT AUTO_INCREMENT NOT NULL, article_id_id INT NOT NULL, path VARCHAR(255) NOT NULL, section_no INT NOT NULL, INDEX IDX_6300F6098F3EC46 (article_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_section (id INT AUTO_INCREMENT NOT NULL, article_id_id INT NOT NULL, section_no INT NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_C0A13E588F3EC46 (article_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, range_id_id INT DEFAULT NULL, place_id_id INT DEFAULT NULL, author_id_id INT DEFAULT NULL, category_id_id INT DEFAULT NULL, date DATE NOT NULL, orientation_date TINYINT(1) NOT NULL, title VARCHAR(60) DEFAULT NULL, format VARCHAR(15) DEFAULT NULL, size INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, path VARCHAR(255) NOT NULL, adding_date DATETIME DEFAULT NULL, subtitle VARCHAR(60) DEFAULT NULL, lastest_modification DATETIME DEFAULT NULL, topic VARCHAR(60) DEFAULT NULL, publicated TINYINT(1) NOT NULL, INDEX IDX_14B784189D86650F (user_id_id), INDEX IDX_14B784182053762E (range_id_id), INDEX IDX_14B78418D6328574 (place_id_id), INDEX IDX_14B7841869CCBE9A (author_id_id), INDEX IDX_14B784189777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6669CCBE9A FOREIGN KEY (author_id_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D6328574 FOREIGN KEY (place_id_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E662053762E FOREIGN KEY (range_id_id) REFERENCES `range` (id)');
        $this->addSql('ALTER TABLE article_photo ADD CONSTRAINT FK_6300F6098F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article_section ADD CONSTRAINT FK_C0A13E588F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784182053762E FOREIGN KEY (range_id_id) REFERENCES `range` (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418D6328574 FOREIGN KEY (place_id_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841869CCBE9A FOREIGN KEY (author_id_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE author CHANGE name name VARCHAR(20) DEFAULT NULL, CHANGE surname surname VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE `range` CHANGE name name VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE source CHANGE date date DATE DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(20) DEFAULT NULL, CHANGE surname surname VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE video CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE orientation_date orientation_date TINYINT(1) DEFAULT NULL, CHANGE title title VARCHAR(60) NOT NULL, CHANGE format format VARCHAR(10) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE adding_date adding_date DATETIME DEFAULT NULL, CHANGE subtitle subtitle VARCHAR(60) DEFAULT NULL, CHANGE lastest_modification lastest_modification DATETIME DEFAULT NULL, CHANGE publicated publicated TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_photo DROP FOREIGN KEY FK_6300F6098F3EC46');
        $this->addSql('ALTER TABLE article_section DROP FOREIGN KEY FK_C0A13E588F3EC46');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_photo');
        $this->addSql('DROP TABLE article_section');
        $this->addSql('DROP TABLE photo');
        $this->addSql('ALTER TABLE author CHANGE name name VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE surname surname VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE `range` CHANGE name name VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE source CHANGE date date DATE DEFAULT \'NULL\', CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE surname surname VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE video CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE orientation_date orientation_date TINYINT(1) DEFAULT \'NULL\', CHANGE title title VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE format format VARCHAR(10) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE size size INT DEFAULT NULL, CHANGE adding_date adding_date DATETIME DEFAULT \'NULL\', CHANGE subtitle subtitle VARCHAR(35) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE lastest_modification lastest_modification DATETIME DEFAULT \'NULL\', CHANGE publicated publicated TINYINT(1) DEFAULT \'NULL\'');
    }
}
