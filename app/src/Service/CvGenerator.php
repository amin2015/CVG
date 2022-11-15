<?php

namespace App\Service;

use App\Entity\Cv;
use App\Entity\Theme;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class CvGenerator
{
    /**
     * @var FileUploader $fileUploader
     */
    private FileUploader $fileUploader;

    private string $targetDirectory;

    public function __construct(FileUploader $fileUploader, string $targetDirectory)
    {
        $this->fileUploader = $fileUploader;
        $this->targetDirectory = $targetDirectory;
    }

    public function generate(Cv $cv)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $fileName = $cv->getFileName();
        $filePath = $fileName . ".docx";

        $table = $section->addTable('mskillsTable');
        $tableContentStyle = 'Table content style';
        $phpWord->addFontStyle(
            $tableContentStyle,
            array('name' => 'calibri light', 'size' => 12, 'color' => $cv->getColor())
        );

        $tableContentStyleHeader = 'Table content style header';
        $phpWord->addFontStyle(
            $tableContentStyleHeader,
            array('name' => 'calibri light', 'size' => 13, 'color' => $cv->getColor())
        );

        $pathFile = $this->targetDirectory . $cv->getLogo();
//        dump($pathFile);exit;
        $table->addRow();
        $table->addCell(2000)->addImage($pathFile);
        $table->addCell(8000)->addText(
            $this->htmlProcessing($cv->getHeaderSkills() ." ".$cv->getHeaderTitle()), $tableContentStyleHeader
        );

//        if ($cv->getLogo()) {
//            $this->fileProcessing('logo', $cv->getLogo(), $section);
//        }
        $section->addTextBreak(2, null, null);
        /** Header */
//        /** Professional experience */
        if ($cv->getTheme()) {
            foreach ($cv->getTheme() as $theme) {
                $section->addTextBreak(1, null, null);
                $section->addText(
                    $theme->getName(),
                    $this->getTitleStyle($phpWord, $cv)
                );
                $section->addText('', [], ['borderBottomSize' => 3]);
                foreach ($theme->getSubTheme() as $subtheme) {
                    switch ($theme->getType()) {
                        case Theme::EXPERIENCE_ID:
                            $tableContentStyle = 'Table content style';
                            $phpWord->addFontStyle(
                                $tableContentStyle,
                                array('name' => 'calibri light', 'size' => 12, 'color' => '212529')
                            );

                            \PhpOffice\PhpWord\Shared\Html::addHtml(
                                $section,
                                $this->htmlProcessing(
                                    preg_replace(
                                        '/&amp;/',
                                        htmlspecialchars('&amp;'),
                                        $subtheme->getSkillsDescription()
                                    )
                                ),
                                false,
                                false
                            );
                        break;
                        case Theme::COMPETENCE_ID:
                            $table = $section->addTable('mskillsTable');
                            $tableContentStyle = 'Table content style';
                            $phpWord->addFontStyle(
                                $tableContentStyle,
                                array('name' => 'calibri light', 'size' => 12, 'color' => '212529')
                            );
                            $table->addRow();
                            $table->addCell(2000)->addText($subtheme->getSkillsTitle(), $tableContentStyle);
                            $table->addCell(8000)->addText(
                                $this->htmlProcessing(strip_tags($subtheme->getSkillsDescription())), $tableContentStyle
                            );
                        break;
                        case Theme::FORMATION_ID:
                            $section->addListItem($subtheme->getSkillsTitle() . " ".strip_tags($subtheme->getSkillsDescription()));

                            break;
                    }

                }
            }
            // One space
                    }

        $footer = $section->addFooter();
        $this->fileProcessing('footer', $cv->getLogo(), $footer);
        \PhpOffice\PhpWord\Shared\Html::addHtml($footer, $cv->getNameSociety() . "<br />".$cv->getCommercialInformation() ."<br />".$cv->getWebsiteSociety(), false, false);
//        /** Footer */
//        if ($form['footer']->getData()) {
//            $footer = $section->addFooter();
//            $this->fileProcessing('footer', $fileName, $footer);
//            \PhpOffice\PhpWord\Shared\Html::addHtml($footer, $form['footer']->getData(), false, false);
//        }
        /** Create writer */
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        /** Write file into path */
        $objWriter->save( $this->targetDirectory . $filePath);
        exit;
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

    private function fileProcessing($input, $fileName, $section)
    {
        $pathFile = $this->targetDirectory . $fileName;
        switch ($input) {
            case 'logo' :
                $section->addImage(
                    $pathFile,
                    array(
                        'positioning' => 'absolute',
                        'width' => 150,
                        'height' => 150,
                        'wrappingStyle' => 'square',
                        'wrapDistanceRight' => 70,
                        'wrapDistanceLeft' => -10,
                    )
                );
                break;
            case 'footer' :
                $section->addImage(
                    $pathFile,
                    array(
                        'width' => 30,
                        'height' => 30,
                        'alignment' => 'center',
                    )
                );

        }
    }

    private function arrayProcessing($name, $phpWord, $section, $form)
    {
        $section->addText(
            $name == 'technicalSkills' ? 'COMPETENCES TECHNIQUES' : ($name == 'trainings' ? 'FORMATIONS' : 'Langues'),
            $this->getTitleStyle($phpWord)
        );
        if ($name == 'technicalSkills') {
            // Horizontal line
            $section->addText('', [], ['borderBottomSize' => 3, 'marginBottom' => -10]);
        }
        $text = $form[$name]->getData();
        $arraySElements = explode(PHP_EOL, $text);
        $tableStyle = array(
            'borderColor' => 'FFFFFF',
            'borderSize' => 0,
            'cellMargin' => 50
        );
        $phpWord->addTableStyle('mskillsTable', $tableStyle);
        $table = $section->addTable('mskillsTable');
        $tableContentStyle = 'Table content style';
        $phpWord->addFontStyle(
            $tableContentStyle,
            array('name' => 'calibri light', 'size' => 12, 'color' => '212529')
        );
        $countElements = count($arraySElements);
        $i = 0;
        for ($r = 1; $r <= $countElements / 2; $r++) {
            $table->addRow();
            for ($c = 0; $c <= 1; $c++) {
                if ($i % 2)
                    $table->addCell($name == 'technicalSkills' ? 60000 : 80000)->addText(html_entity_decode(strip_tags($arraySElements[$i++])), $tableContentStyle);
                else
                    $table->addCell($name == 'technicalSkills' ? 40000 : 20000)->addText(html_entity_decode(strip_tags($arraySElements[$i++])), $tableContentStyle);
            }
        }
    }

    private function getTitleStyle($phpWord, Cv $cv)
    {
        $titleStyle = 'Title style';
        $phpWord->addFontStyle(
            $titleStyle,
            array('name' => 'calibri light', 'size' => 17.5, 'color' => $cv->getColor(), 'bold' => true)
        );
        return $titleStyle;
    }
}
