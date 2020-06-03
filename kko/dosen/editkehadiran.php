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

	$statuskehadiran=$_POST['statuskehadiran'];
	$postingDate=$_POST['postingDate'];

$sql=mysqli_query($con,"UPDATE kehadiran SET postingDate='$postingDate',statuskehadiran='$statuskehadiran' WHERE idkehadiran='".$_GET['idkehadiran']."'");
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
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=0,copyhistory=yes,width='+380+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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

$ret1=mysqli_query($con,"select * from kehadiran k join users u on k.idusers=u.nim where idkehadiran='".$_GET['idkehadiran']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
<form class="form-horizontal row-fluid" name="kehadiran" method="post">




<div class="control-group">
<label class="control-label" for="idusers">Mahasiswa</label>
<div class="controls">
<input type="text" class="span8 tip" style="width:80%" placeholder="<?php echo $row['namalengkap'];?>" name="idusers" title="Kamu tidak dapat mengubah nim ini."readonly>
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
<label class="control-label" for="statuskehadiran">Status Kehadiran</label>
<div class="controls">
<select name="statuskehadiran" class="selectpicker" class="span8 tip" style="width:47%" data-live-search="true" >
<option value="<?php echo $row['statuskehadiran'];?>"></option> 
<option value="1">Hadir</option>
<option value="0">Tidak Hadir</option>
</select>
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit4" name="submit4" onClick="return confirm('Yakin ingin mengubah data mahasiswa ini ?')" class="btn btn-primary"><i class="fa fa-edit"> </i> Ubah Kehadiran</button>
                                                
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