<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306091553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, header_title VARCHAR(255) NOT NULL, header_skills VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, technical_skills LONGTEXT NOT NULL, trainings LONGTEXT NOT NULL, reference LONGTEXT NOT NULL, personnel_projects LONGTEXT NOT NULL, language LONGTEXT NOT NULL, professional_experience LONGTEXT NOT NULL, logo VARCHAR(255) NOT NULL, head LONGTEXT NOT NULL, footer LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_theme (id INT AUTO_INCREMENT NOT NULL, theme_id INT DEFAULT NULL, year INT DEFAULT NULL, qualification VARCHAR(255) DEFAULT NULL, skills_title VARCHAR(255) DEFAULT NULL, skills_description LONGTEXT DEFAULT NULL, INDEX IDX_7B3183B159027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, cv_id INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_9775E708CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sub_theme ADD CONSTRAINT FK_7B3183B159027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE theme ADD CONSTRAINT FK_9775E708CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_theme DROP FOREIGN KEY FK_7B3183B159027487');
        $this->addSql('ALTER TABLE theme DROP FOREIGN KEY FK_9775E708CFE419E2');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE sub_theme');
        $this->addSql('DROP TABLE theme');
    }
}
