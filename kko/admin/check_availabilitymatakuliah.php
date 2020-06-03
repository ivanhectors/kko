<?php 
require_once("include/config.php");
if(!empty($_POST["kdmatakuliah"])) {
	$kdmatakuliah= $_POST["kdmatakuliah"];
	
		$result =mysqli_query($con,"SELECT kdmatakuliah FROM matakuliah WHERE kdmatakuliah='$kdmatakuliah'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Mata Kuliah Sudah Terdaftar</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Mata Kuliah Baru Tersedia .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
