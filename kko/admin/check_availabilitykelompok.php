<?php 
session_start();
require_once("include/config.php");
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(!empty($_POST["klppeterpan"])) {
    $year = date('Y');
$bulan_ini=date('n');
if($bulan_ini<=6){
    $bulan_ini='2';
}else{
    $bulan_ini='1';
}
$string_gabungan = $year.$bulan_ini;
$semester=$string_gabungan;
    $klppeterpan= $_POST["klppeterpan"];
    $iddosen= $_POST["iddosen"];

	
		$result =mysqli_query($con,"SELECT klppeterpan FROM kelompok WHERE klppeterpan='$klppeterpan' and iddosen='$iddosen' and semester='$semester'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Kelompok Sudah Terdaftar.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Kelompok Tersedia.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}

?>
