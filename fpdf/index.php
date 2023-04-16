<?php
//memanggil library FPDF
require('fpdf.php');

//intance object dan memberikan halaman pdf_add_annotation
$pdf= new FPDF('l', 'mm','A5');

//membuat halaman baru
$pdf->AddPage();

//setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);

//mencetak string
$pdf->Cell(190,7,'POLITEKNIK PIKSI GANESHA',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR MAHASISWA JURUSAN MANAJEMAN INFORMATIKA',0,1,'C');

//Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6, 'NPM', 1,0);
$pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
$pdf->Cell(27,6, 'NO HP', 1,0);
$pdf->Cell(35,6, 'TANGGAL LAHIR',1,1);

$pdf->SetFont('Arial','',10);

include'koneksi.php';
$mahasiswa=mysqli_query($connect,"select * from tabmaha");
while($row=mysqli_fetch_array($mahasiswa)){
	$pdf->Cell(20,6,$row['npm'],1,0);
	$pdf->Cell(85,6,$row['nama'],1,0);
	$pdf->Cell(27,6,$row['no_hp'],1,0);
	$pdf->Cell(35,6,$row['tgl_lahir'],1,1);
}
	
$pdf->Output();
?>