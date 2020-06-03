<?php
session_start();

include('include/config.php');
$klppeterpan=intval($_GET['klppeterpan']);
if(strlen($_SESSION['dlogin'])==0)
	{	
    
header('location:index.php');
}
else{
	if(isset($_POST['idusers']))
	{

	$year = date('Y');
	$bulan_ini=date('n');
	if($bulan_ini<=6){
		$bulan_ini='2';
	}else{
		$bulan_ini='1';
	}
			$string_gabungan = $year.$bulan_ini;
			$semester=$string_gabungan;
			$iddosen=$_POST['iddosen'];
			$idusers=$_POST['idusers'];
			$klppeterpan=$_POST['klppeterpan'];
			$catatankonsultasi=$_POST['catatankonsultasi'];
      $statuskehadiran=$_POST['statuskehadiran'];
      $postingDate =$_POST['postingDate'];
      $count = count($idusers);

      $sql   = "INSERT INTO kehadiran (idkelompok,idusers,iddosen,semester,statuskehadiran,postingDate) VALUES ";

      for( $i=0; $i < $count; $i++ )
{
    $sql .= "('{$klppeterpan}','{$idusers[$i]}','{$iddosen}','{$semester}','{$statuskehadiran[$i]}','{$postingDate}')";
    $sql .= ",";
    
}


$sql = rtrim($sql,",");
$insert = $con->query($sql);
$sql =mysqli_query($con,"INSERT INTO catatankelompok(klppeterpan,iddosen,catatankonsultasi,semester,postingDate) VALUES ('$klppeterpan','$iddosen','$catatankonsultasi','$semester','$postingDate')");
// if( !$insert )
// {
// 	echo "gagal insert : ".$con->error;
// }else{
// 	echo "sukses, silahkan check database anda";
// }
	$_SESSION['msg']="Catatan evaluasi berhasil ditambahkan.";


	
}

if(isset($_GET['idkehadiran']) && $_GET['action']=='del')
{
$idkehadiran=$_GET['idkehadiran'];

$query=mysqli_query($con,"delete from kehadiran where idkehadiran='$idkehadiran'");

$sec = "1";

header("location:javascript://history.go(-1)");

}

if(isset($_GET['idcatatankelompok']) && $_GET['action']=='del')
{
$idcatatankelompok=$_GET['idcatatankelompok'];

$query=mysqli_query($con,"delete from catatankelompok where idcatatankelompok='$idcatatankelompok'");


header("location:javascript://history.go(-1)");

}


?>

<!DOCTYPE html>
<!--
 * HTML-Sheets-of-Paper (https://github.com/delight-im/HTML-Sheets-of-Paper)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
-->
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Emulating real sheets of paper in web documents (using HTML and CSS)">
		<title>Kartu Konsultasi Peterpan</title>
		<link rel="stylesheet" type="text/css" href="css/a4.css">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
table {
    border-collapse: collapse;
  width: 100%;
  float:left;
  
}
.floatLeft { width: 53%; float: left; }
.floatRight {width: 45%; float: right; }
.container { overflow: hidden; }

th, td {
  text-align: left;
  padding: 5px;
  border: 1px solid black;
  font-size: 11px;
}

tr:nth-child(even){background-color: white}

th {
  background-color: #696464;
  color: white;
}
img {
  float: right;
  width : 30%;
}
p {
  font-size: 12px;
}
.button {
  background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 8px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 4px 2px;
  cursor: pointer;


  
}




.badge {
  padding: 1px 2px 1px;
  font-size: 11px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
.badge:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
.badge-error {
  background-color: #dc3545;
}
.badge-error:hover {
  background-color: #9e302c;
}
.badge-warning {
  background-color: #f89406;
}
.badge-warning:hover {
  background-color: #c67605;
}
.badge-success {
  background-color: #28a745;
}
.badge-success:hover {
  background-color: #28a745;
}
.badge-info {
  background-color: #3a87ad;
}
.badge-info:hover {
  background-color: #2d6987;
}
.badge-inverse {
  background-color: #333333;
}
.badge-inverse:hover {
  background-color: #1a1a1a;
}

@media print {
  #printPageButton {
    display: none;
  }
}

</style>

	</head>
	
	<body class="document">
    
		<div class="page" contenteditable="false">
    
        <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/Logo-SI.jpg" alt="SI UKDW">
			<p>Evaluasi Kemajuan Proses Pengerjaan Proyek</p>
      <?php
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select distinct semester from kelompok where iddosen='".$_SESSION['dlogin']."' and klppeterpan='$klppeterpan' and semester='$semester'");
while($row=mysqli_fetch_array($ret))
{
?>
			<p>Pemograman Terintegrasi Terapan Semester 
      <?php
      $data =  $row['semester'];
      $sms= substr("$data",-1); //20191
      if($sms =="1"){

        echo  'Ganjil';
      }
      else{
      
        echo 'Genap';
      }
      
      ?>       <?php
      $data =  $row['semester'];
      $tahunsekarang= substr("$data",0,-1); //20191
      $tahundepan=$tahunsekarang+1;
      echo "$tahunsekarang/$tahundepan"
      ?>  
      
      </p>
      <?php } ?>  
            <br>
            <br>
            <br>
            <?php
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from dosen where username='".$_SESSION['dlogin']."'");
while($row=mysqli_fetch_array($ret))
{
?>
			<p>Dosen Pembimbing :	<b><?php echo $row['nmdosen'];?></b></p>
		<br><?php } ?>  


    <div class="container">
    <div class="floatLeft">
    <?php 
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);

$query2=mysqli_query($con,"select idkelompok, group_concat(idusers ORDER BY idusers ASC SEPARATOR ', ') AS logged_in_users from kehadiran where idkelompok='$klppeterpan' and iddosen='".$_SESSION['dlogin']."' and semester='$semester' and statuskehadiran='1' group by postingDate");
$cnt=1;
$num4 = mysqli_fetch_array($query2);
{
?>
<?php  } ?>
            <table >
 
  <tr>
    <th ><center>NO</th>
    <th ><center>Tanggal</th>
    <th ><center>Catatan Konsultasi</th>
    <th ><center>Kehadiran*</th>
  </tr>

<?php 
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$query=mysqli_query($con,"select kehadiran.idkelompok,kehadiran.idusers,kehadiran.iddosen,c.catatankonsultasi,kehadiran.semester,kehadiran.statuskehadiran,kehadiran.postingDate,group_concat(distinct kehadiran.idusers ORDER BY kehadiran.idusers ASC SEPARATOR ', ') AS hasil from kehadiran join catatankelompok c on kehadiran.postingDate=c.postingDate where kehadiran.idkelompok='$klppeterpan' and kehadiran.iddosen='".$_SESSION['dlogin']."' and kehadiran.semester='$semester' and kehadiran.statuskehadiran='1' group by kehadiran.postingDate order by c.postingDate ASC");
$query2=mysqli_query($con,"select idkelompok, group_concat(idusers ORDER BY idusers ASC SEPARATOR ', ') AS hasil from kehadiran where idkelompok='$klppeterpan' and iddosen='".$_SESSION['dlogin']."' and semester='$semester' and statuskehadiran='1' group by postingDate");
//select kehadiran.idkelompok,kehadiran.idusers,kehadiran.iddosen,kehadiran.semester,kehadiran.statuskehadiran,kehadiran.postingDate,group_concat(kehadiran.idusers ORDER BY kehadiran.idusers ASC SEPARATOR ', ') AS logged_in_users from kehadiran join catatankelompok c on kehadiran.postingDate=c.postingDate where kehadiran.idkelompok='7' and kehadiran.iddosen='yetli' and kehadiran.semester='20191' group by c.postingDate
$cnt=1;
$num3 = mysqli_fetch_array($query2);
while($row=mysqli_fetch_array($query))
{
?>

  <tr>
    <td><center><?php echo htmlentities($cnt);?></td>
    <td style="width:22%"><center><?php 
    
    $tanggal = htmlentities($row['postingDate']);
    echo date("d F Y", strtotime($tanggal));
    
    ?></td>
    <td>
    <?php echo htmlentities($row['catatankonsultasi']);?>
    <br>
    
    </td>
    
    <td>
    <?php echo htmlentities($row['hasil'])?>
    </td>
    
    </tr>

  
    <?php $cnt=$cnt+1; } ?>


</table>

<p> &nbsp</p>
<p style="font-size:10px;"> Note : (*) Mahasiswa yang tampil pada kolom kehadiran merupakan mahasiswa yang hadir pada konsultasi per tanggal tersebut.</p>
     </div>


<div class="floatRight">
<table  >
 
  <tr>
    <th ><center>NO</th>
    <th ><center>NIM</th>
    <th ><center>Nama Mahasiswa</th>
    <th ><center>IPK</th>
    <th ><center>KLP</th>
    <th ><center>Nilai Akhir</th>
  </tr>
  <?php 
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$query=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim where klppeterpan='$klppeterpan' and iddosen='".$_SESSION['dlogin']."' and semester='$semester' order by u.nim");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>						
  <tr>
    <td><center><?php echo htmlentities($cnt);?></td>
    <td><center><?php echo htmlentities($row['nim']);?></td>
    <td><?php echo htmlentities($row['namalengkap']);?></td>
    <td><center><?php echo htmlentities($row['ipk']);?></td>
    <td><center><?php echo htmlentities($row['klppeterpan']);?></td>
    <td><center><?php echo htmlentities($row['nilaiakhir']);?></td>
    

  </tr>
  
  <?php $cnt=$cnt+1; } ?>

