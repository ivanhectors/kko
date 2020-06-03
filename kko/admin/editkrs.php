<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
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
	$iddosen=$_POST['iddosen'];
	$idmatakuliah=$_POST['idmatakuliah'];
	$pembimbing=$_POST['pembimbing'];
	$idkrs=$_GET['idkrs'];

$sql=mysqli_query($con,"UPDATE krs SET iddosen='$iddosen',idmatakuliah='$idmatakuliah',pembimbing='$pembimbing' WHERE idkrs='$idkrs'");
$_SESSION['msg']="Record Data ini berhasil diubah.";
echo "<script type='text/javascript'>settimeout('self.close()',5000);</script>";
}

?>


</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin | Edit KRS Mahasiswa</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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

$ret1=mysqli_query($con,"select * from krs k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username join matakuliah m on k.idmatakuliah=m.kdmatakuliah where idkrs='".$_GET['idkrs']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
<form class="form-horizontal row-fluid" name="krs" method="post">


<input type="hidden" value="<?php echo $row['idkrs'];?>" name="idkrs" >

<div class="control-group">
<label class="control-label" for="idusers">Mahasiswa</label>
<div class="controls">
<input type="text" placeholder="<?php echo $row['namalengkap'];?>" name="idusers" title="Kamu tidak dapat mengubah nim ini."readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="iddosen">Dosen Pembimbing</label>
<div class="controls">
<select name="iddosen" class="selectpicker" data-live-search="true" >
<option value="<?php echo $row['username'];?>"><?php echo $row['nmdosen'];?></option> 
<?php 
$query=mysqli_query($con,"select * from dosen");
while($row=mysqli_fetch_array($query))
{?>

<option name="iddosen" value="<?php echo $row['username'];?>"> <?php echo $row['nmdosen'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="pembimbing">Keterangan Dosen</label>
<div class="controls">
<select name="pembimbing" class="selectpicker" required> 
<option value="<?php echo $row['pembimbing'];?>"><?php echo $row['pembimbing'];?></option> 
<option name="pembimbing" value="1">Dosen Pembimbing I</option>
<option name="pembimbing" value="2">Dosen Pembimbing II</option>
</select><span> <i class="fa fa-question-circle-o" style="font-size:18px" title="Pilih keterangan dosen pembimbing"></i></span>
</div>
</div>


<div class="control-group">
<label class="control-label" for="idmatakuliah">Mata Kuliah</label>
<div class="controls">
<select name="idmatakuliah" class="selectpicker" >
<option value="<?php echo $row['kdmatakuliah'];?>"><?php echo $row['kdmatakuliah'];?></option> 
<?php 
$query=mysqli_query($con,"select * from matakuliah");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['kdmatakuliah'];?>"><?php echo $row['kdmatakuliah'];?> - <?php echo $row['matakuliah'];?></option>
<?php } ?>
</select>
</div>
</div>





	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit4" name="submit4" onClick="return confirm('Yakin ingin mengubah data mahasiswa ini ?')" class="btn btn-primary"><i class="fa fa-edit"> </i> Ubah Data</button>
                                                
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