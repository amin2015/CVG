<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $maker = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $unique_code = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $norm = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $evaluation_verification_system = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $organization_notified = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $issue_date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $water_absorption = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $average_break_modulus = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bending_strength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $surface_abrasion_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $deep_abrasion_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $linear_thermal_dilation_coefficient = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_temperature_differences = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_bracing = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $frost_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bonding_strength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $shock_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reaction_fire = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $tactility = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_tasks = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $acid_base_concentrations = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $cleaning_pool_water_additives = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $surface_quality = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $release_cadmium_lead = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $manufacturing_dimension_deviation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thickness = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $side_straightness = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $flatness = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $slip_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $expansion_humidity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $perpendicularity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $loss_lead_cadmium = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $surface_flatness = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $straightness_aretes = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_shocks = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thermal_shock_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_stains = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $chemical_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_low_concentrations_acids_alkalis = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_high_concentrations_acids_alkalis = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $adhesion = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $release_hazardous_substances = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $breaking_strength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $pentachlorophenol_content = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $formaldehyde_emission = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $durability_indoor_uses = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $durability_outdoor_uses = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $tear_resistant = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thermal_conductivity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biological_sustainability = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $water_vapor_permeability = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $sound_absorption = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fastener_strength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $electrical_behavior = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $sealing = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $density = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $flexural_modulus_elasticity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $boiling_water_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $airborne_sound_insulation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $tensile_strength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bond_strength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $electrical_behavior_dissipative = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $electrical_behavior_conductive = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $electrical_behavior_antistatic = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $impact_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $scratch_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $washability = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $dimensional_stability = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heat_curving = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_stains_chemicals = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $light_fastness = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $implementation_conditions = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $emissions_cov = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $cmr_emissions = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $adhesion_adhesive_cement = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $length_Width = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $covt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $formaldehyde = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $hardness_medium_brinell = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fire_standard = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $flame_spread_index = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thermal_emission = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $solar_reflection = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $solar_reflectance_index = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $elasticity = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mechanical_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $surface_fungus_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $usage_class = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $co2_neutral = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $environmental_product_declaration = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fsc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contribution_leed = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contribution_breeam = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $hqe_contribution = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $guarantee = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $product_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $household_chemicals_pool_additives = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $average_minimum_density = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $intended_use_assembly_method = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $essence = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $terms_use = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $pcp_content = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $organic_sustainability = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $hold_bindings = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $wear_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $wear_class = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $effect_wheeled_chair = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thickness_swelling = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $locking_force = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $effect_furniture_leg = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $surface_hardness = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $static_indent = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $stain_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $general_appearance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $dimensional_changes_lightfastness = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $impact_sound_reduction = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lit_cigarette = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $floor_heating = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $restitution_coefficient = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $abrasion_resistance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $coefficient_resistance_temperature_difference = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $resistance_chemical_attack = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $insensitivity_stains = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $measurement_dynamic_coefficient_friction = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $breaking_force = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $durability_internal_external_use = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $antistatic_performance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $conductive_electrical_behavior = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $antistatic_electrical_behavior = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMaker(): ?string
    {
        return $this->maker;
    }

    public function setMaker(?string $maker): self
    {
        $this->maker = $maker;

        return $this;
    }

    public function getUniqueCode(): ?string
    {
        return $this->unique_code;
    }

    public function setUniqueCode(?string $unique_code): self
    {
        $this->unique_code = $unique_code;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getNorm(): ?string
    {
        return $this->norm;
    }

    public function setNorm(?string $norm): self
    {
        $this->norm = $norm;

        return $this;
    }

    public function getEvaluationVerificationSystem(): ?string
    {
        return $this->evaluation_verification_system;
    }

    public function setEvaluationVerificationSystem(?string $evaluation_verification_system): self
    {
        $this->evaluation_verification_system = $evaluation_verification_system;

        return $this;
    }

    public function getOrganizationNotified(): ?string
    {
        return $this->organization_notified;
    }

    public function setOrganizationNotified(?string $organization_notified): self
    {
        $this->organization_notified = $organization_notified;

        return $this;
    }

    public function getIssueDate(): ?string
    {
        return $this->issue_date;
    }

    public function setIssueDate(?string $issue_date): self
    {
        $this->issue_date = $issue_date;

        return $this;
    }

    public function getWaterAbsorption(): ?string
    {
        return $this->water_absorption;
    }

    public function setWaterAbsorption(?string $water_absorption): self
    {
        $this->water_absorption = $water_absorption;

        return $this;
    }

    public function getAverageBreakModulus(): ?string
    {
        return $this->average_break_modulus;
    }

    public function setAverageBreakModulus(?string $average_break_modulus): self
    {
        $this->average_break_modulus = $average_break_modulus;

        return $this;
    }

    public function getBendingStrength(): ?string
    {
        return $this->bending_strength;
    }

    public function setBendingStrength(?string $bending_strength): self
    {
        $this->bending_strength = $bending_strength;

        return $this;
    }

    public function getSurfaceAbrasionResistance(): ?string
    {
        return $this->surface_abrasion_resistance;
    }

    public function setSurfaceAbrasionResistance(?string $surface_abrasion_resistance): self
    {
        $this->surface_abrasion_resistance = $surface_abrasion_resistance;

        return $this;
    }

    public function getDeepAbrasionResistance(): ?string
    {
        return $this->deep_abrasion_resistance;
    }

    public function setDeepAbrasionResistance(?string $deep_abrasion_resistance): self
    {
        $this->deep_abrasion_resistance = $deep_abrasion_resistance;

        return $this;
    }

    public function getLinearThermalDilationCoefficient(): ?string
    {
        return $this->linear_thermal_dilation_coefficient;
    }

    public function setLinearThermalDilationCoefficient(?string $linear_thermal_dilation_coefficient): self
    {
        $this->linear_thermal_dilation_coefficient = $linear_thermal_dilation_coefficient;

        return $this;
    }

    public function getResistanceTemperatureDifferences(): ?string
    {
        return $this->resistance_temperature_differences;
    }

    public function setResistanceTemperatureDifferences(?string $resistance_temperature_differences): self
    {
        $this->resistance_temperature_differences = $resistance_temperature_differences;

        return $this;
    }

    public function getResistanceBracing(): ?string
    {
        return $this->resistance_bracing;
    }

    public function setResistanceBracing(?string $resistance_bracing): self
    {
        $this->resistance_bracing = $resistance_bracing;

        return $this;
    }

    public function getFrostResistance(): ?string
    {
        return $this->frost_resistance;
    }

    public function setFrostResistance(?string $frost_resistance): self
    {
        $this->frost_resistance = $frost_resistance;

        return $this;
    }

    public function getBondingStrength(): ?string
    {
        return $this->bonding_strength;
    }

    public function setBondingStrength(?string $bonding_strength): self
    {
        $this->bonding_strength = $bonding_strength;

        return $this;
    }

    public function getShockResistance(): ?string
    {
        return $this->shock_resistance;
    }

    public function setShockResistance(?string $shock_resistance): self
    {
        $this->shock_resistance = $shock_resistance;

        return $this;
    }

    public function getReactionFire(): ?string
    {
        return $this->reaction_fire;
    }

    public function setReactionFire(?string $reaction_fire): self
    {
        $this->reaction_fire = $reaction_fire;

        return $this;
    }

    public function getTactility(): ?string
    {
        return $this->tactility;
    }

    public function setTactility(?string $tactility): self
    {
        $this->tactility = $tactility;

        return $this;
    }

    public function getResistanceTasks(): ?string
    {
        return $this->resistance_tasks;
    }

    public function setResistanceTasks(?string $resistance_tasks): self
    {
        $this->resistance_tasks = $resistance_tasks;

        return $this;
    }

    public function getAcidBaseConcentrations(): ?string
    {
        return $this->acid_base_concentrations;
    }

    public function setAcidBaseConcentrations(?string $acid_base_concentrations): self
    {
        $this->acid_base_concentrations = $acid_base_concentrations;

        return $this;
    }

    public function getCleaningPoolWaterAdditives(): ?string
    {
        return $this->cleaning_pool_water_additives;
    }

    public function setCleaningPoolWaterAdditives(?string $cleaning_pool_water_additives): self
    {
        $this->cleaning_pool_water_additives = $cleaning_pool_water_additives;

        return $this;
    }

    public function getSurfaceQuality(): ?string
    {
        return $this->surface_quality;
    }

    public function setSurfaceQuality(?string $surface_quality): self
    {
        $this->surface_quality = $surface_quality;

        return $this;
    }

    public function getReleaseCadmiumLead(): ?string
    {
        return $this->release_cadmium_lead;
    }

    public function setReleaseCadmiumLead(?string $release_cadmium_lead): self
    {
        $this->release_cadmium_lead = $release_cadmium_lead;

        return $this;
    }

    public function getManufacturingDimensionDeviation(): ?string
    {
        return $this->manufacturing_dimension_deviation;
    }

    public function setManufacturingDimensionDeviation(?string $manufacturing_dimension_deviation): self
    {
        $this->manufacturing_dimension_deviation = $manufacturing_dimension_deviation;

        return $this;
    }

    public function getThickness(): ?string
    {
        return $this->thickness;
    }

    public function setThickness(?string $thickness): self
    {
        $this->thickness = $thickness;

        return $this;
    }

    public function getSideStraightness(): ?string
    {
        return $this->side_straightness;
    }

    public function setSideStraightness(?string $side_straightness): self
    {
        $this->side_straightness = $side_straightness;

        return $this;
    }

    public function getFlatness(): ?string
    {
        return $this->flatness;
    }

    public function setFlatness(?string $flatness): self
    {
        $this->flatness = $flatness;

        return $this;
    }

    public function getSlipResistance(): ?string
    {
        return $this->slip_resistance;
    }

    public function setSlipResistance(?string $slip_resistance): self
    {
        $this->slip_resistance = $slip_resistance;

        return $this;
    }

    public function getExpansionHumidity(): ?string
    {
        return $this->expansion_humidity;
    }

    public function setExpansionHumidity(?string $expansion_humidity): self
    {
        $this->expansion_humidity = $expansion_humidity;

        return $this;
    }

    public function getPerpendicularity(): ?string
    {
        return $this->perpendicularity;
    }

    public function setPerpendicularity(?string $perpendicularity): self
    {
        $this->perpendicularity = $perpendicularity;

        return $this;
    }

    public function getLossLeadCadmium(): ?string
    {
        return $this->loss_lead_cadmium;
    }

    public function setLossLeadCadmium(?string $loss_lead_cadmium): self
    {
        $this->loss_lead_cadmium = $loss_lead_cadmium;

        return $this;
    }

    public function getSurfaceFlatness(): ?string
    {
        return $this->surface_flatness;
    }

    public function setSurfaceFlatness(?string $surface_flatness): self
    {
        $this->surface_flatness = $surface_flatness;

        return $this;
    }

    public function getStraightnessAretes(): ?string
    {
        return $this->straightness_aretes;
    }

    public function setStraightnessAretes(?string $straightness_aretes): self
    {
        $this->straightness_aretes = $straightness_aretes;

        return $this;
    }

    public function getResistanceShocks(): ?string
    {
        return $this->resistance_shocks;
    }

    public function setResistanceShocks(?string $resistance_shocks): self
    {
        $this->resistance_shocks = $resistance_shocks;

        return $this;
    }

    public function getThermalShockResistance(): ?string
    {
        return $this->thermal_shock_resistance;
    }

    public function setThermalShockResistance(?string $thermal_shock_resistance): self
    {
        $this->thermal_shock_resistance = $thermal_shock_resistance;

        return $this;
    }

    public function getResistanceStains(): ?string
    {
        return $this->resistance_stains;
    }

    public function setResistanceStains(?string $resistance_stains): self
    {
        $this->resistance_stains = $resistance_stains;

        return $this;
    }

    public function getChemicalResistance(): ?string
    {
        return $this->chemical_resistance;
    }

    public function setChemicalResistance(?string $chemical_resistance): self
    {
        $this->chemical_resistance = $chemical_resistance;

        return $this;
    }

    public function getResistanceLowConcentrationsAcidsAlkalis(): ?string
    {
        return $this->resistance_low_concentrations_acids_alkalis;
    }

    public function setResistanceLowConcentrationsAcidsAlkalis(?string $resistance_low_concentrations_acids_alkalis): self
    {
        $this->resistance_low_concentrations_acids_alkalis = $resistance_low_concentrations_acids_alkalis;

        return $this;
    }

    public function getResistanceHighConcentrationsAcidsAlkalis(): ?string
    {
        return $this->resistance_high_concentrations_acids_alkalis;
    }

    public function setResistanceHighConcentrationsAcidsAlkalis(?string $resistance_high_concentrations_acids_alkalis): self
    {
        $this->resistance_high_concentrations_acids_alkalis = $resistance_high_concentrations_acids_alkalis;

        return $this;
    }

    public function getAdhesion(): ?string
    {
        return $this->adhesion;
    }

    public function setAdhesion(?string $adhesion): self
    {
        $this->adhesion = $adhesion;

        return $this;
    }

    public function getReleaseHazardousSubstances(): ?string
    {
        return $this->release_hazardous_substances;
    }

    public function setReleaseHazardousSubstances(?string $release_hazardous_substances): self
    {
        $this->release_hazardous_substances = $release_hazardous_substances;

        return $this;
    }

    public function getBreakingStrength(): ?string
    {
        return $this->breaking_strength;
    }

    public function setBreakingStrength(?string $breaking_strength): self
    {
        $this->breaking_strength = $breaking_strength;

        return $this;
    }

    public function getPentachlorophenolContent(): ?string
    {
        return $this->pentachlorophenol_content;
    }

    public function setPentachlorophenolContent(?string $pentachlorophenol_content): self
    {
        $this->pentachlorophenol_content = $pentachlorophenol_content;

        return $this;
    }

    public function getFormaldehydeEmission(): ?string
    {
        return $this->formaldehyde_emission;
    }

    public function setFormaldehydeEmission(?string $formaldehyde_emission): self
    {
        $this->formaldehyde_emission = $formaldehyde_emission;

        return $this;
    }

    public function getDurabilityIndoorUses(): ?string
    {
        return $this->durability_indoor_uses;
    }

    public function setDurabilityIndoorUses(?string $durability_indoor_uses): self
    {
        $this->durability_indoor_uses = $durability_indoor_uses;

        return $this;
    }

    public function getDurabilityOutdoorUses(): ?string
    {
        return $this->durability_outdoor_uses;
    }

    public function setDurabilityOutdoorUses(?string $durability_outdoor_uses): self
    {
        $this->durability_outdoor_uses = $durability_outdoor_uses;

        return $this;
    }

    public function getTearResistant(): ?string
    {
        return $this->tear_resistant;
    }

    public function setTearResistant(?string $tear_resistant): self
    {
        $this->tear_resistant = $tear_resistant;

        return $this;
    }

    public function getThermalConductivity(): ?string
    {
        return $this->thermal_conductivity;
    }

    public function setThermalConductivity(?string $thermal_conductivity): self
    {
        $this->thermal_conductivity = $thermal_conductivity;

        return $this;
    }

    public function getBiologicalSustainability(): ?string
    {
        return $this->biological_sustainability;
    }

    public function setBiologicalSustainability(?string $biological_sustainability): self
    {
        $this->biological_sustainability = $biological_sustainability;

        return $this;
    }

    public function getWaterVaporPermeability(): ?string
    {
        return $this->water_vapor_permeability;
    }

    public function setWaterVaporPermeability(?string $water_vapor_permeability): self
    {
        $this->water_vapor_permeability = $water_vapor_permeability;

        return $this;
    }

    public function getSoundAbsorption(): ?string
    {
        return $this->sound_absorption;
    }

    public function setSoundAbsorption(?string $sound_absorption): self
    {
        $this->sound_absorption = $sound_absorption;

        return $this;
    }

    public function getFastenerStrength(): ?string
    {
        return $this->fastener_strength;
    }

    public function setFastenerStrength(?string $fastener_strength): self
    {
        $this->fastener_strength = $fastener_strength;

        return $this;
    }

    public function getElectricalBehavior(): ?string
    {
        return $this->electrical_behavior;
    }

    public function setElectricalBehavior(?string $electrical_behavior): self
    {
        $this->electrical_behavior = $electrical_behavior;

        return $this;
    }

    public function getSealing(): ?string
    {
        return $this->sealing;
    }

    public function setSealing(?string $sealing): self
    {
        $this->sealing = $sealing;

        return $this;
    }

    public function getDensity(): ?string
    {
        return $this->density;
    }

    public function setDensity(?string $density): self
    {
        $this->density = $density;

        return $this;
    }

    public function getFlexuralModulusElasticity(): ?string
    {
        return $this->flexural_modulus_elasticity;
    }

    public function setFlexuralModulusElasticity(?string $flexural_modulus_elasticity): self
    {
        $this->flexural_modulus_elasticity = $flexural_modulus_elasticity;

        return $this;
    }

    public function getBoilingWaterResistance(): ?string
    {
        return $this->boiling_water_resistance;
    }

    public function setBoilingWaterResistance(?string $boiling_water_resistance): self
    {
        $this->boiling_water_resistance = $boiling_water_resistance;

        return $this;
    }

    public function getAirborneSoundInsulation(): ?string
    {
        return $this->airborne_sound_insulation;
    }

    public function setAirborneSoundInsulation(?string $airborne_sound_insulation): self
    {
        $this->airborne_sound_insulation = $airborne_sound_insulation;

        return $this;
    }

    public function getTensileStrength(): ?string
    {
        return $this->tensile_strength;
    }

    public function setTensileStrength(?string $tensile_strength): self
    {
        $this->tensile_strength = $tensile_strength;

        return $this;
    }

    public function getBondStrength(): ?string
    {
        return $this->bond_strength;
    }

    public function setBondStrength(?string $bond_strength): self
    {
        $this->bond_strength = $bond_strength;

        return $this;
    }

    public function getElectricalBehaviorDissipative(): ?string
    {
        return $this->electrical_behavior_dissipative;
    }

    public function setElectricalBehaviorDissipative(?string $electrical_behavior_dissipative): self
    {
        $this->electrical_behavior_dissipative = $electrical_behavior_dissipative;

        return $this;
    }

    public function getElectricalBehaviorConductive(): ?string
    {
        return $this->electrical_behavior_conductive;
    }

    public function setElectricalBehaviorConductive(?string $electrical_behavior_conductive): self
    {
        $this->electrical_behavior_conductive = $electrical_behavior_conductive;

        return $this;
    }

    public function getElectricalBehaviorAntistatic(): ?string
    {
        return $this->electrical_behavior_antistatic;
    }

    public function setElectricalBehaviorAntistatic(?string $electrical_behavior_antistatic): self
    {
        $this->electrical_behavior_antistatic = $electrical_behavior_antistatic;

        return $this;
    }

    public function getImpactResistance(): ?string
    {
        return $this->impact_resistance;
    }

    public function setImpactResistance(?string $impact_resistance): self
    {
        $this->impact_resistance = $impact_resistance;

        return $this;
    }

    public function getScratchResistance(): ?string
    {
        return $this->scratch_resistance;
    }

    public function setScratchResistance(?string $scratch_resistance): self
    {
        $this->scratch_resistance = $scratch_resistance;

        return $this;
    }

    public function getWashability(): ?string
    {
        return $this->washability;
    }

    public function setWashability(?string $washability): self
    {
        $this->washability = $washability;

        return $this;
    }

    public function getDimensionalStability(): ?string
    {
        return $this->dimensional_stability;
    }

    public function setDimensionalStability(?string $dimensional_stability): self
    {
        $this->dimensional_stability = $dimensional_stability;

        return $this;
    }

    public function getHeatCurving(): ?string
    {
        return $this->heat_curving;
    }

    public function setHeatCurving(?string $heat_curving): self
    {
        $this->heat_curving = $heat_curving;

        return $this;
    }

    public function getResistanceStainsChemicals(): ?string
    {
        return $this->resistance_stains_chemicals;
    }

    public function setResistanceStainsChemicals(?string $resistance_stains_chemicals): self
    {
        $this->resistance_stains_chemicals = $resistance_stains_chemicals;

        return $this;
    }

    public function getLightFastness(): ?string
    {
        return $this->light_fastness;
    }

    public function setLightFastness(?string $light_fastness): self
    {
        $this->light_fastness = $light_fastness;

        return $this;
    }

    public function getImplementationConditions(): ?string
    {
        return $this->implementation_conditions;
    }

    public function setImplementationConditions(?string $implementation_conditions): self
    {
        $this->implementation_conditions = $implementation_conditions;

        return $this;
    }

    public function getEmissionsCov(): ?string
    {
        return $this->emissions_cov;
    }

    public function setEmissionsCov(?string $emissions_cov): self
    {
        $this->emissions_cov = $emissions_cov;

        return $this;
    }

    public function getCmrEmissions(): ?string
    {
        return $this->cmr_emissions;
    }

    public function setCmrEmissions(?string $cmr_emissions): self
    {
        $this->cmr_emissions = $cmr_emissions;

        return $this;
    }

    public function getAdhesionAdhesiveCement(): ?string
    {
        return $this->adhesion_adhesive_cement;
    }

    public function setAdhesionAdhesiveCement(?string $adhesion_adhesive_cement): self
    {
        $this->adhesion_adhesive_cement = $adhesion_adhesive_cement;

        return $this;
    }

    public function getLengthWidth(): ?string
    {
        return $this->length_Width;
    }

    public function setLengthWidth(?string $length_Width): self
    {
        $this->length_Width = $length_Width;

        return $this;
    }

    public function getCovt(): ?string
    {
        return $this->covt;
    }

    public function setCovt(?string $covt): self
    {
        $this->covt = $covt;

        return $this;
    }

    public function getFormaldehyde(): ?string
    {
        return $this->formaldehyde;
    }

    public function setFormaldehyde(?string $formaldehyde): self
    {
        $this->formaldehyde = $formaldehyde;

        return $this;
    }

    public function getHardnessMediumBrinell(): ?string
    {
        return $this->hardness_medium_brinell;
    }

    public function setHardnessMediumBrinell(?string $hardness_medium_brinell): self
    {
        $this->hardness_medium_brinell = $hardness_medium_brinell;

        return $this;
    }

    public function getFireStandard(): ?string
    {
        return $this->fire_standard;
    }

    public function setFireStandard(?string $fire_standard): self
    {
        $this->fire_standard = $fire_standard;

        return $this;
    }

    public function getFlameSpreadIndex(): ?string
    {
        return $this->flame_spread_index;
    }

    public function setFlameSpreadIndex(?string $flame_spread_index): self
    {
        $this->flame_spread_index = $flame_spread_index;

        return $this;
    }

    public function getThermalEmission(): ?string
    {
        return $this->thermal_emission;
    }

    public function setThermalEmission(?string $thermal_emission): self
    {
        $this->thermal_emission = $thermal_emission;

        return $this;
    }

    public function getSolarReflection(): ?string
    {
        return $this->solar_reflection;
    }

    public function setSolarReflection(?string $solar_reflection): self
    {
        $this->solar_reflection = $solar_reflection;

        return $this;
    }

    public function getSolarReflectanceIndex(): ?string
    {
        return $this->solar_reflectance_index;
    }

    public function setSolarReflectanceIndex(?string $solar_reflectance_index): self
    {
        $this->solar_reflectance_index = $solar_reflectance_index;

        return $this;
    }

    public function getElasticity(): ?string
    {
        return $this->elasticity;
    }

    public function setElasticity(?string $elasticity): self
    {
        $this->elasticity = $elasticity;

        return $this;
    }

    public function getMechanicalResistance(): ?string
    {
        return $this->mechanical_resistance;
    }

    public function setMechanicalResistance(?string $mechanical_resistance): self
    {
        $this->mechanical_resistance = $mechanical_resistance;

        return $this;
    }

    public function getSurfaceFungusResistance(): ?string
    {
        return $this->surface_fungus_resistance;
    }

    public function setSurfaceFungusResistance(?string $surface_fungus_resistance): self
    {
        $this->surface_fungus_resistance = $surface_fungus_resistance;

        return $this;
    }

    public function getUsageClass(): ?string
    {
        return $this->usage_class;
    }

    public function setUsageClass(?string $usage_class): self
    {
        $this->usage_class = $usage_class;

        return $this;
    }

    public function getCo2Neutral(): ?string
    {
        return $this->co2_neutral;
    }

    public function setCo2Neutral(?string $co2_neutral): self
    {
        $this->co2_neutral = $co2_neutral;

        return $this;
    }

    public function getEnvironmentalProductDeclaration(): ?string
    {
        return $this->environmental_product_declaration;
    }

    public function setEnvironmentalProductDeclaration(?string $environmental_product_declaration): self
    {
        $this->environmental_product_declaration = $environmental_product_declaration;

        return $this;
    }

    public function getFsc(): ?string
    {
        return $this->fsc;
    }

    public function setFsc(?string $fsc): self
    {
        $this->fsc = $fsc;

        return $this;
    }

    public function getContributionLeed(): ?string
    {
        return $this->contribution_leed;
    }

    public function setContributionLeed(?string $contribution_leed): self
    {
        $this->contribution_leed = $contribution_leed;

        return $this;
    }

    public function getContributionBreeam(): ?string
    {
        return $this->contribution_breeam;
    }

    public function setContributionBreeam(?string $contribution_breeam): self
    {
        $this->contribution_breeam = $contribution_breeam;

        return $this;
    }

    public function getHqeContribution(): ?string
    {
        return $this->hqe_contribution;
    }

    public function setHqeContribution(?string $hqe_contribution): self
    {
        $this->hqe_contribution = $hqe_contribution;

        return $this;
    }

    public function getGuarantee(): ?string
    {
        return $this->guarantee;
    }

    public function setGuarantee(?string $guarantee): self
    {
        $this->guarantee = $guarantee;

        return $this;
    }

    public function getProductResistance(): ?string
    {
        return $this->product_resistance;
    }

    public function setProductResistance(?string $product_resistance): self
    {
        $this->product_resistance = $product_resistance;

        return $this;
    }

    public function getHouseholdChemicalsPoolAdditives(): ?string
    {
        return $this->household_chemicals_pool_additives;
    }

    public function setHouseholdChemicalsPoolAdditives(?string $household_chemicals_pool_additives): self
    {
        $this->household_chemicals_pool_additives = $household_chemicals_pool_additives;

        return $this;
    }

    public function getAverageMinimumDensity(): ?string
    {
        return $this->average_minimum_density;
    }

    public function setAverageMinimumDensity(?string $average_minimum_density): self
    {
        $this->average_minimum_density = $average_minimum_density;

        return $this;
    }

    public function getIntendedUseAssemblyMethod(): ?string
    {
        return $this->intended_use_assembly_method;
    }

    public function setIntendedUseAssemblyMethod(?string $intended_use_assembly_method): self
    {
        $this->intended_use_assembly_method = $intended_use_assembly_method;

        return $this;
    }

    public function getEssence(): ?string
    {
        return $this->essence;
    }

    public function setEssence(?string $essence): self
    {
        $this->essence = $essence;

        return $this;
    }

    public function getTermsUse(): ?string
    {
        return $this->terms_use;
    }

    public function setTermsUse(?string $terms_use): self
    {
        $this->terms_use = $terms_use;

        return $this;
    }

    public function getPcpContent(): ?string
    {
        return $this->pcp_content;
    }

    public function setPcpContent(?string $pcp_content): self
    {
        $this->pcp_content = $pcp_content;

        return $this;
    }

    public function getOrganicSustainability(): ?string
    {
        return $this->organic_sustainability;
    }

    public function setOrganicSustainability(?string $organic_sustainability): self
    {
        $this->organic_sustainability = $organic_sustainability;

        return $this;
    }

    public function getHoldBindings(): ?string
    {
        return $this->hold_bindings;
    }

    public function setHoldBindings(?string $hold_bindings): self
    {
        $this->hold_bindings = $hold_bindings;

        return $this;
    }

    public function getWearResistance(): ?string
    {
        return $this->wear_resistance;
    }

    public function setWearResistance(?string $wear_resistance): self
    {
        $this->wear_resistance = $wear_resistance;

        return $this;
    }

    public function getWearClass(): ?string
    {
        return $this->wear_class;
    }

    public function setWearClass(?string $wear_class): self
    {
        $this->wear_class = $wear_class;

        return $this;
    }

    public function getEffectWheeledChair(): ?string
    {
        return $this->effect_wheeled_chair;
    }

    public function setEffectWheeledChair(?string $effect_wheeled_chair): self
    {
        $this->effect_wheeled_chair = $effect_wheeled_chair;

        return $this;
    }

    public function getThicknessSwelling(): ?string
    {
        return $this->thickness_swelling;
    }

    public function setThicknessSwelling(?string $thickness_swelling): self
    {
        $this->thickness_swelling = $thickness_swelling;

        return $this;
    }

    public function getLockingForce(): ?string
    {
        return $this->locking_force;
    }

    public function setLockingForce(?string $locking_force): self
    {
        $this->locking_force = $locking_force;

        return $this;
    }

    public function getEffectFurnitureLeg(): ?string
    {
        return $this->effect_furniture_leg;
    }

    public function setEffectFurnitureLeg(?string $effect_furniture_leg): self
    {
        $this->effect_furniture_leg = $effect_furniture_leg;

        return $this;
    }

    public function getSurfaceHardness(): ?string
    {
        return $this->surface_hardness;
    }

    public function setSurfaceHardness(?string $surface_hardness): self
    {
        $this->surface_hardness = $surface_hardness;

        return $this;
    }

    public function getStaticIndent(): ?string
    {
        return $this->static_indent;
    }

    public function setStaticIndent(?string $static_indent): self
    {
        $this->static_indent = $static_indent;

        return $this;
    }

    public function getStainResistance(): ?string
    {
        return $this->stain_resistance;
    }

    public function setStainResistance(?string $stain_resistance): self
    {
        $this->stain_resistance = $stain_resistance;

        return $this;
    }

    public function getGeneralAppearance(): ?string
    {
        return $this->general_appearance;
    }

    public function setGeneralAppearance(?string $general_appearance): self
    {
        $this->general_appearance = $general_appearance;

        return $this;
    }

    public function getDimensionalChangesLightfastness(): ?string
    {
        return $this->dimensional_changes_lightfastness;
    }

    public function setDimensionalChangesLightfastness(?string $dimensional_changes_lightfastness): self
    {
        $this->dimensional_changes_lightfastness = $dimensional_changes_lightfastness;

        return $this;
    }

    public function getImpactSoundReduction(): ?string
    {
        return $this->impact_sound_reduction;
    }

    public function setImpactSoundReduction(?string $impact_sound_reduction): self
    {
        $this->impact_sound_reduction = $impact_sound_reduction;

        return $this;
    }

    public function getLitCigarette(): ?string
    {
        return $this->lit_cigarette;
    }

    public function setLitCigarette(?string $lit_cigarette): self
    {
        $this->lit_cigarette = $lit_cigarette;

        return $this;
    }

    public function getFloorHeating(): ?string
    {
        return $this->floor_heating;
    }

    public function setFloorHeating(?string $floor_heating): self
    {
        $this->floor_heating = $floor_heating;

        return $this;
    }

    public function getRestitutionCoefficient(): ?string
    {
        return $this->restitution_coefficient;
    }

    public function setRestitutionCoefficient(?string $restitution_coefficient): self
    {
        $this->restitution_coefficient = $restitution_coefficient;

        return $this;
    }

    public function getAbrasionResistance(): ?string
    {
        return $this->abrasion_resistance;
    }

    public function setAbrasionResistance(?string $abrasion_resistance): self
    {
        $this->abrasion_resistance = $abrasion_resistance;

        return $this;
    }

    public function getCoefficientResistanceTemperatureDifference(): ?string
    {
        return $this->coefficient_resistance_temperature_difference;
    }

    public function setCoefficientResistanceTemperatureDifference(?string $coefficient_resistance_temperature_difference): self
    {
        $this->coefficient_resistance_temperature_difference = $coefficient_resistance_temperature_difference;

        return $this;
    }

    public function getResistanceChemicalAttack(): ?string
    {
        return $this->resistance_chemical_attack;
    }

    public function setResistanceChemicalAttack(?string $resistance_chemical_attack): self
    {
        $this->resistance_chemical_attack = $resistance_chemical_attack;

        return $this;
    }

    public function getInsensitivityStains(): ?string
    {
        return $this->insensitivity_stains;
    }

    public function setInsensitivityStains(?string $insensitivity_stains): self
    {
        $this->insensitivity_stains = $insensitivity_stains;

        return $this;
    }

    public function getMeasurementDynamicCoefficientFriction(): ?string
    {
        return $this->measurement_dynamic_coefficient_friction;
    }

    public function setMeasurementDynamicCoefficientFriction(?string $measurement_dynamic_coefficient_friction): self
    {
        $this->measurement_dynamic_coefficient_friction = $measurement_dynamic_coefficient_friction;

        return $this;
    }

    public function getBreakingForce(): ?string
    {
        return $this->breaking_force;
    }

    public function setBreakingForce(?string $breaking_force): self
    {
        $this->breaking_force = $breaking_force;

        return $this;
    }

    public function getDurabilityInternalExternalUse(): ?string
    {
        return $this->durability_internal_external_use;
    }

    public function setDurabilityInternalExternalUse(?string $durability_internal_external_use): self
    {
        $this->durability_internal_external_use = $durability_internal_external_use;

        return $this;
    }

    public function getAntistaticPerformance(): ?string
    {
        return $this->antistatic_performance;
    }

    public function setAntistaticPerformance(?string $antistatic_performance): self
    {
        $this->antistatic_performance = $antistatic_performance;

        return $this;
    }

    public function getConductiveElectricalBehavior(): ?string
    {
        return $this->conductive_electrical_behavior;
    }

    public function setConductiveElectricalBehavior(?string $conductive_electrical_behavior): self
    {
        $this->conductive_electrical_behavior = $conductive_electrical_behavior;

        return $this;
    }

    public function getAntistaticElectricalBehavior(): ?string
    {
        return $this->antistatic_electrical_behavior;
    }

    public function setAntistaticElectricalBehavior(?string $antistatic_electrical_behavior): self
    {
        $this->antistatic_electrical_behavior = $antistatic_electrical_behavior;

        return $this;
    }
}
