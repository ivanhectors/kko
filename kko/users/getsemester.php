<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!empty($_POST["kdmatakuliah"])) 
{
 $id=$_POST['kdmatakuliah'];
 if(!is_string($id)){
 
 	echo htmlentities("invalid IDMATAKULIAH");exit;
 }
 else{
    $year = date('Y');
	$bulan_ini=date('n');
	if($bulan_ini<=6){
		$bulan_ini='2';
	}else{
		$bulan_ini='1';
	}
			$string_gabungan = $year.$bulan_ini;
			$semester=$string_gabungan;
 $stmt = mysqli_query($con,"SELECT idkrs FROM krs WHERE idmatakuliah ='$id' and idusers='".$_SESSION['login']."' and semester='$semester' ");
 ?><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <input value="<?php echo htmlentities($row['idkrs']); ?>">
  <?php
 }
}

}
?>