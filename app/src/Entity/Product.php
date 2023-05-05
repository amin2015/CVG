<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $maker = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $unique_code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $norm = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $evaluation_verification_system = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $organization_notified = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $issue_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $water_absorption = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $average_break_modulus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bending_strength = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surface_abrasion_resistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deep_abrasion_resistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linear_thermal_dilation_coefficient = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resistance_temperature_differences = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resistance_bracing = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $frost_resistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bonding_strength = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shock_resistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reaction_fire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tactility = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resistance_tasks = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $acid_base_concentrations = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cleaning_pool_water_additives = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surface_quality = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $release_cadmium_lead = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $manufacturing_dimension_deviation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thickness = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $side_straightness = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $flatness = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slip_resistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $expansion_humidity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $perpendicularity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $loss_lead_cadmium = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surface_flatness = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $straightness_aretes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resistance_shocks = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thermal_shock_resistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resistance_stains = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $chemical_resistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resistance_low_concentrations_acids_alkalis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resistance_high_concentrations_acids_alkalis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adhesion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $release_hazardous_substances = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $breaking_strength = null;

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
}
