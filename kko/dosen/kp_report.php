<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['dlogin'])==0)
	{	
header('location:index.php');
}
else{





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
		<link rel="stylesheet" type="text/css" href="css/a4_potrait.css">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
table {
    border-collapse: collapse;
  width: 100%;
  float:left;
  
}
.floatLeft { width: 46%; float: left; }
.floatAll { width: 100%; float: left; }
.floatRight {width: 50%; float: right; }

.fLeft { width: 20%; text-align: center; float: left; }
.fCenter { width: 20%; left: -50%; float: left; }
.fRight {width: 20%; text-align: center; float: right; }
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
/* The Magic Float Center Code */
.float_center {
  float: right;

  position: relative;
  left: -50%; /* or right 50% */
  text-align: left;
}
.float_center > .child {
  position: relative;
  left: 50%;
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

.info {
  background-color: #f39422;
  color: #ffffff;
}
td.tdend{
  background-color: #f39422;
  color: white;
}
hr.new3 {
  border-top: 2px dotted black;
}

.table {border: none;
  border-collapse: collapse;}
  
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
    
    <div class="container">
    <div class="floatLeft">       
        <table >
      <tr>
<td class="table" rowspan="3" style="width:62px;"><img style="width:100%;" src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" alt="UKDW"></td>
<td class="table" style="font-size:14.8px;">UNIVERSITAS KRISTEN DUTA WACANA</td>
      </tr>
      <tr>

<td class="table" style="font-size:14.8px;">FAKULTAS TEKNOLOGI INFORMASI</td>
      </tr>
      <tr>

<td class="table info" style="font-size:12px;"><center>PROGRAM STUDI SISTEM INFORMASI</td>
      </tr>
      </table >
 </div>

 <div class="floatRight">
 <table >
      <tr>

<td class="table" colspan="3" style="font-size:20.5px; text-align:right;"><b>KARTU KONSULTASI KERJA PRAKTIK</b></td>
      </tr>
      <tr>
      <td class="table"></td>
      </tr>
      <tr>

<td class="table info" style="font-size:20px;width:22%;"><center>SI 4023</td>
<td class="table" style="font-size:12px;">Semester : <?php
      $data =  $_GET['semester'];
      $sms= substr("$data",-1); //20191
      if($sms =="1"){

        echo  'Gasal';
      }
      else{
      
        echo 'Genap';
      }
      
      ?> </td>
<td class="table" style="font-size:12px;text-align:right;"><?php
      $data =  $_GET['semester'];
      $tahunsekarang= substr("$data",0,-1); //20191
      $tahundepan=$tahunsekarang+1;
      echo "Tahun Ajaran : $tahunsekarang/$tahundepan"
      ?>  
      
      </p>
      </td>
      </tr>
      </table >
 </div>



 </div>     
      

      
      <br>
      <div class="container">
    <div class="floatLeft">  
    <table>
    <tr>
    <?php 
      $nim=$_GET['nim'];
$query=mysqli_query($con,"select nim,namalengkap from users where nim='$nim'");
$cnt=1;
$num1 = mysqli_fetch_array($query);
{
?>
      <td class="table">NIM</td> 
      <td class="table">: <b><?php echo htmlentities($num1['nim']);?></b> </td>
      </tr>
      <tr>
      <td class="table">Nama</td> 
      <td class="table">: <b><?php echo htmlentities($num1['namalengkap']);?></b> </td>
      <?php } ?>
      </tr>
      </table >
      </div>
      
      <div class="floatRight">  
      <table>
    <tr>
      <?php 
      $nim=$_GET['nim'];
$query=mysqli_query($con,"select d.nmdosen from tblkonsultasi t join dosen d on t.iddosen=d.username where t.idusers='$nim' and t.semester='".$_GET['semester']."'");
$cnt=1;
$num1 = mysqli_fetch_array($query);
{
?>
      <td class="table">Pembimbing</td> 
      <td class="table">: <b><?php echo htmlentities($num1['nmdosen']);?></b> </td> 
      </tr>
      <?php } ?>
      <?php 
      $nim=$_GET['nim'];
$query=mysqli_query($con,"select tempatkp,judulkp from users where nim='$nim'");
$cnt=1;
$num1 = mysqli_fetch_array($query);
{
?>
      <tr>
      <td class="table">Lokasi</td>
      <td class="table">: <b><?php echo htmlentities($num1['tempatkp']);?></b> </td>
      </tr>
      </table >
      </div>
      <div class="floatAll">  
      <table>
    <tr>
    <td class="table">Judul &nbsp</td> 
      <td class="table">: <b><?php echo htmlentities($num1['judulkp']);?></b> </td>
      </tr>
      </table >
      </div>
      <?php } ?>
      </div>
      <br>
      <div class="container">
    <div class="floatAll">
            <table >
 
  <tr>

  </tr>
  <?php 
  $year = date('Y');
	$bulan_ini=date('n');
	if($bulan_ini<=6){
		$bulan_ini='2';
	}else{
		$bulan_ini='1';
	}
			$string_gabungan = $year.$bulan_ini;
      $semester=$string_gabungan;
      $nim=$_GET['nim'];
$query=mysqli_query($con,"select * from tblkonsultasi t join users u on t.idusers=u.nim join dosen d on t.iddosen=d.username join matakuliah m on t.idmatakuliah=m.kdmatakuliah where m.tags='kp' and t.idusers='$nim' and t.semester='".$_GET['semester']."' and t.sts_konsul='selesai' order by t.regDate ASC");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

  <tr>
    <td style="width:20%"><p><b><?php 
    
    $tanggal = htmlentities($row['regDate']);
    echo date("d F Y", strtotime($tanggal));
    
    ?></b></p><br>
    Paraf : 
    <br>
    &nbsp
    <br>
    &nbsp
    <br>
    &nbsp</td>
    <td> <?php echo $row['catatankonsultasi'];?></td>
    <td class="tdend" style="font-size:21px;width:5%;"><center><?php echo htmlentities($cnt);?></td>
  </tr>

  <?php $cnt=$cnt+1; } ?>
</table>





<button style="font-size:12px" id="printPageButton" value="Print" class="button badge-info"
               onclick="window.print()" ><i class="fa fa-print"></i> Print</button>
               <button style="font-size:12px" id="printPageButton" value="Print" class="button badge-error"><a style="color: white;" href="javascript:window.open('','_self').close();"><i class="fa fa-close"></i> Close</a></button>
        </div>
        
        </div>
        <div class="container">
        <div class="floatAll">  
      <table class="table" cellspacing="0" cellpadding="0">
      <tr>

      </tr>
      <tr>
      <td class="table">Koordinator Kerja Praktik</td>
      <td class="table"><center>Mahasiswa</td>
      <td class="table" style="text-align:right;">Dosen Pembimbing</td>
      </tr>
      <tr>
      <td class="table">&nbsp <br>
      &nbsp <br>
      &nbsp <br>
      &nbsp <br></td>
      <td class="table"></td>
      <td class="table"></td>
      </tr>

     
      <tr>
      <?php 
$query=mysqli_query($con,"select * from master where idmaster='1'");
$num1 = mysqli_fetch_array($query);
{
?>
      <td class="table"><b><?php echo htmlentities($num1['kkp']);?></b></td>
      <?php } ?>
      <?php 
      $nim=$_GET['nim'];
$query=mysqli_query($con,"select namalengkap from users where nim='$nim'");
$cnt=1;
$num1 = mysqli_fetch_array($query);
{
?>
      <td class="table"><center><b><?php echo htmlentities($num1['namalengkap']);?></b></td>
      <?php } ?>
      <?php 
      $nim=$_GET['nim'];

$query=mysqli_query($con,"select d.nmdosen from tblkonsultasi t join dosen d on t.iddosen=d.username where t.idusers='$nim' and t.semester='".$_GET['semester']."'");
$cnt=1;
$num1 = mysqli_fetch_array($query);
{
?>
      <td class="table" style="text-align:right;"><b><?php echo htmlentities($num1['nmdosen']);?></b></td>
      <?php } ?>
      </tr>

      </table>
    
    </div>
     </div>
     






    



       <p> &nbsp</p>
<p> &nbsp</p>

		<script type="text/javascript">
		// window.print();
		</script>
	</body>
</html>

<?php } ?>
