<?php

namespace ILabAfrica\SpecimenTracker;

use TCPDF;

class SpecimenIdentifierPDF extends TCPDF
{
    //Pdf Header
    public function Header()
    {
        if ($this->page == 1) {
            // Logo
            $image_file = 'ilabafrica.jpg';
            $this->Image($image_file, 75, 10, 50, '', 'JPG', '', '', false, 300, '', false, false, 0, false, false, false);
            $this->ln();
            // Set font
            $this->SetFont('helvetica', 'B', 20);

            $this->SetMargins(PDF_MARGIN_LEFT, 50, PDF_MARGIN_RIGHT);
        } else {
            $this->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
        }
    }

    public function Footer()
    {
        // Class 'App\Models\DateTime' not found
        // $now = new DateTime();
        // $printTime = $now->format('Y-m-d H:i');

        //Position at 15mm at the bottom
        $this->SetY(-15);
        //Set font
        $this->SetFont('helvetica', 'I', 8);
        //set page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
        // $this->Cell(0, 10, "Printed by: ".Auth::user()->name." Date: ".$printTime, 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}