</table>
<div>
<br>
<hr size="0px">
<hr size="0px">
        
<p style="text-align:right"><u>Yogyakarta,	<?php 

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


echo tgl_indo(date('Y-m-d'));?>



</u></p>
<p style="text-align:center">Dosen Pembimbing</p>
<p> &nbsp</p>
<p> &nbsp</p>
<p> &nbsp</p>
<?php
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from dosen where username='".$_SESSION['dlogin']."'");
while($row=mysqli_fetch_array($ret))
{
?>
<p style="text-align:center"> <b>(<?php echo $row['nmdosen'];?>)</b></p>
<?php } ?>  
<p style="text-align:left">1. Form ini dipegang dan disimpan oleh Dosen Pembimbing.</p>
<?php
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select distinct semester from kelompok where iddosen='".$_SESSION['dlogin']."' and klppeterpan='$klppeterpan' and semester='$semester'");
while($row=mysqli_fetch_array($ret))
{
?>
<p style="text-align:left">2. Form dikembalikan ke Koordinator pada akhir Semester <?php
      $data =  $row['semester'];
      $sms= substr("$data",-1); //20191
      if($sms =="1"){

        echo  'Ganjil';
      }
      else{
      
        echo 'Genap';
      }
      
      ?>       <?php
      $data =  $row['semester'];
      $tahunsekarang= substr("$data",0,-1); //20191
      $tahundepan=$tahunsekarang+1;
      echo "$tahunsekarang/$tahundepan"
      ?>  
      
      
       bersamaan dengan Laporan Hasil Kerja.</p><?php } ?>


    



       <p> &nbsp</p>
<p> &nbsp</p>
<button style="font-size:12px" id="printPageButton" value="Print" class="button badge-info"
               onclick="window.print()" ><i class="fa fa-print"></i> Print</button>
               <button style="font-size:12px" id="printPageButton" value="Print" class="button badge-error"><a style="color: white;" href="javascript:window.open('','_self').close();"><i class="fa fa-close"></i> Close</a></button>
        </div>
        
        </div>
		<script type="text/javascript">
		// window.print();
		</script>
	</body>
</html>

<?php } ?>
