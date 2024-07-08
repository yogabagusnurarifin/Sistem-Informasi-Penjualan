<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pdf
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }

    function PdfGenerator($html, $filename, $paper, $orientation)
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);
        // Render the HTML as PDF
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => false));
    }
}
