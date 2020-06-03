<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!empty($_POST["kdmatakuliah"])) 
{
 $id=$_POST['kdmatakuliah'];
 if(!is_string($id)){
 
 	echo htmlentities("invalid industryid");exit;
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
 $stmt = mysqli_query($con,"SELECT k.iddosen,d.nmdosen FROM krs k join dosen d on k.iddosen=d.username WHERE k.idmatakuliah ='$id' and k.idusers='".$_SESSION['login']."' and semester='$semester'");
 ?><option disabled selected hidden value="">Pilih Dosen Pembimbing</option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['iddosen']); ?>"><?php echo htmlentities($row['nmdosen']); ?></option>
  <?php
 }
}

}
?>