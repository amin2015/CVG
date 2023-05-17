<?php

namespace App\Command;

use App\Entity\Product;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;

#[AsCommand(
    name: "app:product-insert",
    description: "Add a short description for your command",
)]
class ProductInsertCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption("filename", null, InputOption::VALUE_OPTIONAL, "File name");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Generate data file products
        $file = @fopen(__DIR__ . "/../../public/product/data.txt", "r+");
        @ftruncate($file, 0);
        $excelDir = __DIR__ . "/../../public/excel/";
        // One client (with file name)
        if ($input->getOption("filename")) {
            $filename = $excelDir . $input->getOption("filename") . ".xlsx";
            if (!file_exists($filename)) {
                throw new \Exception("Invalid file passed" . $input->getOption("filename"));
            }
            $this->loadFile($filename, $output);
        }
        // All clients
        else {
            $execlFiles = array_diff(scandir($excelDir), array('.', '..'));
            foreach ($execlFiles as $filename) {
                if (is_file($excelDir . $filename) && !str_contains($filename, '.~lock')) {
                    $this->loadFile($excelDir . $filename, $output);
                }
            }
        }
        return Command::SUCCESS;
    }

    /**
     * @param $file
     * @param OutputInterface $output
     * @return void
     */
    private function loadFile($file, OutputInterface $output)
    {
        // Here we are able to read from the excel file
        $spreadsheet = IOFactory::load($file);
        // Here, the read data is turned into an array
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        // Parse the sheet data
        foreach ($sheetData as $k => $Row) {
            if ($k === 1 && !is_null($Row)) {
                foreach ($Row as $index => $value) {
                    if (isset($value)) {
                        $arrayTitle[$index] = mb_strtolower(trim($value));
                    }
                }
            }
            if ($k != 1 && !is_null($Row["A"])) {
                $product = new Product();
                // Set properties
                foreach ($arrayTitle as $key => $title) {
                    if (isset($title)) {
                        // Write non-redundant data in txt file
                        $file = file_get_contents(__DIR__ . "/../../public/product/data.txt");
                        if (!strstr($file, $title)) {
                            file_put_contents(__DIR__ . "/../../public/product/data.txt", "\n" . $title, FILE_APPEND);
                        }
                        switch ($title) {
                            case "nom de produit" :
                                $product->setName($Row[$key]);
                                break;
                            case "fabricant" :
                                $product->setMaker($Row[$key]);
                                break;
                            case "code unique" :
                                $product->setUniqueCode($Row[$key]);
                                break;
                            case "categorie" :
                                $product->setCategory($Row[$key]);
                                break;
                            case "norme" :
                                $product->setNorm($Row[$key]);
                                break;
                            case "système(s) d’évaluation et de vérification" :
                                $product->setEvaluationVerificationSystem($Row[$key]);
                                break;
                            case "systeme d’evaluation" :
                                $product->setEvaluationVerificationSystem($Row[$key]);
                                break;
                            case "systeme d'evaluation" :
                                $product->setEvaluationVerificationSystem($Row[$key]);
                                break;
                            case "organisme notifié" :
                                $product->setOrganizationNotified($Row[$key]);
                                break;
                            case "organisme notifie" :
                                $product->setOrganizationNotified($Row[$key]);
                                break;
                            case "date d'émission" :
                                $product->setIssueDate($Row[$key]);
                                break;
                            case "date d'emission" :
                                $product->setIssueDate($Row[$key]);
                                break;
                            case "absorption d’eau" :
                                $product->setWaterAbsorption($Row[$key]);
                                break;
                            case "module de rupture (N/mm2) moyenne" :
                                $product->setAverageBreakModulus($Row[$key]);
                                break;
                            case "résistance à la flexion" :
                                $product->setBendingStrength($Row[$key]);
                                break;
                            case "resistance a la flexion" :
                                $product->setBendingStrength($Row[$key]);
                                break;
                            case "résistance à l’abrasion superficielle" :
                                $product->setSurfaceAbrasionResistance($Row[$key]);
                                break;
                            case "résistance à l’abrasion profonde" :
                                $product->setDeepAbrasionResistance($Row[$key]);
                                break;
                            case "coefficient de dilatation thermique linéaire" :
                                $product->setLinearThermalDilationCoefficient($Row[$key]);
                                break;
                            case "coefficient de dilatation thermique lineaire" :
                                $product->setLinearThermalDilationCoefficient($Row[$key]);
                                break;
                            case "dilatation thermique linear" :
                                $product->setLinearThermalDilationCoefficient($Row[$key]);
                                break;
                            case "résistance aux écarts de température" :
                                $product->setResistanceTemperatureDifferences($Row[$key]);
                                break;
                            case "résistance au tressaillage" :
                                $product->setResistanceBracing($Row[$key]);
                                break;
                            case "résistance au gel" :
                                $product->setFrostResistance($Row[$key]);
                                break;
                            case "résistance au gel/dégel" :
                                $product->setFrostResistance($Row[$key]);
                                break;
                            case "resistance au gel" :
                                $product->setFrostResistance($Row[$key]);
                                break;
                            case "résistance du collage" :
                                $product->setBondingStrength($Row[$key]);
                                break;
                            case "résistance au choc" :
                                $product->setResistanceShocks($Row[$key]);
                                break;
                            case "résistance aux chocs" :
                                $product->setResistanceShocks($Row[$key]);
                                break;
                            case "resistance aux chocs" :
                                $product->setResistanceShocks($Row[$key]);
                                break;
                            case "réaction au feu" :
                                $product->setReactionFire($Row[$key]);
                                break;
                            case "reaction au feu" :
                                $product->setReactionFire($Row[$key]);
                                break;
                            case "résistance au feu" :
                                $product->setReactionFire($Row[$key]);
                                break;
                            case "durabilité vis-à-vis du comportement au feu" :
                                $product->setReactionFire($Row[$key]);
                                break;
                            case "tactilité" :
                                $product->setTactility($Row[$key]);
                                break;
                            case "résistance aux tâches" :
                                $product->setResistanceTasks($Row[$key]);
                                break;
                            case "résistance aux tâches et aux produits chmiques" :
                                $product->setResistanceTasks($Row[$key]);
                                break;
                            case "basses concentrations d’acides et de bases" :
                                $product->setAcidBaseConcentrations($Row[$key]);
                                break;
                            case "produits de nettoyage et additifs pour eau de piscine" :
                                $product->setCleaningPoolWaterAdditives($Row[$key]);
                                break;
                            case "libération de cadmium et plomb" :
                                $product->setReleaseCadmiumLead($Row[$key]);
                                break;
                            case "qualité de la surface" :
                                $product->setSurfaceQuality($Row[$key]);
                                break;
                            case "écart de la dimension de fabrication" :
                                $product->setManufacturingDimensionDeviation($Row[$key]);
                                break;
                            case "epaisseur" :
                                $product->setThickness($Row[$key]);
                                break;
                            case "epaisseur hors tout minimale" :
                                $product->setThickness($Row[$key]);
                                break;
                            case "epaisseur totale (mm)" :
                                $product->setThickness($Row[$key]);
                                break;
                            case "epaisseur moyenne (mm)" :
                                $product->setThickness($Row[$key]);
                                break;
                            case "epaisseur totale minimale /minimale" :
                                $product->setThickness($Row[$key]);
                                break;
                            case "rectilignité des côtés" :
                                $product->setSideStraightness($Row[$key]);
                                break;
                            case "planéité" :
                                $product->setFlatness($Row[$key]);
                                break;
                            case "résistance à la glissance" :
                                $product->setSlipResistance($Row[$key]);
                                break;
                            case "glissance" :
                                $product->setSlipResistance($Row[$key]);
                                break;
                            case "résistance au glissement" :
                                $product->setSlipResistance($Row[$key]);
                                break;
                            case "glissement" :
                                $product->setSlipResistance($Row[$key]);
                                break;
                            case "comportement de glissement" :
                                $product->setSlipResistance($Row[$key]);
                                break;
                            case "indication de la résistance au glissement" :
                                $product->setSlipResistance($Row[$key]);
                                break;
                            case "changements d'humidité relative" :
                                $product->setExpansionHumidity($Row[$key]);
                                break;
                            case "dilatation à l’humidité (en mm/m)" :
                                $product->setExpansionHumidity($Row[$key]);
                                break;
                            case "perpendicularité" :
                                $product->setPerpendicularity($Row[$key]);
                                break;
                            case "perte de plomb et cadmium" :
                                $product->setLossLeadCadmium($Row[$key]);
                                break;
                            case "planeite de surface" :
                                $product->setSurfaceFlatness($Row[$key]);
                                break;
                            case "rectitude des aretes" :
                                $product->setStraightnessAretes($Row[$key]);
                                break;
                            case "resistance aux chocs thermiques" :
                                $product->setThermalShockResistance($Row[$key]);
                                break;
                            case "résistance aux chocs thermiques" :
                                $product->setThermalShockResistance($Row[$key]);
                                break;
                            case "résistance thermique (m².k/w)" :
                                $product->setThermalShockResistance($Row[$key]);
                                break;
                            case "resistance aux taches" :
                                $product->setResistanceStains($Row[$key]);
                                break;
                            case "résistance aux produits chimiques" :
                                $product->setChemicalResistance($Row[$key]);
                                break;
                            case "résistance à basses concentrations d’acides et alcalis" :
                                $product->setResistanceHighConcentrationsAcidsAlkalis($Row[$key]);
                            case "résistance à basses concentrations d’acides" :
                                $product->setResistanceHighConcentrationsAcidsAlkalis($Row[$key]);
                                break;
                            case "résistance à hautes concentrations d’acides et alcalis" :
                                $product->setResistanceLowConcentrationsAcidsAlkalis($Row[$key]);
                                break;
                            case "dégagement de substances dangereuses" :
                                $product->setReleaseHazardousSubstances($Row[$key]);
                                break;
                            case "transfert de substances dangereuses" :
                                $product->setReleaseHazardousSubstances($Row[$key]);
                                break;
                            case "libération d'autres substances dangereuses" :
                                $product->setReleaseHazardousSubstances($Row[$key]);
                                break;
                            case "dégagement d’autres substances dangereuses" :
                                $product->setReleaseHazardousSubstances($Row[$key]);
                                break;
                            case "adhérence" :
                                $product->setAdhesion($Row[$key]);
                                break;
                            case "force de rupture" :
                                $product->setBreakingStrength($Row[$key]);
                                break;
                            case "teneur en pentachlorophenol" :
                                $product->setPentachlorophenolContent($Row[$key]);
                                break;
                            case "teneur en pentachlorophénol" :
                                $product->setPentachlorophenolContent($Row[$key]);
                                break;
                            case "emission en pentachlorophénol" :
                                $product->setPentachlorophenolContent($Row[$key]);
                                break;
                            case "emission de pentachlorophénol" :
                                $product->setPentachlorophenolContent($Row[$key]);
                                break;
                            case "emission de formaldehyde" :
                                $product->setFormaldehydeEmission($Row[$key]);
                                break;
                            case "émission de formaldéhyde" :
                                $product->setFormaldehydeEmission($Row[$key]);
                                break;
                            case "dégagement de formaldehyde" :
                                $product->setFormaldehydeEmission($Row[$key]);
                                break;
                            case "émissions de formaldéhyde" :
                                $product->setFormaldehydeEmission($Row[$key]);
                                break;
                            case "durabilité pour les usages intérieurs" :
                                $product->setDurabilityIndoorUses($Row[$key]);
                                break;
                            case "durabilité pour les utilisations à l'extérieur" :
                                $product->setDurabilityOutdoorUses($Row[$key]);
                                break;
                            case "résistance à la rupture" :
                                $product->setTearResistant($Row[$key]);
                                break;
                            case "conductivité thermique" :
                                $product->setThermalConductivity($Row[$key]);
                                break;
                            case "durabilité biologique" :
                                $product->setBiologicalSustainability($Row[$key]);
                                break;
                            case "perméabilité a la vapeur d'eau" :
                                $product->setWaterVaporPermeability($Row[$key]);
                                break;
                            case "absorption acoustique" :
                                $product->setSoundAbsorption($Row[$key]);
                                break;
                            case "résistance des fixations" :
                                $product->setFastenerStrength($Row[$key]);
                                break;
                            case "comportement électrique" :
                                $product->setElectricalBehavior($Row[$key]);
                                break;
                            case "étanchéité" :
                                $product->setSealing($Row[$key]);
                                break;
                            case "etancheité" :
                                $product->setSealing($Row[$key]);
                                break;
                            case "densité" :
                                $product->setDensity($Row[$key]);
                                break;
                            case "module d'élasticité en flexion" :
                                $product->setFlexuralModulusElasticity($Row[$key]);
                                break;
                            case "résistance à l'eau bouillante" :
                                $product->setBoilingWaterResistance($Row[$key]);
                                break;
                            case "résistance aux fixations" :
                                $product->setFastenerStrength($Row[$key]);
                                break;
                            case "isolation aux bruits aériens" :
                                $product->setAirborneSoundInsulation($Row[$key]);
                                break;
                            case "perméabilité à la vapeur d'eau" :
                                $product->setWaterVaporPermeability($Row[$key]);
                                break;
                            case "résistance à la traction" :
                                $product->setTensileStrength($Row[$key]);
                                break;
                            case "résistance à l'adhésion" :
                                $product->setBondStrength($Row[$key]);
                                break;
                            case "comportement électrique (dissipatif)" :
                                $product->setElectricalBehaviorDissipative($Row[$key]);
                                break;
                            case "comportement électrique (conducteur)" :
                                $product->setElectricalBehaviorConductive($Row[$key]);
                                break;
                            case "comportement électrique (antistatique)" :
                                $product->setElectricalBehaviorAntistatic($Row[$key]);
                                break;
                            case "conductivité thermique [w/mk]" :
                                $product->setThermalConductivity($Row[$key]);
                                break;
                            case "conductivité thermique (w/m.k)" :
                                $product->setThermalConductivity($Row[$key]);
                                break;
                            case "masse volumique moyenne minimale" :
                                $product->setDensity($Row[$key]);
                                break;
                            case "détermination de la rectitude des arêtes et de l’équerrage des dalles" :
                                $product->setStraightnessAretes($Row[$key]);
                                break;
                            case "masse volumique (kg/m³)" :
                                $product->setDensity($Row[$key]);
                                break;
                            case "résistance aux impacts" :
                                $product->setImpactResistance($Row[$key]);
                                break;
                            case "résistance aux rayures" :
                                $product->setScratchResistance($Row[$key]);
                                break;
                            case "lavabilité" :
                                $product->setWashability($Row[$key]);
                                break;
                            case "stabilité dimensionnelle" :
                                $product->setDimensionalStability($Row[$key]);
                                break;
                            case "stabilité dimensionelle" :
                                $product->setDimensionalStability($Row[$key]);
                                break;
                            case "incurvation à la chaleur" :
                                $product->setHeatCurving($Row[$key]);
                                break;
                            case "résistance aux tâches et aux produits chmiques" :
                                $product->setResistanceStainsChemicals($Row[$key]);
                                break;
                            case "solidité lumière" :
                                $product->setLightFastness($Row[$key]);
                                break;
                            case "conditions de mise en œuvre" :
                                $product->setImplementationConditions($Row[$key]);
                                break;
                            case "- emissions de cov (décret n°2011-321)" :
                                $product->setEmissionsCov($Row[$key]);
                                break;
                            case "emissions cmr 1 et 2 (arrêté n° devp0908633a)" :
                                $product->setCmrEmissions($Row[$key]);
                                break;
                            case "adhésion avec ciment colle" :
                                $product->setAdhesionAdhesiveCement($Row[$key]);
                                break;
                            case "longueur x largeur (mm)" :
                                $product->setLengthWidth($Row[$key]);
                                break;
                            case "covt à 28 jours" :
                                $product->setCovt($Row[$key]);
                                break;
                            case "formaldéhyde à 28 jours" :
                                $product->setFormaldehyde($Row[$key]);
                                break;
                            case "dureté - brinell moyenne" :
                                $product->setHardnessMediumBrinell($Row[$key]);
                                break;
                            case "norme incendie" :
                                $product->setFireStandard($Row[$key]);
                                break;
                            case "indice de propagation de la flamme" :
                                $product->setFireStandard($Row[$key]);
                                break;
                            case "emission thermique" :
                                $product->setThermalEmission($Row[$key]);
                                break;
                            case "réflexion solaire" :
                                $product->setSolarReflection($Row[$key]);
                                break;
                            case "index de réflexion solaire" :
                                $product->setSolarReflectanceIndex($Row[$key]);
                                break;
                            case "elasticité" :
                                $product->setElasticity($Row[$key]);
                                break;
                            case "résistance mécanique" :
                                $product->setMechanicalResistance($Row[$key]);
                                break;
                            case "résistance aux champignons de surface" :
                                $product->setSurfaceFungusResistance($Row[$key]);
                                break;
                            case "classe d’usage" :
                                $product->setUsageClass($Row[$key]);
                                break;
                            case "co2 neutre" :
                                $product->setCo2Neutral($Row[$key]);
                                break;
                            case "déclaration environnementale du produit" :
                                $product->setEnvironmentalProductDeclaration($Row[$key]);
                                break;
                            case "fsc" :
                                $product->setFormaldehydeEmission($Row[$key]);
                                break;
                            case "contribution leed bd+c - v4" :
                                $product->setFsc($Row[$key]);
                                break;
                            case "contribution breeam" :
                                $product->setContributionBreeam($Row[$key]);
                                break;
                            case "contribution hqe" :
                                $product->setHqeContribution($Row[$key]);
                                break;
                            case "garantie" :
                                $product->setGuarantee($Row[$key]);
                                break;
                            case "résistance aux produits" :
                                $product->setProductResistance($Row[$key]);
                                break;
                            case "chimiques usage domestique et additifs pour piscine" :
                                $product->setHouseholdChemicalsPoolAdditives($Row[$key]);
                                break;
                            case "densité minimale moyenne (kg/m3)" :
                                $product->setAverageMinimumDensity($Row[$key]);
                                break;
                            case "la densité minimale moyenne" :
                                $product->setAverageMinimumDensity($Row[$key]);
                                break;
                            case "utilisation prévue, mode de montage" :
                                $product->setIntendedUseAssemblyMethod($Row[$key]);
                                break;
                            case "essence" :
                                $product->setEssence($Row[$key]);
                                break;

                            case "les conditions d’utilisation" :
                                $product->setTermsUse($Row[$key]);
                                break;
                            case "teneur pcp" :
                                $product->setPcpContent($Row[$key]);
                                break;
                            case "perméabilité à la vapeur d’eau" :
                                $product->setWaterVaporPermeability($Row[$key]);
                                break;
                            case "durabilité biologiques" :
                                $product->setBiologicalSustainability($Row[$key]);
                                break;
                            case "tenue des fixations" :
                                $product->setHoldBindings($Row[$key]);
                                break;
                            case "résistance à l'usure" :
                                $product->setWearResistance($Row[$key]);
                                break;
                            case "classe d'usure" :
                                $product->setWearClass($Row[$key]);
                                break;
                            case "résistance à la rayure" :
                                $product->setScratchResistance($Row[$key]);
                                break;
                            case "effet d'une chaise à roulettes" :
                                $product->setEffectWheeledChair($Row[$key]);
                                break;
                            case "gonflement d'épaisseur" :
                                $product->setThicknessSwelling($Row[$key]);
                                break;
                            case "force de verrouillage" :
                                $product->setLockingForce($Row[$key]);
                                break;
                            case "effet d'un pied de meuble" :
                                $product->setEffectFurnitureLeg($Row[$key]);
                                break;
                            case "solidité de surface" :
                                $product->setSurfaceHardness($Row[$key]);
                                break;
                            case "indentation statique" :
                                $product->setStaticIndent($Row[$key]);
                                break;
                            case "résistance aux taches" :
                                $product->setStainResistance($Row[$key]);
                                break;
                            case "apparence générale" :
                                $product->setGeneralAppearance($Row[$key]);
                                break;
                            case "variations dimensionnelles après solidité à la lumière" :
                                $product->setDimensionalChangesLightfastness($Row[$key]);
                                break;
                            case "réduction des bruits d'impact" :
                                $product->setImpactSoundReduction($Row[$key]);
                                break;
                            case "cigarette allumée" :
                                $product->setLitCigarette($Row[$key]);
                                break;
                            case "chauffage au sol" :
                                $product->setFloorHeating($Row[$key]);
                                break;
                            case "coefficient de restitution" :
                                $product->setRestitutionCoefficient($Row[$key]);
                                break;
                            case "resistance à l’abrasion" :
                                $product->setAbrasionResistance($Row[$key]);
                                break;
                            case "coefficient de resistance aux ecarts de temperature" :
                                $product->setCoefficientResistanceTemperatureDifference($Row[$key]);
                                break;
                            case "resistance à l’attaque chimique" :
                                $product->setResistanceChemicalAttack($Row[$key]);
                                break;
                            case "insensibilité aux taches" :
                                $product->setInsensitivityStains($Row[$key]);
                                break;
                            case "mesure du coefficient de frottement dynamique" :
                                $product->setMeasurementDynamicCoefficientFriction($Row[$key]);
                                break;
                            case "effort de rupture" :
                                $product->setBreakingForce($Row[$key]);
                                break;
                            case "durabilité pour usage interne/externe" :
                                $product->setDurabilityInternalExternalUse($Row[$key]);
                                break;
                            case "performances antistatiques" :
                                $product->setConductiveElectricalBehavior($Row[$key]);
                                break;
                            case "comportement électrique (conducteur)2" :
                                $product->setElectricalBehaviorConductive($Row[$key]);
                                break;
                        }
                    }
                }
                $this->entityManager->persist($product);
                $this->entityManager->flush();
                $output->writeln("Product : " . $product->getName() . " added with success!");

            }
        }
    }
}
