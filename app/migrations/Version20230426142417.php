<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426142417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD expansion_humidity VARCHAR(255) DEFAULT NULL, ADD perpendicularity VARCHAR(255) DEFAULT NULL, ADD loss_lead_cadmium VARCHAR(255) DEFAULT NULL, ADD surface_flatness VARCHAR(255) DEFAULT NULL, ADD straightness_aretes VARCHAR(255) DEFAULT NULL, ADD resistance_shocks VARCHAR(255) DEFAULT NULL, ADD thermal_shock_resistance VARCHAR(255) DEFAULT NULL, ADD resistance_stains VARCHAR(255) DEFAULT NULL, ADD chemical_resistance VARCHAR(255) DEFAULT NULL, ADD resistance_low_concentrations_acids_alkalis VARCHAR(255) DEFAULT NULL, ADD resistance_high_concentrations_acids_alkalis VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP expansion_humidity, DROP perpendicularity, DROP loss_lead_cadmium, DROP surface_flatness, DROP straightness_aretes, DROP resistance_shocks, DROP thermal_shock_resistance, DROP resistance_stains, DROP chemical_resistance, DROP resistance_low_concentrations_acids_alkalis, DROP resistance_high_concentrations_acids_alkalis');
    }
}
