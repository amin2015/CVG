<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class ProfileController extends AbstractController
{
    /**
     * @param Request $request
     * @param FileUploader $fileUploader
     * @return Response
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    #[Route('/', name: 'genrate_cv', methods: ['GET', 'POST'])]
    public function generateCv(EntityManagerInterface $em, Request $request, FileUploader $fileUploader): Response
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** PhpWord */
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            /** File name */
            $fileName = $form['fileName']->getData();
            if ($fileName) {
                $filePath = $fileName . ".docx";
            }
            /** Upload file (logo) */
            if ($form['logo']->getData()) {
                $fileName = $fileUploader->upload($form['logo']->getData());
                $profile->setLogo($fileName);
                $this->fileProcessing('logo', $fileName, $section);
            }
            /** Header */
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $this->htmlProcessing($form['head']->getData()), false, false);
            // Two space
            $section->addTextBreak(2, null, null);
            /** Technical skills */
            if ($form['technicalSkills']->getData()) {
                $this->arrayProcessing('technicalSkills', $phpWord, $section, $form);
            }
            /** Training */
            if ($form['trainings']->getData()) {
                // One space
                $section->addTextBreak(1, null, null);
                $this->arrayProcessing('trainings', $phpWord, $section, $form);
            }
            /** Refrence */
            if ($form['reference']->getData()) {
                // One space
                $section->addTextBreak(1, null, null);
                $section->addText(
                    'Veille professionnelle et références',
                    $this->getTitleStyle($phpWord)
                );
                \PhpOffice\PhpWord\Shared\Html::addHtml($section, $form['reference']->getData(), false, false);
            }
            /** Personnel projects */
            if ($form['personnelProjects']->getData()) {
                // One space
                $section->addTextBreak(1, null, null);
                $section->addText(
                    'Projets personnels',
                    $this->getTitleStyle($phpWord)
                );
                \PhpOffice\PhpWord\Shared\Html::addHtml($section, $form['personnelProjects']->getData(), false, false);
            }
            /** Language */
            if ($form['language']->getData()) {
                // One space
                $section->addTextBreak(1, null, null);
                $this->arrayProcessing('language', $phpWord, $section, $form);
            }
            /** Professional experience */
            if ($form['professionalExperience']->getData()) {
                // One space
                $section->addTextBreak(1, null, null);
                $section->addText(
                    'Expérience professionnelle',
                    $this->getTitleStyle($phpWord)
                );
                $tableContentStyle = 'Table content style';
                $phpWord->addFontStyle(
                    $tableContentStyle,
                    array('name' => 'calibri light', 'size' => 12, 'color' => '212529')
                );
                // Horizontal line
                $section->addText('', [], ['borderBottomSize' => 3]);
                \PhpOffice\PhpWord\Shared\Html::addHtml($section, $this->htmlProcessing(preg_replace('/&amp;/', htmlspecialchars('&amp;'), $form['professionalExperience']->getData())), false, false);
            }
            /** Footer */
            if ($form['footer']->getData()) {
                $footer = $section->addFooter();
                $this->fileProcessing('footer', $fileName, $footer);
                \PhpOffice\PhpWord\Shared\Html::addHtml($footer, $form['footer']->getData(), false, false);
            }
            /** Create writer */
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            /** Write file into path */
            $objWriter->save( $this->getParameter('uploads_directory') . $filePath);
            /** Response */
            $response = new BinaryFileResponse( $this->getParameter('uploads_directory') . $filePath);
            $response->headers->set('Content-Type', 'text/plain');
            $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,  $filePath);
            return $response;
        }

        return $this->renderForm('profile/new.html.twig', [
            'profile' => $profile,
            'form' => $form,
        ]);
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

    /**
     * @param $input
     * @param $fileName
     * @param $section
     * @return void
     */
    private function fileProcessing($input, $fileName, $section)
    {
        $pathFile = $this->getParameter('uploads_directory') . $fileName;
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

    private function getTitleStyle($phpWord)
    {
        $titleStyle = 'Title style';
        $phpWord->addFontStyle(
            $titleStyle,
            array('name' => 'calibri light', 'size' => 14, 'color' => '3f7147', 'bold' => true)
        );
        return $titleStyle;
    }

    /**
     * @param $name
     * @param $phpWord
     * @param $section
     * @param $form
     * @return void
     */
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
}