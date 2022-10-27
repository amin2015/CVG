<?php

namespace App\Service;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
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

    public function generatePhpWord($form):Response
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
        $html = '<tbody><tr valign="top">
		<td width="71" bgcolor="#2f5496" style="background: #2f5496; border: none; padding: 0cm"><p align="left" style="orphans: 2; widows: 2; margin-bottom: 0cm">
    <br>

			</p>
			<p align="left" style="orphans: 2; widows: 2"><font size="3" style="font-size: 12pt"><font face="Times New Roman, serif">	</font></font></p>
		</td>
		<td width="694" bgcolor="#2f5496" style="background: #2f5496; border: none; padding: 0cm"><p align="left" style="orphans: 2; widows: 2; margin-bottom: 0cm">
			<br>

			</p>
			<p align="center" style="orphans: 2; widows: 2; margin-left: -2.43cm; margin-bottom: 0.21cm">
			<font face="Calibri, serif"><font color="#ffffff"><font size="4" style="font-size: 16pt">Développeur
			ReactJS</font></font></font></p>
			<p align="center" style="orphans: 2; widows: 2; margin-left: -2.43cm; margin-bottom: 0.21cm">
			<font face="Calibri, serif"><font size="3" style="font-size: 12pt"><font color="#ffffff">4
			ans d’expérience</font></font></font></p>
			<p align="left" style="orphans: 2; widows: 2; margin-bottom: 0cm">
<span id="Cadre1" dir="ltr" style="float: left; width: 15.91cm; border: none; padding: 0cm; background: #2f5496"></span></p><p align="center" style="orphans: 0; widows: 0; background: #ffffff">
				<font color="#2f5496"><span lang="en-US"><b>React.js, Node.js,
				Scrum, JavaScript, TypeScript, Jquery,  HTML, CSS</b></span></font></p>
			
			<p></p>
			<p align="left" style="orphans: 2; widows: 2"><br>

			</p>
		</td>
	</tr>
</tbody>';
        $doc = new \DOMDocument();
        $doc->preserveWhiteSpace = FALSE;
        $doc->loadHTML($html);
        $doc->saveHTML();

       // $doc->load("http://banners.willhill.com/xml/viewxml.asp?sport=FB&style=12");
        //dd($doc->saveHtml());
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $doc->saveXML(),true);
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => 'fff', 'bold' => true, 'fgColor' => 'dsf')
        );
        $section->addText(
            $form['headerTitle']->getData(),
            $fontStyleName
        );



        /** Create writer */
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        /** Write file into path */
        $objWriter->save( $this->params->get('uploads_directory') . $filePath);
        /** Response */
        $response = new BinaryFileResponse( $this->params->get('uploads_directory') . $filePath);
        $response->headers->set('Content-Type', 'text/plain');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,  $filePath);
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