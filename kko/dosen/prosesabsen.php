<?php
session_start();
include('include/config.php');

if(isset($_POST['submit']))
{
	$year = date('Y');
	$bulan_ini=date('n');
	if($bulan_ini<=6){
		$bulan_ini='2';
	}else{
		$bulan_ini='1';
	}
	
	$iddosen=$_POST['iddosenn'];
	$string_gabungan = $year.$bulan_ini;
	$semester=$string_gabungan;
	$catatankonsultasi=$_POST['catatankonsultasi'];
	$klppeterpan=$_POST['klppeterpann'];



$sql =mysqli_query($con,"INSERT INTO catatankelompok(klppeterpan,iddosen,catatankonsultasi,semester) VALUES ('$klppeterpan','$iddosen','$catatankonsultasi','$semester')");
$_SESSION['msg']="Catatan evaluasi berhasil ditambahkan.";

$con->close();
?>

<?php




}


?>

