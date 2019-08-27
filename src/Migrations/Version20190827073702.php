<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190827073702 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article_photo');
        $this->addSql('ALTER TABLE article CHANGE author_id_id author_id_id INT DEFAULT NULL, CHANGE user_id_id user_id_id INT DEFAULT NULL, CHANGE category_id_id category_id_id INT DEFAULT NULL, CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE period_id_id period_id_id INT DEFAULT NULL, CHANGE subtitle subtitle VARCHAR(60) DEFAULT NULL, CHANGE orientation_date orientation_date TINYINT(1) DEFAULT NULL, CHANGE date date DATE DEFAULT NULL, CHANGE adding_date adding_date DATETIME DEFAULT NULL, CHANGE lastest_modification lastest_modification DATETIME DEFAULT NULL, CHANGE topic topic VARCHAR(50) DEFAULT NULL, CHANGE publicated publicated TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE article_section ADD path VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE author CHANGE name name VARCHAR(20) DEFAULT NULL, CHANGE surname surname VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE photo CHANGE user_id_id user_id_id INT DEFAULT NULL, CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE author_id_id author_id_id INT DEFAULT NULL, CHANGE category_id_id category_id_id INT DEFAULT NULL, CHANGE period_id_id period_id_id INT DEFAULT NULL, CHANGE title title VARCHAR(60) DEFAULT NULL, CHANGE format format VARCHAR(15) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE adding_date adding_date DATETIME DEFAULT NULL, CHANGE subtitle subtitle VARCHAR(60) DEFAULT NULL, CHANGE lastest_modification lastest_modification DATETIME DEFAULT NULL, CHANGE topic topic VARCHAR(60) DEFAULT NULL');
        $this->addSql('ALTER TABLE source CHANGE date date DATE DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(20) DEFAULT NULL, CHANGE surname surname VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE video CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE period_id_id period_id_id INT DEFAULT NULL, CHANGE orientation_date orientation_date TINYINT(1) DEFAULT NULL, CHANGE format format VARCHAR(10) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE adding_date adding_date DATETIME DEFAULT NULL, CHANGE subtitle subtitle VARCHAR(60) DEFAULT NULL, CHANGE lastest_modification lastest_modification DATETIME DEFAULT NULL, CHANGE publicated publicated TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article_photo (id INT AUTO_INCREMENT NOT NULL, article_id_id INT NOT NULL, path VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, section_no INT NOT NULL, INDEX IDX_6300F6098F3EC46 (article_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article_photo ADD CONSTRAINT FK_6300F6098F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article CHANGE author_id_id author_id_id INT DEFAULT NULL, CHANGE user_id_id user_id_id INT DEFAULT NULL, CHANGE category_id_id category_id_id INT DEFAULT NULL, CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE period_id_id period_id_id INT DEFAULT NULL, CHANGE subtitle subtitle VARCHAR(60) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE orientation_date orientation_date TINYINT(1) DEFAULT \'NULL\', CHANGE date date DATE DEFAULT \'NULL\', CHANGE adding_date adding_date DATETIME DEFAULT \'NULL\', CHANGE lastest_modification lastest_modification DATETIME DEFAULT \'NULL\', CHANGE topic topic VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE publicated publicated TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE article_section DROP path');
        $this->addSql('ALTER TABLE author CHANGE name name VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE surname surname VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE photo CHANGE user_id_id user_id_id INT DEFAULT NULL, CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE author_id_id author_id_id INT DEFAULT NULL, CHANGE category_id_id category_id_id INT DEFAULT NULL, CHANGE period_id_id period_id_id INT DEFAULT NULL, CHANGE title title VARCHAR(60) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE format format VARCHAR(15) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE size size INT DEFAULT NULL, CHANGE adding_date adding_date DATETIME DEFAULT \'NULL\', CHANGE subtitle subtitle VARCHAR(60) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE lastest_modification lastest_modification DATETIME DEFAULT \'NULL\', CHANGE topic topic VARCHAR(60) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE source CHANGE date date DATE DEFAULT \'NULL\', CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE surname surname VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE video CHANGE place_id_id place_id_id INT DEFAULT NULL, CHANGE period_id_id period_id_id INT DEFAULT NULL, CHANGE orientation_date orientation_date TINYINT(1) DEFAULT \'NULL\', CHANGE format format VARCHAR(10) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE size size INT DEFAULT NULL, CHANGE adding_date adding_date DATETIME DEFAULT \'NULL\', CHANGE subtitle subtitle VARCHAR(60) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE lastest_modification lastest_modification DATETIME DEFAULT \'NULL\', CHANGE publicated publicated TINYINT(1) DEFAULT \'NULL\'');
    }
}
