<?php

namespace App\Service;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\Style\Frame;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class PhpDoc
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function generatePhpWord($form): Response
    {
        /** PhpWord */
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        /** File name */
        $fileName = $form['fileName']->getData();
        if ($fileName) {
            $filePath = $fileName . ".docx";
        }
        /** Header */
        $firstStyleTable = ['width' => '31 cm', 'unit' => 'pct', 'cellMarginBottom' => Converter::cmToTwip(0.5), 'alignment' => JcTable::CENTER, 'gridSpan' => 2];
        $firstStyleCell = ['bgColor' => '2f5496', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => '2f5496', 'gridSpan' => 2];
        $secondStyleCell = ['bgColor' => 'FFFFFF', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => '2f5496', 'borderStyle' => \PhpOffice\PhpWord\SimpleType\Border::THICK,];
        $firstFontStyle = ['bold' => true, 'color' => 'FFFFFF', 'size' => 16, 'name' => 'calibri light'];
        $secondFontStyle = ['bold' => true, 'color' => '2f5496', 'size' => 14, 'bold' => true, 'name' => 'calibri light'];
        /** Table */
        $table = $section->addTable($firstStyleTable);
        /** Row 1 */
        $table->addRow(1500);
        /** Cell 1 */
        $firstCell = $table->addCell(900, $firstStyleCell);
        $firstText = $firstCell->addTextRun(['align' => 'center']);
        $firstText->addText(htmlspecialchars($form['headerTitle']->getData()), $firstFontStyle);
        /** Row 2 */
        $table->addRow(1500);
        /** Cell 2 */
        $cell2 = $table->addCell(900, $firstStyleCell);
        $innerCell = $cell2->addTable($secondStyleCell)->addRow(1000)->addCell(9000, $secondStyleCell);
        $innerCell->addText(htmlspecialchars($form['headerSkills']->getData()), $secondFontStyle);

        /** Body */
        $section->addTextBreak(2);
        $fancyTableStyleName = 'Fancy Table';
        $fancyTableStyle = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $fancyTable1Style = ['borderSize' => 1, 'borderColor' => '2f5496'];
        $fancyTableCell1Style = ['valign' => 'bottom', 'height' => 1];
        $fancyTableCell2Style = ['valign' => 'top', 'height' => 1];
        $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle);
        $table = $section->addTable($fancyTableStyleName);

        $table->addRow(900);
        $table->addCell(700, $fancyTableCell1Style)->addImage($this->params->get('icons_directory') . 'diploma.gif', ['height' => 25, 'width' => 30]);
        $table->addCell(7300, $fancyTableCell1Style)->addText(htmlspecialchars($form['theme'][0]->getData()->getName()), ['color' => '2f5496', 'size' => 14, 'bold' => true, 'name' => 'calibri light']);
        //$table->addRow()->addCell(8000, $fancyTableCell2Style)->addText('aa', [], ['borderBottomSize' => 1]);
        $table = $section->addTable($fancyTable1Style);
        $table->addRow(900);
        $table->addCell(700)->addLine();


        /** Object writer */
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        /** Write file into path */
        $objWriter->save($this->params->get('uploads_directory') . $filePath);
        /** Response */
        $response = new BinaryFileResponse($this->params->get('uploads_directory') . $filePath);
        $response->headers->set('Content-Type', 'text/plain');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $filePath);
        return $response;
    }

    /**
     * @param $html
     * @return string
     */
    private function htmlProcessing($html): string
    {
        $html = str_replace('<br>', '<br></br>', $html);
        $html = str_replace('<hr>', '<hr style=""></hr>', $html);
        $html = str_replace('&nbsp;', ' ', $html);
        return $html;
    }
}