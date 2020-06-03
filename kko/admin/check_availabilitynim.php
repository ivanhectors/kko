<?php 
require_once("include/config.php");
if(!empty($_POST["nim"])) {
	$nim= $_POST["nim"];
	
		$result =mysqli_query($con,"SELECT nim FROM users WHERE nim='$nim'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> NIM Sudah Terdaftar.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> NIM Tersedia.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
