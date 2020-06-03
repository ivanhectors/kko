<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['dlogin'])==0)
  { 
header('location:index.php');
}
else{

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}

<?php
  if(isset($_POST['submit4']))

{
    $idkelompok=$_GET['id'];
	$nilaiakhir=$_POST['nilaiakhir'];


$sql=mysqli_query($con,"UPDATE kelompok SET nilaiakhir='$nilaiakhir' WHERE idkelompok='".$_GET['id']."'");
$_SESSION['msg']="Record Data ini berhasil diubah.";
echo "<script type='text/javascript'>settimeout('self.close()',5000);</script>";
}

?>


</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Ubah Nilai Mahasiswa</title>
<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+400+',height='+500+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>

<div class="module-body" style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></strong>
<br>
<br>
<?php 

$ret1=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username where idkelompok='".$_GET['id']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
<form class="form-horizontal row-fluid" name="kelompok" method="post">




<div class="control-group">
<label class="control-label" for="idusers">Mahasiswa</label>
<div class="controls">
<input type="text" class="span8 tip" style="width:90%" placeholder="<?php echo $row['namalengkap'];?>" name="idusers" title="Kamu tidak dapat mengubah nim ini."readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="iddosen">Dosen Pembimbing</label>
<div class="controls">
<input type="text" class="span8 tip" style="width:90%" placeholder="<?php echo $row['nmdosen'];?>" name="iddosen" title="Kamu tidak dapat mengubah dosen ini."readonly>
</div>
</div>

<div class="input-prepend"> 
<label class="control-label" for="iddosen">Ubah Nilai</label>
                    <span class="add-on"><i class="fa fa-trophy"></i></span>
                    <input type="text" class="span8 tip" style="width:12%;text-align: center" placeholder="<?php echo $row['nilaiakhir'];?>" maxlength="2"  name="nilaiakhir" id="nilaiakhir" oninvalid="this.setCustomValidity('Isi nilai terlebih dahulu')" oninput="setCustomValidity('')" required>
                    </div>




<br>

	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit4" name="submit4" class="btn btn-primary"><i class="fa fa-edit"> </i> Ubah Nilai</button>
                                                
											</div>
                                            <div>
                                            </div>
										</div>
									</form>
							</div>
						</div>

    </tr>
    

   
    <?php } 

 
    ?>
 
</table>
 </form>
</div>

</body>
</html>

	 <?php } ?>