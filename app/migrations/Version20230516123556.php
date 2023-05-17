<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230516123556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD durability_indoor_uses LONGTEXT DEFAULT NULL, ADD durability_outdoor_uses LONGTEXT DEFAULT NULL, ADD tear_resistant LONGTEXT DEFAULT NULL, ADD thermal_conductivity LONGTEXT DEFAULT NULL, ADD biological_sustainability LONGTEXT DEFAULT NULL, ADD water_vapor_permeability LONGTEXT DEFAULT NULL, ADD sound_absorption LONGTEXT DEFAULT NULL, ADD fastener_strength LONGTEXT DEFAULT NULL, ADD electrical_behavior LONGTEXT DEFAULT NULL, ADD sealing LONGTEXT DEFAULT NULL, ADD density LONGTEXT DEFAULT NULL, ADD flexural_modulus_elasticity LONGTEXT DEFAULT NULL, ADD boiling_water_resistance LONGTEXT DEFAULT NULL, ADD airborne_sound_insulation LONGTEXT DEFAULT NULL, ADD tensile_strength LONGTEXT DEFAULT NULL, ADD bond_strength LONGTEXT DEFAULT NULL, ADD electrical_behavior_dissipative LONGTEXT DEFAULT NULL, ADD electrical_behavior_conductive LONGTEXT DEFAULT NULL, ADD electrical_behavior_antistatic LONGTEXT DEFAULT NULL, ADD impact_resistance LONGTEXT DEFAULT NULL, ADD scratch_resistance LONGTEXT DEFAULT NULL, ADD washability LONGTEXT DEFAULT NULL, ADD dimensional_stability LONGTEXT DEFAULT NULL, ADD heat_curving LONGTEXT DEFAULT NULL, ADD resistance_stains_chemicals LONGTEXT DEFAULT NULL, ADD light_fastness LONGTEXT DEFAULT NULL, CHANGE name name LONGTEXT DEFAULT NULL, CHANGE maker maker LONGTEXT DEFAULT NULL, CHANGE unique_code unique_code LONGTEXT DEFAULT NULL, CHANGE category category LONGTEXT DEFAULT NULL, CHANGE norm norm LONGTEXT DEFAULT NULL, CHANGE evaluation_verification_system evaluation_verification_system LONGTEXT DEFAULT NULL, CHANGE organization_notified organization_notified LONGTEXT DEFAULT NULL, CHANGE issue_date issue_date LONGTEXT DEFAULT NULL, CHANGE water_absorption water_absorption LONGTEXT DEFAULT NULL, CHANGE average_break_modulus average_break_modulus LONGTEXT DEFAULT NULL, CHANGE bending_strength bending_strength LONGTEXT DEFAULT NULL, CHANGE surface_abrasion_resistance surface_abrasion_resistance LONGTEXT DEFAULT NULL, CHANGE deep_abrasion_resistance deep_abrasion_resistance LONGTEXT DEFAULT NULL, CHANGE linear_thermal_dilation_coefficient linear_thermal_dilation_coefficient LONGTEXT DEFAULT NULL, CHANGE resistance_temperature_differences resistance_temperature_differences LONGTEXT DEFAULT NULL, CHANGE resistance_bracing resistance_bracing LONGTEXT DEFAULT NULL, CHANGE frost_resistance frost_resistance LONGTEXT DEFAULT NULL, CHANGE bonding_strength bonding_strength LONGTEXT DEFAULT NULL, CHANGE shock_resistance shock_resistance LONGTEXT DEFAULT NULL, CHANGE reaction_fire reaction_fire LONGTEXT DEFAULT NULL, CHANGE tactility tactility LONGTEXT DEFAULT NULL, CHANGE resistance_tasks resistance_tasks LONGTEXT DEFAULT NULL, CHANGE acid_base_concentrations acid_base_concentrations LONGTEXT DEFAULT NULL, CHANGE cleaning_pool_water_additives cleaning_pool_water_additives LONGTEXT DEFAULT NULL, CHANGE release_cadmium_lead release_cadmium_lead LONGTEXT DEFAULT NULL, CHANGE surface_quality surface_quality LONGTEXT DEFAULT NULL, CHANGE manufacturing_dimension_deviation manufacturing_dimension_deviation LONGTEXT DEFAULT NULL, CHANGE thickness thickness LONGTEXT DEFAULT NULL, CHANGE side_straightness side_straightness LONGTEXT DEFAULT NULL, CHANGE flatness flatness LONGTEXT DEFAULT NULL, CHANGE slip_resistance slip_resistance LONGTEXT DEFAULT NULL, CHANGE expansion_humidity expansion_humidity LONGTEXT DEFAULT NULL, CHANGE perpendicularity perpendicularity LONGTEXT DEFAULT NULL, CHANGE loss_lead_cadmium loss_lead_cadmium LONGTEXT DEFAULT NULL, CHANGE surface_flatness surface_flatness LONGTEXT DEFAULT NULL, CHANGE straightness_aretes straightness_aretes LONGTEXT DEFAULT NULL, CHANGE resistance_shocks resistance_shocks LONGTEXT DEFAULT NULL, CHANGE thermal_shock_resistance thermal_shock_resistance LONGTEXT DEFAULT NULL, CHANGE resistance_stains resistance_stains LONGTEXT DEFAULT NULL, CHANGE chemical_resistance chemical_resistance LONGTEXT DEFAULT NULL, CHANGE resistance_low_concentrations_acids_alkalis resistance_low_concentrations_acids_alkalis LONGTEXT DEFAULT NULL, CHANGE resistance_high_concentrations_acids_alkalis resistance_high_concentrations_acids_alkalis LONGTEXT DEFAULT NULL, CHANGE adhesion adhesion LONGTEXT DEFAULT NULL, CHANGE release_hazardous_substances release_hazardous_substances LONGTEXT DEFAULT NULL, CHANGE breaking_strength breaking_strength LONGTEXT DEFAULT NULL, CHANGE pentachlorophenol_content pentachlorophenol_content LONGTEXT DEFAULT NULL, CHANGE formaldehyde_emission formaldehyde_emission LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP durability_indoor_uses, DROP durability_outdoor_uses, DROP tear_resistant, DROP thermal_conductivity, DROP biological_sustainability, DROP water_vapor_permeability, DROP sound_absorption, DROP fastener_strength, DROP electrical_behavior, DROP sealing, DROP density, DROP flexural_modulus_elasticity, DROP boiling_water_resistance, DROP airborne_sound_insulation, DROP tensile_strength, DROP bond_strength, DROP electrical_behavior_dissipative, DROP electrical_behavior_conductive, DROP electrical_behavior_antistatic, DROP impact_resistance, DROP scratch_resistance, DROP washability, DROP dimensional_stability, DROP heat_curving, DROP resistance_stains_chemicals, DROP light_fastness, CHANGE name name TEXT DEFAULT NULL, CHANGE maker maker VARCHAR(255) DEFAULT NULL, CHANGE unique_code unique_code VARCHAR(255) DEFAULT NULL, CHANGE category category VARCHAR(255) DEFAULT NULL, CHANGE norm norm VARCHAR(255) DEFAULT NULL, CHANGE evaluation_verification_system evaluation_verification_system VARCHAR(255) DEFAULT NULL, CHANGE organization_notified organization_notified VARCHAR(255) DEFAULT NULL, CHANGE issue_date issue_date VARCHAR(255) DEFAULT NULL, CHANGE water_absorption water_absorption VARCHAR(255) DEFAULT NULL, CHANGE average_break_modulus average_break_modulus VARCHAR(255) DEFAULT NULL, CHANGE bending_strength bending_strength VARCHAR(255) DEFAULT NULL, CHANGE surface_abrasion_resistance surface_abrasion_resistance VARCHAR(255) DEFAULT NULL, CHANGE deep_abrasion_resistance deep_abrasion_resistance VARCHAR(255) DEFAULT NULL, CHANGE linear_thermal_dilation_coefficient linear_thermal_dilation_coefficient VARCHAR(255) DEFAULT NULL, CHANGE resistance_temperature_differences resistance_temperature_differences VARCHAR(255) DEFAULT NULL, CHANGE resistance_bracing resistance_bracing VARCHAR(255) DEFAULT NULL, CHANGE frost_resistance frost_resistance VARCHAR(255) DEFAULT NULL, CHANGE bonding_strength bonding_strength VARCHAR(255) DEFAULT NULL, CHANGE shock_resistance shock_resistance VARCHAR(255) DEFAULT NULL, CHANGE reaction_fire reaction_fire VARCHAR(255) DEFAULT NULL, CHANGE tactility tactility VARCHAR(255) DEFAULT NULL, CHANGE resistance_tasks resistance_tasks VARCHAR(255) DEFAULT NULL, CHANGE acid_base_concentrations acid_base_concentrations VARCHAR(255) DEFAULT NULL, CHANGE cleaning_pool_water_additives cleaning_pool_water_additives VARCHAR(255) DEFAULT NULL, CHANGE surface_quality surface_quality VARCHAR(255) DEFAULT NULL, CHANGE release_cadmium_lead release_cadmium_lead VARCHAR(255) DEFAULT NULL, CHANGE manufacturing_dimension_deviation manufacturing_dimension_deviation VARCHAR(255) DEFAULT NULL, CHANGE thickness thickness VARCHAR(255) DEFAULT NULL, CHANGE side_straightness side_straightness VARCHAR(255) DEFAULT NULL, CHANGE flatness flatness VARCHAR(255) DEFAULT NULL, CHANGE slip_resistance slip_resistance VARCHAR(255) DEFAULT NULL, CHANGE expansion_humidity expansion_humidity VARCHAR(255) DEFAULT NULL, CHANGE perpendicularity perpendicularity VARCHAR(255) DEFAULT NULL, CHANGE loss_lead_cadmium loss_lead_cadmium VARCHAR(255) DEFAULT NULL, CHANGE surface_flatness surface_flatness VARCHAR(255) DEFAULT NULL, CHANGE straightness_aretes straightness_aretes VARCHAR(255) DEFAULT NULL, CHANGE resistance_shocks resistance_shocks VARCHAR(255) DEFAULT NULL, CHANGE thermal_shock_resistance thermal_shock_resistance VARCHAR(255) DEFAULT NULL, CHANGE resistance_stains resistance_stains VARCHAR(255) DEFAULT NULL, CHANGE chemical_resistance chemical_resistance VARCHAR(255) DEFAULT NULL, CHANGE resistance_low_concentrations_acids_alkalis resistance_low_concentrations_acids_alkalis VARCHAR(255) DEFAULT NULL, CHANGE resistance_high_concentrations_acids_alkalis resistance_high_concentrations_acids_alkalis VARCHAR(255) DEFAULT NULL, CHANGE adhesion adhesion VARCHAR(255) DEFAULT NULL, CHANGE release_hazardous_substances release_hazardous_substances VARCHAR(255) DEFAULT NULL, CHANGE breaking_strength breaking_strength VARCHAR(255) DEFAULT NULL, CHANGE pentachlorophenol_content pentachlorophenol_content VARCHAR(255) DEFAULT NULL, CHANGE formaldehyde_emission formaldehyde_emission VARCHAR(255) DEFAULT NULL');
    }
}
