<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'third_party/fpdf181/fpdf.php');
class CustomFPDF extends FPDF {

    public function header($family){
        $this->SetFont($family,'B',15);
        $this->Cell(80);
        $this->Cell(30,10,'Title',1,0,'C');
        $this->Ln(20);
    }

    public function getInstance(){
        return new CustomFPDF();
    }
}
?>