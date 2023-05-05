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

        $file = __DIR__ . "/../../public/excel/" . $input->getOption("filename") . ".xlsx";

        if (!file_exists($file)) {
            throw new \Exception("Invalid file passed" . $input->getOption("filename"));
        }
        // Here we are able to read from the excel file
        $spreadsheet = IOFactory::load($file);
        // here, the read data is turned into an array
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
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
                    $output->writeln($title);
                    if (isset($title)) {
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
                            case "Reaction au feu" :
                                $product->setReactionFire($Row[$key]);
                                break;
                            case "tactilité" :
                                $product->setTactility($Row[$key]);
                                break;
                            case "résistance aux tâches" :
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
                            case "dilatation a l’humidite" :
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
                            case "resistance aux taches" :
                                $product->setResistanceStains($Row[$key]);
                                break;
                            case "résistance aux produits chimiques" :
                                $product->setChemicalResistance($Row[$key]);
                                break;
                            case "résistance à basses concentrations d’acides et alcalis" :
                                $product->setResistanceHighConcentrationsAcidsAlkalis($Row[$key]);
                                break;
                            case "résistance à hautes concentrations d’acides et alcalis" :
                                $product->setResistanceLowConcentrationsAcidsAlkalis($Row[$key]);
                                break;
                            case "dégagement de substances dangereuses" :
                                $product->setReleaseHazardousSubstances($Row[$key]);
                                break;
                            case "adhérence" :
                                $product->setAdhesion($Row[$key]);
                                break;
                            case "force de rupture" :
                                $product->setBreakingStrength($Row[$key]);
                                break;
                        }
                    }
                }
                $this->entityManager->persist($product);
                $this->entityManager->flush();
                //$output->writeln("Product" . $product->getName() . " added with success!");
            }
        }
        return Command::SUCCESS;
    }
}
