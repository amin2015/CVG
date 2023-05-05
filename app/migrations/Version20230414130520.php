<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414130520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(600) DEFAULT NULL, maker VARCHAR(255) DEFAULT NULL, unique_code VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, norm VARCHAR(255) DEFAULT NULL, evaluation_verification_system VARCHAR(255) DEFAULT NULL, organization_notified VARCHAR(255) DEFAULT NULL, issue_date VARCHAR(255) DEFAULT NULL, water_absorption VARCHAR(255) DEFAULT NULL, average_break_modulus VARCHAR(255) DEFAULT NULL, bending_strength VARCHAR(255) DEFAULT NULL, surface_abrasion_resistance VARCHAR(255) DEFAULT NULL, deep_abrasion_resistance VARCHAR(255) DEFAULT NULL, linear_thermal_dilation_coefficient VARCHAR(255) DEFAULT NULL, resistance_temperature_differences VARCHAR(255) DEFAULT NULL, resistance_bracing VARCHAR(255) DEFAULT NULL, frost_resistance VARCHAR(255) DEFAULT NULL, bonding_strength VARCHAR(255) DEFAULT NULL, shock_resistance VARCHAR(255) DEFAULT NULL, reaction_fire VARCHAR(255) DEFAULT NULL, tactility VARCHAR(255) DEFAULT NULL, resistance_tasks VARCHAR(255) DEFAULT NULL, acid_base_concentrations VARCHAR(255) DEFAULT NULL, cleaning_pool_water_additives VARCHAR(255) DEFAULT NULL, release_cadmium_lead VARCHAR(255), surface_quality VARCHAR(255) DEFAULT NULL, manufacturing_dimension_deviation VARCHAR(255) DEFAULT NULL, thickness VARCHAR(255) DEFAULT NULL, side_straightness VARCHAR(255) DEFAULT NULL, flatness VARCHAR(255) DEFAULT NULL, slip_resistance VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cv CHANGE footer footer LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE cv CHANGE footer footer VARCHAR(255) DEFAULT NULL');
    }
}
