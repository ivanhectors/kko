<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($con,"SELECT dosen FROM dosen WHERE iddosenmk1, iddosenmk2, iddosenmk3='$id'");
 ?><option selected="selected">Pilih Dosen Pembimbing II </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['dosen']); ?>"><?php echo htmlentities($row['dosen']); ?></option>
  <?php
 }
}

}
?>