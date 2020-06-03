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

	$catatankonsultasi=$_POST['catatankonsultasi'];
	$postingDate=$_POST['postingDate'];

$sql=mysqli_query($con,"UPDATE catatankelompok SET catatankonsultasi='$catatankonsultasi',postingDate='$postingDate' WHERE idcatatankelompok='".$_GET['idcatatankelompok']."'");
$_SESSION['msg']="Record Data ini berhasil diubah.";
echo "<script type='text/javascript'>settimeout('self.close()',5000);</script>";
}

?>


</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php

$status='NULL';                   
$rt = mysqli_query($con,"SELECT * FROM tblkonsultasi where sts_konsul is NULL and iddosen='".$_SESSION['dlogin']."' ");
$num1 = mysqli_num_rows($rt);
{?><?php 
	$num= htmlentities($num1);
if($rt >="0"){

	echo "(".$num.")";
  }
  else{
  
  
  ?><?php } ?> KKO Sistem Informasi</title>
<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script language="javascript" type="text/javascript">
var popUpWin1=0;
function popUpWindow1(URLStr, left, top, width, height)
{
 if(popUpWin1)
{
if(!popUpWin1.closed) popUpWin1.close();
}
popUpWin1 = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=0,copyhistory=yes,width='+380+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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

$ret1=mysqli_query($con,"select * from catatankelompok where idcatatankelompok='".$_GET['idcatatankelompok']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
<form class="form-horizontal row-fluid" name="catatankelompok" method="post">




<div class="control-group">
<label class="control-label" for="klppeterpan">Kelompok</label>
<div class="controls">
<input type="text" class="span8 tip" style="width:12%;text-align: center" placeholder="<?php echo $row['klppeterpan'];?>" name="klppeterpan" title="Kamu tidak dapat mengubah nim ini."readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" >Catatan Konsultasi</label>
<div class="controls">
<textarea type="richtext" style="width:90%;"  rows="5" placeholder="<?php echo $row['catatankonsultasi'];?>" id="catatankonsultasi" name="catatankonsultasi" class="span8 tip" ><?php echo $row['catatankonsultasi'];?></textarea>
</div>
</div>


<div class="control-group">
<label class="control-label" >Tanggal Konsultasi</label>
<div class="controls">
<div class="input-prepend">
  <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
  <input name="postingDate" data-date="" style="width:71%;" value="<?php echo strftime('%Y-%m-%d',strtotime($row['postingDate'])); ?>" class="span8 tip" data-date-format="DD MMMM YYYY" id="postingDate" type="date" readonly>
  <span class="validity"></span>
</div>
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit4" name="submit4" onClick="return confirm('Yakin ingin mengubah data mahasiswa ini ?')" class="btn btn-primary"><i class="fa fa-edit"> </i> Ubah Catatan</button>
                                                
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
     <?php } ?>