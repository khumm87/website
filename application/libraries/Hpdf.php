<?php
require('fpdf/fpdf.php');

/**
 *
 */
class Hpdf extends FPDF
{

    function Header(){
        //kotak atas
        $this->SetFillColor(197, 155, 107);
        $this->Rect(0, 0, 22, 0.6 , 'F');
        // logo atau gambar,
        $this->Image('assets/img/bakkah.png',1,1,2);
        // arial bold 15
        $this->SetFont('times','',30);
        // membuat cell kosong dengan panjang 80
        $this->Cell(80);
        // judul
        $this->Text(3, 2 ,'Bakkah');
        // teks logo Bakkah
        $this->Ln(3);
        $this->SetFont('times','',14);
        $this->Text(4.5, 2.4 ,'Tour & Travel');
        $this->SetFont('times','',11);
        $this->Text(6.2, 1.7 ,'mqmt');
        //alamat bakkah
        $this->SetFont('helvetica','',6);
        $this->Text(3, 2.8 ,'Jl. Mini 3 No. 59, Bambu Apus, Jakarta Timur');
        $this->Text(3, 3.1 ,'Telp. (021) 70584697');
    }

    function Footer(){
       $this->SetFillColor(197, 155, 107);
       $this->Rect(0, 29, 21, 1.2 , 'F');

     }
}
