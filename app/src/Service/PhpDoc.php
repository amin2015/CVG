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

        /** Header title */
        $headerStyle = ['color' => '42703d', 'size' => 28, 'name' => 'calibri'];
        //$header = $section->addHeader();
        $section->addText($fileName, $headerStyle,  ['align' => 'right']);

        /** Header body */
        $headerStyleTable = ['width' => '31 cm', 'unit' => 'pct', 'cellMarginBottom' => Converter::cmToTwip(0.5), 'alignment' => JcTable::CENTER, 'gridSpan' => 2];
        /* Header table */
        $table = $section->addTable($headerStyleTable);
        /* Row header title  */
        $table->addRow(1500);
        $headerStyleCell = ['bgColor' => '42703d', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => '42703d', 'gridSpan' => 2];
        $headerCell = $table->addCell(900, $headerStyleCell);
        $headerText = $headerCell->addTextRun(['align' => 'center']);
        $headerFontStyle = ['color' => 'FFFFFF', 'size' => 22, 'name' => 'calibri'];
        $headerText->addText($form['headerTitle']->getData(), $headerFontStyle);
        /* Break */
        $headerText->addTextBreak(1);

        /* Year's exprerience */
        $headerFontStyle = ['color' => 'FFFFFF', 'size' => 18, 'name' => 'calibri'];
        $headerText->addText($form['experienceYear']->getData() . " ans d’expérience", $headerFontStyle);

        /* Row header title */
        $table->addRow(1500);
        /* Cell skills */
        $skillsFontStyle = ['bold' => true, 'color' => '5f6061', 'size' => 12, 'name' => 'calibri'];
        $skillsCell = $table->addCell(900, $headerStyleCell);
        $skillsStyleCell = ['bgColor' => 'FFFFFF', 'align' => 'center', 'valign' => 'center', 'borderColor' => '42703d'];
        $skillsCell = $skillsCell->addTable($skillsStyleCell)->addRow(800)->addCell(7000, $skillsStyleCell);
        $skillsCell->addText($form['headerSkills']->getData(), $skillsFontStyle, ['align' => 'center']);
        /* Break */
        $section->addTextBreak(1);

        /** Trainning */
        $trainningTableName = 'Trainning Table';
        $trainningTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $trainningCellStyle = ['valign' => 'center', 'height' => 1];
        $phpWord->addTableStyle($trainningTableName, $trainningTable);
        $table = $section->addTable($trainningTableName);
        $table->addRow();
        $table->addCell(700, $trainningCellStyle)->addImage($this->params->get('icons_directory') . 'diploma-text.png', ['height' => 15, 'width' => 18, 'valign' => 'bottom']);
        $table->addCell(7300, $trainningCellStyle)->addText('FORMATIONS', ['color' => '42703d', 'size' => 18, 'bold' => true, 'name' => 'calibri', 'valign' => 'bottom']);
        /* Line */
        $table->addRow();
        $table->addCell(7300, $trainningCellStyle)->addText('', [], ['borderBottomSize' => 1, 'borderColor' => '42703d', 'valign' => 'top']);
        /* Trainning rows */
        $table = $section->addTable($trainningTableName);
        $trainningRowStyleCell = ['bgColor' => 'ffffff', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => 'ffffff', 'gridSpan' => 2];

        foreach ($form->get('trainning')->getData() as $trainning) {
            $table->addRow(900);
            $table->addCell(1500, $trainningRowStyleCell)->addText($trainning->getYear(), ['color' => '42703d', 'bold' => true, 'size' => 12, 'name' => 'calibri']);
            $table->addCell(6500, $trainningRowStyleCell)->addText($trainning->getQualification(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
        }
        /* Break */
        $section->addTextBreak(1);

        /** Certification */
        if($form->get('certification')->count()){
            $certificationTableName = 'Certification Table';
            $certificationTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
            $certificationCellStyle = ['valign' => 'center', 'height' => 1];
            $phpWord->addTableStyle($certificationTableName, $certificationTable);
            $table = $section->addTable($certificationTableName);
            $table->addRow();
            $table->addCell(700, $certificationCellStyle)->addImage($this->params->get('icons_directory') . 'diploma.png', ['height' => 18, 'width' => 23, 'valign' => 'bottom']);
            $table->addCell(7300, $certificationCellStyle)->addText('CERTIFICATIONS', ['color' => '42703d', 'size' => 18, 'bold' => true, 'name' => 'calibri', 'valign' => 'bottom']);
            /* Line */
            $table->addRow();
            $table->addCell(7300, $trainningCellStyle)->addText('', [], ['borderBottomSize' => 1, 'borderColor' => '42703d', 'valign' => 'top']);

            /* Certification rows */
            $table = $section->addTable($certificationTableName);
            $certificationRowStyleCell = ['bgColor' => 'ffffff', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => 'ffffff', 'gridSpan' => 2];

            foreach ($form->get('certification')->getData() as $certification) {
                $table->addRow(900);
                $table->addCell(1500, $certificationRowStyleCell)->addText($certification->getYear(), ['color' => '42703d', 'bold' => true, 'size' => 12, 'name' => 'calibri']);
                $table->addCell(6500, $certificationRowStyleCell)->addText($certification->getDescription(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
            }
        }
        /* Break */
        $section->addTextBreak(1);

        /** skills */
        $skillsTableName = 'skills Table';
        $skillsTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $skillsImgCellStyle = ['valign' => 'center', 'height' => 2];
        $skillsCellStyle = ['valign' => 'center', 'height' => 1];
        $phpWord->addTableStyle($skillsTableName, $skillsTable);
        $table = $section->addTable($skillsTableName);
        $table->addRow();
        $table->addCell(700, $skillsImgCellStyle)->addImage($this->params->get('icons_directory') . 'wrench.png', ['height' => 14, 'width' => 19]);
        $table->addCell(7300, $skillsCellStyle)->addText('COMPÉTENCES TECHNIQUES', ['color' => '42703d', 'size' => 18, 'bold' => true, 'name' => 'calibri']);
        /* Line */
        $table->addRow();
        $table->addCell(7300, $trainningCellStyle)->addText('', [], ['borderBottomSize' => 1, 'borderColor' => '42703d', 'valign' => 'top']);

        /* Skills rows */
        $table = $section->addTable($skillsTableName);
        $certificationRowStyleCell = ['bgColor' => 'ffffff', 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => 'ffffff', 'gridSpan' => 2];

        foreach ($form->get('skills')->getData() as $skills) {
            $table->addRow(900);
            $table->addCell(3500, $certificationRowStyleCell)->addText($skills->getSkills(), ['color' => '42703d', 'bold' => true, 'size' => 12, 'name' => 'calibri']);
            /* Break */
            $table->addCell(5500, $certificationRowStyleCell)->addText($skills->getTechniques(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
        }
        /* Break */
        $section->addTextBreak(1);

        /** Experience */
        $experienceTableName = 'Experience Table';
        $experienceTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $experienceCellStyle = ['valign' => 'center', 'height' => 1];
        $phpWord->addTableStyle($experienceTableName, $experienceTable);
        $table = $section->addTable($experienceTableName);
        $table->addRow();
        $table->addCell(700, $experienceCellStyle)->addImage($this->params->get('icons_directory') . 'briefcase.png', ['height' => 15, 'width' => 18]);
        $table->addCell(7300, $experienceCellStyle)->addText('EXPÉRIENCES', ['color' => '42703d', 'size' => 16, 'bold' => true, 'name' => 'calibri']);
        /* Line */
        $table->addRow();
        $table->addCell(7300, $trainningCellStyle)->addText('', [], ['borderBottomSize' => 1, 'valign' => 'top']);
        /* Break */
        $section->addTextBreak(2);
        foreach ($form->get('experience')->getData() as $experience) {
            /* Table */
            $experienceStyleTable = ['alignment' => JcTable::CENTER, 'cellMargin' => 200, 'borderSize' => 0, 'borderColor' => 'fbfbfb'];
            /** Header table */
            $table = $section->addTable($experienceStyleTable);
            $cellRowTitle = ['vMerge' => 'restart', 'borderSize' => 1, 'borderColor' => '42703d', 'bgColor' => '42703d', 'height' => 200, 'align' => 'center', 'valign' => 'center'];
            /* Break */
            $row = $table->addRow();
            $row->addCell(2000, $cellRowTitle)->addImage($this->params->get('icons_directory') . 'local.png', ['width' => 32, 'align' => 'right']);
            $row->addCell(4000, $cellRowTitle)->addText($experience->getTitle(), ['color' => 'ffffff', 'size' => 14, 'name' => 'calibri']);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'fbfbfb', 'align' => 'center', 'valign' => 'center'];
            $row->addCell(700, $cellRowJob)->addImage($this->params->get('icons_directory') . 'user.png', ['width' => 40, 'align' => 'left']);
            $cellRowJob = ['align' => 'center', 'valign' => 'bottom'];
            $cell = $row->addCell(5300, $cellRowJob);
            $cell->addText(' ' . $experience->getJob(), ['bold' => true, 'color' => '42703d', 'size' => 13, 'name' => 'calibri', 'valign' => 'bottom']);
            $row = $table->addRow();
            $cellRowContinue = ['vMerge' => 'continue'];
            $row->addCell(null, $cellRowContinue);
            $row->addCell(null, $cellRowContinue);
            $row->addCell(null, $cellRowContinue);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'fbfbfb', 'align' => 'center', 'valign' => 'top'];
            $cell = $row->addCell(2000, $cellRowJob);
            $tableJobStyle = ['alignment' => 'top', 'bgColor' => 'fbfbfb', 'borderSize' => 0.1, 'borderColor' => 'fbfbfb', 'valign' => 'top'];
            $table = $cell->addTable($tableJobStyle);
            $row = $table->addRow();
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'fbfbfb', 'align' => 'left', 'valign' => 'top', 'borderColor' => 'fbfbfb'];
            $cellImgCalendar = $row->addCell(500, $cellRowJob);
            $cellImgCalendar->addImage($this->params->get('icons_directory') . 'agenda.png', ['height' => 14, 'width' => 16, 'valign' => 'top']);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'fbfbfb', 'height' => 200, 'align' => 'center', 'valign' => 'top', 'borderColor' => 'fbfbfb'];
            $cellPeriod = $row->addCell(4500, $cellRowJob);
            $cellPeriod->addText($experience->getPeriod(), ['color' => '42703d', 'size' => 12, 'name' => 'calibri', 'valign' => 'top']);
            /* Break */
            $section->addTextBreak(2);
            /* Missions */
            $section->addText('MISSIONS : ', ['color' => '42703d', 'size' => 12, 'name' => 'calibri']);
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

            $fontStyleName = ['color' => '131313', 'size' => 12, 'name' => 'calibri'];
            $arrayMissions = explode(PHP_EOL, $experience->getMission());
            foreach ($arrayMissions as $mission) {
                $section->addText($mission, $fontStyleName);
            }
            $section->addTextBreak(2);
            /* Environment */
            $envTableName = 'Environment Table';
            $envTable = ['borderSize' => 1, 'borderColor' => '8e9091',  'cellSpacing' => 5];
            $phpWord->addTableStyle($envTableName, $envTable);
            $table = $section->addTable($envTableName);
            $table->addRow(1500);
            $cell = $table->addCell(null, ['bgColor' => 'e7e6e6', 'cellMargin' => 'center']);
            $cell->addText('');
            $cell->addText('Environnement technique : ', ['color' => '42703d', 'size' => 12, 'bold' => true, 'name' => 'calibri']);
            $cell->addText($experience->getEnvironment(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
            /* Break */
            $section->addTextBreak(1);
        }

        /* Footer */
        $footer = $section->addFooter();
        $footer->addImage($this->params->get('icons_directory') . 'logo.gif', ['height' => 30, 'width' => 35, 'align' => 'center']);
        $arrayFooter = explode(PHP_EOL, $form->get('footer')->getData());
        foreach ($arrayFooter as $item) {
            $phpWord->addFontStyle('footerFontStyle', ['color' => '666666', 'size' => 8, 'name' => 'calibri']);
            $phpWord->addParagraphStyle('footerPragStyle', array('align'=>'center', 'spaceAfter'=>100));
            $footer->addText($item, 'footerFontStyle', 'footerPragStyle');
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