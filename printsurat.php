<?php
include'koneksi.php';
//include master file
require("fpdf/fpdf.php");

class pdf extends FPDF{
  
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
  function letak($gambar){
  //memasukkan gambar untuk header
  $this->Image($gambar,14,8,23,24);
  //menggeser posisi sekarang
  }
  function judul($teks1, $teks2, $teks3, $teks4, $teks5){
    $this->Cell(25);
    $this->SetFont('Times','B','12');
    $this->Cell(0,5,$teks1,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,5,$teks2,0,1,'C');
    $this->Cell(25);
    $this->SetFont('Times','B','15');
    $this->Cell(0,5,$teks3,0,1,'C');
    $this->Cell(25);
    $this->SetFont('Times','I','8');
    $this->Cell(0,5,$teks4,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,2,$teks5,0,1,'C');
    }
    function garis(){
      $this->SetLineWidth(1);
      $this->Line(10,36,198,36);
      $this->SetLineWidth(0);
      $this->Line(10,37,198,37);
      }}
//instantisasi objek
$pdf=new pdf();
if(isset($_GET['id_pinjam'])){

  $id=($_GET['id_pinjam']);
  $data = mysqli_query($koneksi,"select * from peminjaman where id_pinjam='$id'");
  $d = mysqli_fetch_array($data);
//Mulai dokumen
$pdf->AddPage('P', 'A4');
//meletakkan gambar
$pdf->letak('img/logo smada.png');
//meletakkan judul disamping logo diatas
$pdf->judul('PEMERINTAH PROVINSI JAWA TENGAH','DINAS PENDIDIKAN DAN KEBUDAYAAN','SEKOLAH MENENGAH ATAS NEGERI 2 PURWOKERTO','Jl. Jend. Gatot Subroto No.69, Karangjengkol, Sokanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53115', 'Website: http://https://www.sman2-purwokerto.sch.id/ | E-Mail: sma02pwt@yahoo.com');
//membuat garis ganda tebal dan tipis
$pdf->garis();

$pdf->SetFont('Times','B',12);
$pdf->Cell(195,21,'SURAT PEMINJAMAN SARANA/PRASARANA',0,0,'C');
$pdf->Line(60,45,155,45);
$pdf->Cell(55);
$pdf->Cell(89,0,'','B',1,'C');
$pdf->SetFont('Times','','11');
$pdf->Cell(190,35,'Nomor: SIPRANA/'.$d['id_pinjam'],0,1,'C');

$pdf->Cell(180,4,'    Sehubungan dengan pengajuan peminjaman sarana/prasarana SMA Negeri 2 Purwokerto, kami bermaksud ',0,1,'L');
$pdf->Cell(180,4,'untuk mengajukan permohonan peminjaman dengan keterangan peminjaman sebagai berikut :',0,1,'L');

$pdf->SetFont('times','','11');
$pdf->Cell(15,10,'Tanggal Peminjaman',0,0);
$pdf->Cell(42);
$pdf->Cell(5,10,' : ',0,0);
$pdf->Cell(10,10,date("d F Y", strtotime($d['tanggal_pinjam'])),0,1); 

$pdf->SetFont('times','','11');
$pdf->Cell(15,4,'Tanggal Pengembalian',0,0);
$pdf->Cell(42);
$pdf->Cell(5,4,' : ',0,0);
$pdf->Cell(10,4,date("d F Y", strtotime($d['tanggal_balik'])),0,1); 

$pdf->SetFont('times','','11');
$pdf->Cell(15,8,'Sarana/Prasarana yang dipinjam',0,0);
$pdf->Cell(42);
$pdf->Cell(5,8,' : ',0,1);
$pdf->Cell(30);
$pdf->Cell(50,7,'Nama Sarana/Prasarana' ,1,0,'C');
$pdf->Cell(50,7,'Jumlah',1,1,'C');
$a = mysqli_query($koneksi,"SELECT  * FROM barangpinjam where id_pinjam='$id'");
while($b = mysqli_fetch_array($a)){
  $pdf->Cell(30);
  $pdf->Cell(50,6, str_replace('_', ' ', $b['nama_barang']),1,0);
  $pdf->Cell(50,6, $b['jumlah'],1,1);  
}

$pdf->Cell(180,4,'    Demikian surat peminjaman ruangan ini kami sampaikan, atas perhatiannya kami ucapakan terimaksih.',0,1,'L');

$tgl=date("d F Y");
$pdf->Ln(10);
     $pdf->SetFont('Times','',11);
     $pdf->Cell(140);
     $pdf->Cell(30,5,'Purwokerto, '.$tgl,0,1,'C');
     $pdf->SetFont('Times','',11);
     $pdf->Cell(140);
     $pdf->Cell(30,7,'Penanggung Jawab',0,1,'C');

     $pdf->Ln(24);
     $pdf->SetFont('Times','B',11);
     $pdf->Cell(140);
     $pdf->Cell(30,4,$d['pj'],0,1,'C');
     $pdf->Cell(135);
     $pdf->Cell(38,0.5,'','B',1,'L');

$pdf->Output('SuratPeminjaman.pdf','I');}?>