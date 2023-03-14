<?php

namespace App\Service;

use PhpOffice\PhpWord\ComplexType\FootnoteProperties;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\SimpleType\NumberFormat;
use PhpOffice\PhpWord\Style\Frame;
use PhpOffice\PhpWord\Style\TablePosition;
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
        } else {
            $filePath = "cv.docx";
        }
        /** Header */
        $headerStyleTable = ['width' => '31 cm', 'unit' => 'pct', 'cellMarginBottom' => Converter::cmToTwip(0.5), 'alignment' => JcTable::CENTER, 'gridSpan' => 2];
        /** Header table */
        $table = $section->addTable($headerStyleTable);
        /* Row header title  */
        $table->addRow(1500);
        $headerStyleCell = ['bgColor' => '2f5496', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => '2f5496', 'gridSpan' => 2];
        $headerCell = $table->addCell(900, $headerStyleCell);
        $headerText = $headerCell->addTextRun(['align' => 'center']);
        $headerFontStyle = ['bold' => true, 'color' => 'FFFFFF', 'size' => 16, 'name' => 'calibri light'];
        $headerText->addText($form['headerTitle']->getData(), $headerFontStyle);

        /* Break */
        $headerText->addTextBreak(2);

        /* Year's exprerience */
        $headerFontStyle = ['color' => 'FFFFFF', 'size' => 14, 'name' => 'calibri light'];
        $headerText->addText($form['experienceYear']->getData() . " ans d’expérience", $headerFontStyle);

        /* Row header title */
        $table->addRow(1500);
        /* Cell skills */
        $skillsFontStyle = ['bold' => true, 'color' => '2f5496', 'size' => 14, 'bold' => true, 'name' => 'calibri light'];
        $skillsCell = $table->addCell(900, $headerStyleCell);
        $skillsStyleCell = ['bgColor' => 'FFFFFF', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => '2f5496', 'borderStyle' => \PhpOffice\PhpWord\SimpleType\Border::THICK,];
        $skillsCell = $skillsCell->addTable($skillsStyleCell)->addRow(1000)->addCell(9000, $skillsStyleCell);
        $skillsCell->addText($form['headerSkills']->getData(), $skillsFontStyle);

        /* Break */
        $section->addTextBreak(2);

        /** Trainning */
        $trainningTableName = 'Trainning Table';
        $trainningTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $trainningCellStyle = ['valign' => 'bottom', 'height' => 1];
        $phpWord->addTableStyle($trainningTableName, $trainningTable);
        $table = $section->addTable($trainningTableName);
        $table->addRow(900);
        $table->addCell(700, $trainningCellStyle)->addImage($this->params->get('icons_directory') . 'diploma.gif', ['height' => 25, 'width' => 30]);
        $table->addCell(7300, $trainningCellStyle)->addText('Formations', ['color' => '2f5496', 'size' => 16, 'bold' => true, 'name' => 'calibri light']);
        /* Line */
        $section->addText('', [], ['borderBottomSize' => 1, 'borderColor' => '2f5496']);

        /* Trainning rows */
        $table = $section->addTable($trainningTableName);
        $trainningRowStyleCell = ['bgColor' => 'ffffff', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => 'ffffff', 'gridSpan' => 2];

        foreach ($form->get('trainning')->getData() as $trainning) {
            $table->addRow(900);
            $table->addCell(1500, $trainningRowStyleCell)->addText($trainning->getYear(), ['color' => '2f5496', 'bold' => true, 'size' => 12, 'name' => 'calibri light']);
            $table->addCell(6500, $trainningRowStyleCell)->addText($trainning->getQualification(), ['color' => '131313', 'size' => 12, 'name' => 'calibri light']);
        }

        /** Certification */
        $certificationTableName = 'Certification Table';
        $certificationTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $certificationCellStyle = ['valign' => 'bottom', 'height' => 1];
        $phpWord->addTableStyle($certificationTableName, $certificationTable);
        $table = $section->addTable($certificationTableName);
        $table->addRow(900);
        $table->addCell(700, $certificationCellStyle)->addImage($this->params->get('icons_directory') . 'diploma.gif', ['height' => 25, 'width' => 30]);
        $table->addCell(7300, $certificationCellStyle)->addText('CERTIFICATIONS', ['color' => '2f5496', 'size' => 16, 'bold' => true, 'name' => 'calibri light']);
        /* Line */
        $section->addText('', [], ['borderBottomSize' => 1, 'borderColor' => '2f5496']);

        /* Certification rows */
        $table = $section->addTable($certificationTableName);
        $certificationRowStyleCell = ['bgColor' => 'ffffff', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => 'ffffff', 'gridSpan' => 2];

        foreach ($form->get('certification')->getData() as $certification) {
            $table->addRow(900);
            $table->addCell(1500, $certificationRowStyleCell)->addText($certification->getYear(), ['color' => '2f5496', 'bold' => true, 'size' => 12, 'name' => 'calibri light']);
            /* Break */
            $table->addCell(6500, $certificationRowStyleCell)->addText($certification->getDescription(), ['color' => '131313', 'size' => 12, 'name' => 'calibri light']);
        }

        /** skills */
        $skillsTableName = 'skills Table';
        $skillsTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $skillsCellStyle = ['valign' => 'bottom', 'height' => 1];
        $phpWord->addTableStyle($skillsTableName, $skillsTable);
        $table = $section->addTable($skillsTableName);
        $table->addRow(900);
        $table->addCell(700, $skillsCellStyle)->addImage($this->params->get('icons_directory') . 'manip.gif', ['height' => 25, 'width' => 30]);
        $table->addCell(7300, $skillsCellStyle)->addText('COMPÉTENCES TECHNIQUES', ['color' => '2f5496', 'size' => 16, 'bold' => true, 'name' => 'calibri light']);
        /* Line */
        $section->addText('', [], ['borderBottomSize' => 1, 'borderColor' => '2f5496']);

        foreach ($form->get('skills')->getData() as $skills) {
            /* Break */
            $section->addTextBreak(1);
            $section->addText($skills->getSkills(), ['color' => '2f5496', 'bold' => true, 'size' => 12, 'name' => 'calibri light']);
            $section->addText($skills->getTechniques(), ['color' => '131313', 'size' => 12, 'name' => 'calibri light']);
            /* Break */
            $section->addTextBreak(1);
        }

        /** Experience */
        $experienceTableName = 'Experience Table';
        $experienceTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $experienceCellStyle = ['valign' => 'bottom', 'height' => 1];
        $phpWord->addTableStyle($experienceTableName, $experienceTable);
        $table = $section->addTable($experienceTableName);
        $table->addRow(900);
        $table->addCell(700, $experienceCellStyle)->addImage($this->params->get('icons_directory') . 'sac.gif', ['height' => 25, 'width' => 30]);
        $table->addCell(7300, $experienceCellStyle)->addText('EXPÉRIENCES', ['color' => '2f5496', 'size' => 16, 'bold' => true, 'name' => 'calibri light']);
        /* Line */
        $section->addText('', [], ['borderBottomSize' => 1, 'borderColor' => '2f5496']);
        /* Break */
        $section->addTextBreak(2);
        foreach ($form->get('experience')->getData() as $experience) {
            /* Table */
            $experienceStyleTable = ['alignment' => JcTable::CENTER, 'cellMargin' => 200, 'borderSize' => 0.2, 'borderColor' => 'f6f6f6'];
            /** Header table */
            $table = $section->addTable($experienceStyleTable);
            $cellRowTitle = ['vMerge' => 'restart', 'bgColor' => '2f5496', 'height' => 200, 'align' => 'center', 'valign' => 'center', 'borderColor' => 'f6f6f6'];
            /* Break */
            $row = $table->addRow();
            $row->addCell(2000, $cellRowTitle)->addImage($this->params->get('icons_directory') . 'local.gif', ['width' => 32, 'align' => 'right']);
            $row->addCell(4000, $cellRowTitle)->addText($experience->getTitle(), ['color' => 'ffffff', 'size' => 14, 'name' => 'calibri light']);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f6f6f6', 'align' => 'center', 'valign' => 'center', 'borderColor' => 'f6f6f6'];
            $row->addCell(700, $cellRowJob)->addImage($this->params->get('icons_directory') . 'user.gif', ['width' => 32, 'align' => 'left']);
            $cellRowJob = ['bgColor' => 'f6f6f6', 'borderColor' => 'f6f6f6', 'align' => 'center', 'valign' => 'bottom'];
            $cell = $row->addCell(5300, $cellRowJob);
            $cell->addText(' ' . $experience->getJob(), ['bold' => true, 'color' => '2f5496', 'size' => 13, 'name' => 'calibri light', 'valign' => 'bottom']);
            $row = $table->addRow();
            $cellRowContinue = ['vMerge' => 'continue'];
            $row->addCell(null, $cellRowContinue);
            $row->addCell(null, $cellRowContinue);
            $row->addCell(null, $cellRowContinue);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f6f6f6', 'align' => 'center', 'valign' => 'top', 'borderColor' => 'f6f6f6'];
            $cell = $row->addCell(2000, $cellRowJob);
            $tableJobStyle = ['alignment' => 'top', 'bgColor' => 'f6f6f6', 'borderSize' => 0.1, 'borderColor' => 'f6f6f6', 'valign' => 'top'];
            $table = $cell->addTable($tableJobStyle);
            $row = $table->addRow();
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f6f6f6', 'align' => 'left', 'valign' => 'top', 'borderColor' => 'f6f6f6'];
            $cellImgCalendar = $row->addCell(500, $cellRowJob);
            $cellImgCalendar->addImage($this->params->get('icons_directory') . 'calendar.gif', ['height' => 18, 'width' => 20, 'valign' => 'top']);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f6f6f6', 'height' => 200, 'align' => 'center', 'valign' => 'top', 'borderColor' => 'f6f6f6'];
            $cellPeriod = $row->addCell(4500, $cellRowJob);
            $cellPeriod->addText($experience->getPeriod(), ['color' => '2f5496', 'size' => 13, 'name' => 'calibri light', 'valign' => 'top']);
            /* Break */
            $section->addTextBreak(2);
            /* Missions */
            $section->addText('Missons: ', ['color' => '131313', 'size' => 16, 'name' => 'calibri light']);
            /* Missions list */
            $paragraphStyleName = 'P-Style';
            $phpWord->addParagraphStyle($paragraphStyleName, ['spaceAfter' => 95]);
            $phpWord->addNumberingStyle(
                null,
                [
                    'type' => 'multilevel',
                    'levels' => [
                        ['format' => 'bullet', 'text' => '%50.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360],
                    ],
                ]
            );

            $predefinedMultilevelStyle = ['listType' => \PhpOffice\PhpWord\Style\ListItem::TYPE_BULLET_FILLED,];
            $fontStyleName = ['color' => '131313', 'size' => 12, 'name' => 'calibri light'];
            $arrayMissions = explode(PHP_EOL, $experience->getMission());
            foreach ($arrayMissions as $mission) {
                $section->addListItem($mission, 0, $fontStyleName, $predefinedMultilevelStyle, $paragraphStyleName);
            }
            $section->addTextBreak(2);
            /* Environment */
            /* Break */
            $envTableName = 'Environment Table';
            $envTable = ['borderSize' => 1, 'borderColor' => 'e7e6e6', 'cellMargin' => 10 ];
            $phpWord->addTableStyle($envTableName, $envTable);
            $table = $section->addTable($envTableName);
            $table->addRow(1500);
            $cell = $table->addCell(null, ['borderColor' => 'e7e6e6', 'bgColor' => 'e7e6e6', 'cellMargin' => 10]);
            $cell->addText('Environnement technique', ['color' => '2f5496', 'size' => 13, 'bold' => true, 'name' => 'calibri light']);
            /* Break */
            $section->addTextBreak(1);
            $cell->addText($experience->getEnvironment(), ['color' => '131313', 'size' => 12, 'name' => 'calibri light']);
            /* Break */
            $section->addTextBreak(2);
        }

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