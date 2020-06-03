<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['dlogin'])==0)
  { 
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
$nocatatan=$_GET['cid'];
$status=$_POST['status']; 
$catatankonsultasi=$_POST['catatan'];
$compfile=$_FILES["compfile1"]["name"];
  
  // get the image extension
$extension = substr($compfile,strlen($compfile)-4,strlen($compfile));
// allowed extensions
$allowed_extensions = array(".mp4");

// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(in_array($extension,$allowed_extensions))
{
echo "<script>alert('* Format file yang bisa diupload adalah: jpg, png, docx, xls, xlsx, pptx, odt, zip, txt & pdf.');</script>";
}
else
{
$titik=".";
//rename the image file
$imgnewfile=md5($compfile).$titik.$extension;
// Code for move image into directory
move_uploaded_file($_FILES["compfile1"]["tmp_name"],"dokumenrevisi/".$imgnewfile);
$query=mysqli_query($con,"UPDATE tblkonsultasi SET catatankonsultasi='$catatankonsultasi', sts_konsul='$status',filerevisi='$imgnewfile' WHERE nokonsultasi='".$_GET['cid']."'");

echo "<script>alert('Catatan Berhasil di tambahkan.');</script>";

  }
}



 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ubah Konsultasi</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <?php 
$query=mysqli_query($con,"select * from tblkonsultasi t join matakuliah m on t.idmatakuliah=m.kdmatakuliah join users u on t.idusers=u.nim join dosen d on t.iddosen=d.username where nokonsultasi='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{

?>	
    <tr height="50">
      <td><b>No. Konsultasi</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required" readonly>
    <option value="selesai">Beri Catatan</option>
        
      </select></td>
    </tr>


      <tr height="50">
      <td><b>Catatan Dosen</b></td>
      <td><textarea name="catatan" cols="40" rows="10" required="required" value="<?php echo  htmlentities($row['catatankonsultasi']); ?>"><?php echo  htmlentities($row['catatankonsultasi']); ?></textarea></td>
    </tr>

    <tr height="50">
      <td><b>Upload File Revisi</b></td>
      <td><input type="file" name="compfile1" value="" class="btn btn-outline-secondary" class="form-control"><span><?php echo htmlentities($row['filerevisi']);?></span></td>
    </tr>

    
        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

 
</table>
 </form>
</div>
<?php  } ?>
</body>
</html>

     <?php } ?>
