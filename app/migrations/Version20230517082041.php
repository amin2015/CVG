<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517082041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD implementation_conditions LONGTEXT DEFAULT NULL, ADD emissions_cov LONGTEXT DEFAULT NULL, ADD cmr_emissions LONGTEXT DEFAULT NULL, ADD adhesion_adhesive_cement LONGTEXT DEFAULT NULL, ADD length_width LONGTEXT DEFAULT NULL, ADD covt LONGTEXT DEFAULT NULL, ADD formaldehyde LONGTEXT DEFAULT NULL, ADD hardness_medium_brinell LONGTEXT DEFAULT NULL, ADD fire_standard LONGTEXT DEFAULT NULL, ADD flame_spread_index LONGTEXT DEFAULT NULL, ADD thermal_emission LONGTEXT DEFAULT NULL, ADD solar_reflection LONGTEXT DEFAULT NULL, ADD solar_reflectance_index LONGTEXT DEFAULT NULL, ADD elasticity LONGTEXT DEFAULT NULL, ADD mechanical_resistance LONGTEXT DEFAULT NULL, ADD surface_fungus_resistance LONGTEXT DEFAULT NULL, ADD usage_class LONGTEXT DEFAULT NULL, ADD co2_neutral LONGTEXT DEFAULT NULL, ADD environmental_product_declaration LONGTEXT DEFAULT NULL, ADD fsc LONGTEXT DEFAULT NULL, ADD contribution_leed LONGTEXT DEFAULT NULL, ADD contribution_breeam LONGTEXT DEFAULT NULL, ADD hqe_contribution LONGTEXT DEFAULT NULL, ADD guarantee LONGTEXT DEFAULT NULL, ADD product_resistance LONGTEXT DEFAULT NULL, ADD household_chemicals_pool_additives LONGTEXT DEFAULT NULL, ADD average_minimum_density LONGTEXT DEFAULT NULL, ADD intended_use_assembly_method LONGTEXT DEFAULT NULL, ADD essence LONGTEXT DEFAULT NULL, ADD terms_use LONGTEXT DEFAULT NULL, ADD pcp_content LONGTEXT DEFAULT NULL, ADD organic_sustainability LONGTEXT DEFAULT NULL, ADD hold_bindings LONGTEXT DEFAULT NULL, ADD wear_resistance LONGTEXT DEFAULT NULL, ADD wear_class LONGTEXT DEFAULT NULL, ADD effect_wheeled_chair LONGTEXT DEFAULT NULL, ADD thickness_swelling LONGTEXT DEFAULT NULL, ADD locking_force LONGTEXT DEFAULT NULL, ADD effect_furniture_leg LONGTEXT DEFAULT NULL, ADD surface_hardness LONGTEXT DEFAULT NULL, ADD static_indent LONGTEXT DEFAULT NULL, ADD stain_resistance LONGTEXT DEFAULT NULL, ADD general_appearance LONGTEXT DEFAULT NULL, ADD dimensional_changes_lightfastness LONGTEXT DEFAULT NULL, ADD impact_sound_reduction LONGTEXT DEFAULT NULL, ADD lit_cigarette LONGTEXT DEFAULT NULL, ADD floor_heating LONGTEXT DEFAULT NULL, ADD restitution_coefficient LONGTEXT DEFAULT NULL, ADD abrasion_resistance LONGTEXT DEFAULT NULL, ADD coefficient_resistance_temperature_difference LONGTEXT DEFAULT NULL, ADD resistance_chemical_attack LONGTEXT DEFAULT NULL, ADD insensitivity_stains LONGTEXT DEFAULT NULL, ADD measurement_dynamic_coefficient_friction LONGTEXT DEFAULT NULL, ADD breaking_force LONGTEXT DEFAULT NULL, ADD durability_internal_external_use LONGTEXT DEFAULT NULL, ADD antistatic_performance LONGTEXT DEFAULT NULL, ADD conductive_electrical_behavior LONGTEXT DEFAULT NULL, ADD antistatic_electrical_behavior LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP implementation_conditions, DROP emissions_cov, DROP cmr_emissions, DROP adhesion_adhesive_cement, DROP length_width, DROP covt, DROP formaldehyde, DROP hardness_medium_brinell, DROP fire_standard, DROP flame_spread_index, DROP thermal_emission, DROP solar_reflection, DROP solar_reflectance_index, DROP elasticity, DROP mechanical_resistance, DROP surface_fungus_resistance, DROP usage_class, DROP co2_neutral, DROP environmental_product_declaration, DROP fsc, DROP contribution_leed, DROP contribution_breeam, DROP hqe_contribution, DROP guarantee, DROP product_resistance, DROP household_chemicals_pool_additives, DROP average_minimum_density, DROP intended_use_assembly_method, DROP essence, DROP terms_use, DROP pcp_content, DROP organic_sustainability, DROP hold_bindings, DROP wear_resistance, DROP wear_class, DROP effect_wheeled_chair, DROP thickness_swelling, DROP locking_force, DROP effect_furniture_leg, DROP surface_hardness, DROP static_indent, DROP stain_resistance, DROP general_appearance, DROP dimensional_changes_lightfastness, DROP impact_sound_reduction, DROP lit_cigarette, DROP floor_heating, DROP restitution_coefficient, DROP abrasion_resistance, DROP coefficient_resistance_temperature_difference, DROP resistance_chemical_attack, DROP insensitivity_stains, DROP measurement_dynamic_coefficient_friction, DROP breaking_force, DROP durability_internal_external_use, DROP antistatic_performance, DROP conductive_electrical_behavior, DROP antistatic_electrical_behavior');
    }
}
