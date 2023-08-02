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
        $this->phpWord = new PhpWord();
        $this->section = $this->phpWord->addSection();
        /** File path */
        $fileName = $form['fileName']->getData();
        $this->filePath($fileName);
        /** Check company (Synergie) */
        $this->checkCompany($form->get('isSynergie')->getData());
        /** Header title */
        $headerStyle = ['color' => $this->color, 'size' => 28, 'name' => 'calibri'];
        $this->section->addText($fileName, $headerStyle, ['align' => 'right']);
        /** Header body */
        $this->setHeaderBody($form);
        /** Cell style */
        $this->cellStyle = ['valign' => 'center', 'height' => 1];
        $this->rowStyleCell = ['bgColor' => 'ffffff', 'height' => 60, 'align' => 'right', 'valign' => 'center', 'borderColor' => 'ffffff', 'gridSpan' => 2];
        /** Trainning */
        $this->setTrainning($form);
        /** Certification */
        $this->setCertification($form);
        /** skills */
        $this->setSkills($form);
        /** Experiences */
        $this->setExperiences($form);
        /* Footer */
        $this->setFooter($form);
        /** Object writer */
        $objWriter = IOFactory::createWriter($this->phpWord, 'Word2007');
        /** Write file into path */
        $objWriter->save($this->params->get('uploads_directory') . $this->filePath);
        /** Response */
        $response = new BinaryFileResponse($this->params->get('uploads_directory') . $this->filePath);
        $response->headers->set('Content-Type', 'text/plain');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $this->filePath);
        return $response;
    }

    /**
     * @param $form
     * @return void
     */
    private function checkCompany($isSynergie)
    {
        if ($isSynergie) {
            $this->color = '1876d3';
            $this->userImg = 'sy-user.png';
            $this->diplomaTextImg = 'sy-diploma-text.png';
            $this->diplomaImg = 'sy-diploma.png';
            $this->wench = 'sy-wrench.png';
            $this->briefcase = 'sy-briefcase.png';
            $this->local = 'sy-local.png';
            $this->agenda = 'sy-agenda.png';
            $this->logo = 'sy-logo.png';
            $this->logoDimensions = ['height' => 28, 'width' => 80, 'align' => 'center'];
        } else {
            $this->color = '42703d';
            $this->userImg = 'user.png';
            $this->diplomaTextImg = 'diploma-text.png';
            $this->diplomaImg = 'diploma.png';
            $this->wench = 'wrench.png';
            $this->briefcase = 'briefcase.png';
            $this->local = 'local.png';
            $this->agenda = 'agenda.png';
            $this->logo = 'logo.gif';
            $this->logoDimensions = ['height' => 30, 'width' => 35, 'align' => 'center'];
        }
    }

    /**
     * @param $fileName
     * @return void
     */
    private function filePath($fileName)
    {
        if ($fileName) {
            $this->filePath = $fileName . ".docx";
        } else {
            $this->filePath = "cv.docx";
        }
    }

    /**
     * @param $form
     * @return void
     */
    private function setHeaderBody($form)
    {
        $headerStyleTable = ['width' => '31 cm', 'unit' => 'pct', 'alignment' => JcTable::CENTER];
        /* Header table */
        $table = $this->section->addTable($headerStyleTable);
        /* Row header title  */
        $table->addRow(1200);
        $headerStyleCell = ['bgColor' => $this->color, 'height' => 60, 'align' => 'center', 'valign' => 'center', 'borderColor' => $this->color, 'gridSpan' => 2];
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
        $table->addRow(1200);
        /* Cell skills */
        $skillsFontStyle = ['bold' => true, 'color' => '595959', 'size' => 12, 'name' => 'calibri'];
        $skillsstyleCell = ['bgColor' => $this->color, 'height' => 30, 'align' => 'center', 'valign' => 'top', 'borderColor' => $this->color, 'gridSpan' => 2];
        $skillsCell = $table->addCell(900, $skillsstyleCell);
        $skillsStyleRow = ['bgColor' => 'FFFFFF', 'align' => 'center', 'valign' => 'center'];
        $skillsCell = $skillsCell->addTable($skillsStyleRow)->addRow(800)->addCell(7000, $skillsStyleRow);
        $skillsCell->addText($form['headerSkills']->getData(), $skillsFontStyle, ['align' => 'center', 'color' => '595959']);
        /* Break */
        $this->section->addTextBreak(2);
    }

    private function setTrainning($form)
    {
        $trainningTableName = 'Trainning Table';
        $trainningTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $this->phpWord->addTableStyle($trainningTableName, $trainningTable);
        $table = $this->section->addTable($trainningTableName);
        /** Title with icon and underline */
        $table->addRow();
        $cell = $table->addCell(500, $this->cellStyle);
        $cell->addImage($this->params->get('icons_directory') . $this->diplomaTextImg, ['height' => 15, 'width' => 18, 'valign' => 'top', 'align' => 'right']);
        $cell->addText();
        $cell = $table->addCell(7500, $this->cellStyle);
        $cell->addText('FORMATIONS', ['color' => $this->color, 'size' => 18, 'bold' => true, 'name' => 'calibri', 'valign' => 'bottom']);
        /* Line */
        $cell->addText('', [], ['borderTopSize' => 1, 'borderColor' => $this->color]);
        /** End Title with icon and underline */
        /* Trainning rows */
        $table = $this->section->addTable($trainningTableName);

        foreach ($form->get('trainning')->getData() as $trainning) {
            $table->addRow(900);
            $table->addCell(2000, $this->rowStyleCell)->addText($trainning->getYear(), ['align' => 'right', 'color' => $this->color, 'bold' => true, 'size' => 12, 'name' => 'calibri']);
            $table->addCell(7000, $this->rowStyleCell)->addText($trainning->getQualification(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
        }
        /* Break */
        $this->section->addTextBreak(1);
    }

    /**
     * @param $form
     * @return void
     */
    private function setCertification($form){
        if ($form->get('certification')->count()) {
            $certificationTableName = 'Certification Table';
            $certificationTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
            $this->phpWord->addTableStyle($certificationTableName, $certificationTable);
            $table = $this->section->addTable($certificationTableName);
            /** Title with icon and underline */
            $table->addRow();
            $cell = $table->addCell(500, $this->cellStyle);
            $cell->addImage($this->params->get('icons_directory') . $this->diplomaImg, ['height' => 17, 'width' => 20, 'valign' => 'top', 'align' => 'right']);
            $cell->addText();
            $cell = $table->addCell(7500, $this->cellStyle);
            $cell->addText('CERTIFICATIONS', ['color' => $this->color, 'size' => 18, 'bold' => true, 'name' => 'calibri', 'valign' => 'bottom']);
            /* Line */
            $cell->addText('', [], ['borderTopSize' => 1, 'borderColor' => $this->color]);
            /** End Title with icon and underline */
            /* Certification rows */
            $table = $this->section->addTable($certificationTableName);
            foreach ($form->get('certification')->getData() as $certification) {
                $table->addRow(900);
                $table->addCell(2000, $this->rowStyleCell)->addText($certification->getYear(), ['color' => $this->color, 'bold' => true, 'size' => 12, 'name' => 'calibri']);
                $table->addCell(7000, $this->rowStyleCell)->addText($certification->getDescription(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
            }
        }
        /* Break */
        $this->section->addTextBreak(1);
    }

    /**
     * @param $form
     * @return void
     */
    private function setSkills($form){
        $skillsTableName = 'skills Table';
        $skillsTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $this->phpWord->addTableStyle($skillsTableName, $skillsTable);
        $table = $this->section->addTable($skillsTableName);
        /** Title with icon and underline */
        $table->addRow();
        $cell = $table->addCell(500, $this->cellStyle);
        $cell->addImage($this->params->get('icons_directory') . $this->wench, ['height' => 17, 'width' => 20, 'valign' => 'top', 'align' => 'right']);
        $cell->addText();
        $cell = $table->addCell(7500, $this->cellStyle);
        $cell->addText('COMPÉTENCES TECHNIQUES', ['color' => $this->color, 'size' => 18, 'bold' => true, 'name' => 'calibri', 'valign' => 'bottom']);
        /* Line */
        $cell->addText('', [], ['borderTopSize' => 1, 'borderColor' => $this->color]);
        /** End Title with icon and underline */
        /* Skills rows */
        $table = $this->section->addTable($skillsTableName);
        foreach ($form->get('skills')->getData() as $skills) {
            $table->addRow(900);
            $table->addCell(4000, $this->rowStyleCell)->addText($skills->getSkills(), ['color' => $this->color, 'bold' => true, 'size' => 12, 'name' => 'calibri',]);
            /* Break */
            $table->addCell(5000, $this->rowStyleCell)->addText($skills->getTechniques(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
        }
        /* Break */
        $this->section->addTextBreak(1);
    }

    private function setExperiences($form){
        $experienceTableName = 'Experience Table';
        $experienceTable = ['borderSize' => 1, 'borderColor' => 'ffffff'];
        $experienceCellStyle = ['valign' => 'center', 'height' => 1];
        $this->phpWord->addTableStyle($experienceTableName, $experienceTable);
        $table = $this->section->addTable($experienceTableName);
        /** Title with icon and underline */
        $table->addRow();
        $cell = $table->addCell(500, $this->cellStyle);
        $cell->addImage($this->params->get('icons_directory') . $this->briefcase, ['height' => 17, 'width' => 20, 'valign' => 'top', 'align' => 'right']);
        $cell->addText();
        $cell = $table->addCell(8500, $this->cellStyle);
        $cell->addText('EXPERIENCES', ['color' => $this->color, 'size' => 18, 'bold' => true, 'name' => 'calibri', 'valign' => 'bottom']);
        /* Line */
        $cell->addText('', [], ['borderTopSize' => 1, 'borderColor' => $this->color]);
        /** End Title with icon and underline */
        foreach ($form->get('experience')->getData() as $experience) {
            /* Table */
            $experienceStyleTable = ['alignment' => JcTable::CENTER, 'cellMargin' => 60, 'borderSize' => 0, 'borderColor' => 'f5f5f5'];
            /** Header table */
            $table = $this->section->addTable($experienceStyleTable);
            $cellRowTitle = ['vMerge' => 'restart', 'borderSize' => 0.1, 'borderColor' => $this->color, 'bgColor' => $this->color, 'align' => 'center', 'valign' => 'center'];
            /* Break */
            $row = $table->addRow();
            $row->addCell(2000, $cellRowTitle)->addImage($this->params->get('icons_directory') . $this->local, ['width' => 32, 'align' => 'right']);
            $row->addCell(4000, $cellRowTitle)->addText($experience->getTitle(), ['bold' => true, 'color' => 'ffffff', 'size' => 14, 'name' => 'calibri']);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f5f5f5', 'align' => 'center', 'valign' => 'center'];
            $row->addCell(1000, $cellRowJob)->addImage($this->params->get('icons_directory') . $this->userImg, ['width' => 54, 'align' => 'left', 'bgColor' => 'f5f5f5']);
            $cellRowJob = ['align' => 'center', 'valign' => 'bottom', 'bgColor' => 'f5f5f5'];
            $cell = $row->addCell(5000, $cellRowJob);
            $cell->addTextBreak(2);
            $cell->addText(' ' . $experience->getJob(), ['bold' => true, 'color' => $this->color, 'size' => 13, 'name' => 'calibri', 'valign' => 'bottom']);
            $row = $table->addRow();
            $cellRowContinue = ['vMerge' => 'continue', 'valign' => 'bottom'];
            $row->addCell(null, $cellRowContinue);
            $row->addCell(null, $cellRowContinue);
            $row->addCell(null, $cellRowContinue);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f5f5f5', 'align' => 'center', 'valign' => 'top'];
            $cell = $row->addCell(2000, $cellRowJob);
            $tableJobStyle = ['alignment' => 'top', 'bgColor' => 'f5f5f5', 'borderSize' => 0.1, 'borderColor' => 'f5f5f5', 'valign' => 'top'];
            $table = $cell->addTable($tableJobStyle);
            $row = $table->addRow();
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f5f5f5', 'align' => 'left', 'valign' => 'top', 'borderColor' => 'f5f5f5'];
            $cellImgCalendar = $row->addCell(500, $cellRowJob);
            $cellImgCalendar->addImage($this->params->get('icons_directory') . $this->agenda, ['height' => 14, 'width' => 16, 'valign' => 'top']);
            $cellRowJob = ['vMerge' => 'restart', 'bgColor' => 'f5f5f5', 'height' => 20, 'align' => 'center', 'valign' => 'top', 'borderColor' => 'f5f5f5'];
            $cellPeriod = $row->addCell(4500, $cellRowJob);
            $cellPeriod->addText($experience->getPeriod(), ['color' => $this->color, 'size' => 12, 'name' => 'calibri', 'valign' => 'top']);
            $cellPeriod->addTextBreak(2);
            /* Break */
            $this->section->addTextBreak(2);
            /* Missions */
            $this->section->addText('MISSIONS : ', ['color' => $this->color, 'size' => 12, 'name' => 'calibri']);
            /* Missions list */
            $paragraphStyleName = 'P-Style';
            $this->phpWord->addParagraphStyle($paragraphStyleName, ['spaceAfter' => 95]);
            $this->phpWord->addNumberingStyle(
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
                $this->section->addText($mission, $fontStyleName);
            }
            $this->section->addTextBreak(2);
            /* Environment */
            $envTableName = 'Environment Table';
            $envTable = ['borderSize' => 1, 'borderColor' => '8e9091', 'cellSpacing' => 5];
            $this->phpWord->addTableStyle($envTableName, $envTable);
            $table = $this->section->addTable($envTableName);
            $table->addRow(1500);
            $cell = $table->addCell(null, ['bgColor' => 'e7e6e6', 'cellMargin' => 'center']);
            $cell->addText('');
            $cell->addText('Environnement technique : ', ['color' => $this->color, 'size' => 12, 'bold' => true, 'name' => 'calibri']);
            $cell->addText($experience->getEnvironment(), ['color' => '131313', 'size' => 12, 'name' => 'calibri']);
            /* Break */
            $this->section->addTextBreak(1);
        }
    }

    /**
     * @param $form
     * @return void
     */
    private function setFooter($form){
        $footer = $this->section->addFooter();
        $footer->addImage($this->params->get('icons_directory') . $this->logo, $this->logoDimensions);
        $arrayFooter = explode(PHP_EOL, $form->get('footer')->getData());
        foreach ($arrayFooter as $item) {
            $this->phpWord->addFontStyle('footerFontStyle', ['color' => '666666', 'size' => 8, 'name' => 'calibri']);
            $this->phpWord->addParagraphStyle('footerPragStyle', ['align' => 'center', 'spaceAfter' => 10]);
            $footer->addText($item, 'footerFontStyle', 'footerPragStyle');
        }
    }
}