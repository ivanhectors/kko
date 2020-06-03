<?php 
require_once("include/config.php");
if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	
		$result =mysqli_query($con,"SELECT username FROM admin WHERE username='$username'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Username sudah terpakai.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Username Tersedia .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
