<?php
/**
 * HTML2PDF Library - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2016 Laurent MINGUET
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
    try
    {
        $html2pdf = new HTML2PDF('P',array(80,180), 'fr');
        // $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Helvetica');
        //$html2pdf->pdf->SetProtection(array('print'), 'grindbote');
        $html2pdf->pdf->IncludeJS("print(true);");
        $html2pdf->writeHTML($this->fetch('content'), isset($_GET['vuehtml']));
        $html2pdf->Output('sales.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
