<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230309143343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE certification (id INT AUTO_INCREMENT NOT NULL, cv_id INT DEFAULT NULL, year INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_6C3C6D75CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technical_skills (id INT AUTO_INCREMENT NOT NULL, cv_id INT DEFAULT NULL, skills VARCHAR(255) NOT NULL, techniques VARCHAR(255) NOT NULL, INDEX IDX_9F014A24CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE certification ADD CONSTRAINT FK_6C3C6D75CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE technical_skills ADD CONSTRAINT FK_9F014A24CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE cv ADD experience_year INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certification DROP FOREIGN KEY FK_6C3C6D75CFE419E2');
        $this->addSql('ALTER TABLE technical_skills DROP FOREIGN KEY FK_9F014A24CFE419E2');
        $this->addSql('DROP TABLE certification');
        $this->addSql('DROP TABLE technical_skills');
        $this->addSql('ALTER TABLE cv DROP experience_year');
    }
}
