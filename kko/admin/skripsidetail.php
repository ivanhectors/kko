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

?>


</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin | Detail Skripsi</title>
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

<div >
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<br>
<br>
<?php 

$ret1=mysqli_query($con,"select * FROM users where nim='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
  

      <td colspan="2">Profil  <b>: <?php echo $row['namalengkap'];?></b></td>
      <br>
    </tr>
    <tr height="50">
      <td ><b>NIM </b></td>
      <td colspan="2">: <?php echo htmlentities($row['nim']); ?></td>
    </tr>
    <tr>
    <tr height="50">
      <td><b>Email </b></td>
      <td>: <?php echo htmlentities($row['email']); ?></td>
    </tr>
    
    <tr>


    </tr>
    <tr height="50">
      <td><b>Reg Date</b></td>
      <td>: <?php echo htmlentities($row['regDate']); ?></td>
    </tr>



      <tr height="50">
      <td><b>No. Telpon </b></td>
      <td>: <?php echo htmlentities($row['telpon']); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Alamat </b></td>
      <td>: <?php echo htmlentities($row['alamat']); ?></td>
    </tr>



        <tr height="50">
      <td><b>Kewarganegaraan  </b></td>
      <td>: <?php echo htmlentities($row['nmwarga']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Kode Pos </b></td>
      <td>: <?php echo htmlentities($row['kodepos']); ?></td>
    </tr>  


    <tr height="50"> 
    <td><b>Tanggal Dibuat </b></td>
    <td >: <?php 
    
    $tanggal = htmlentities($row['regDate']);
    echo date("d F Y", strtotime($tanggal));
    
    ?></td>
    </tr>

        <tr height="50">
      <td><b>Update Terakhir  </b></td>
      <td>: 
      <?php 
    
    $tanggal = htmlentities($row['updationDate']);
    echo date("d F Y", strtotime($tanggal));
    
    ?></td>
    </tr>
     <tr height="50">
      <td><b>Status  </b></td>
      <td>: <?php if($row['status']==1)
      { echo "Active";
} else{
  echo "Block";
}
        ?></td>

    </tr>
<tr>
<td colspan='2'><hr></td>
</tr>
<?php 

$ret1=mysqli_query($con,"select * from krs k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username join matakuliah m on k.idmatakuliah=m.kdmatakuliah where m.tags='skripsi'and k.idusers='".$_GET['uid']."' and k.pembimbing='1'");
while($row=mysqli_fetch_array($ret1))
{
?>
    <tr height="50">
      <td><b>Matakuliah </b></td>
      <td>: <b>[<?php echo htmlentities($row['kdmatakuliah']); ?>]</b> <?php echo htmlentities($row['matakuliah']); ?></td>
      
    </tr>
<tr height="50">
      <td><b>Pembimbing I </b></td>
      <td>: <?php echo htmlentities($row['nmdosen']); ?></td>
      
    </tr>
    <?php } ?>
    
    <?php 

$ret1=mysqli_query($con,"select * from krs k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username join matakuliah m on k.idmatakuliah=m.kdmatakuliah where m.tags='skripsi'and k.idusers='".$_GET['uid']."' and k.pembimbing='2'");
while($row=mysqli_fetch_array($ret1))
{
?>
    <tr height="50">
      <td><b>Pembimbing II </b></td>
      <td>: <?php echo htmlentities($row['nmdosen']); ?></td>
      
    </tr>
    <?php } ?>
    <?php 

$ret1=mysqli_query($con,"select * FROM users where nim='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>
    <tr height="50">
      <td><b>Judul </b></td>
      <td>: <?php echo htmlentities($row['judulskripsi']); ?></td>
      
    </tr>
    <?php } ?>
    <?php 

$ret1=mysqli_query($con,"select distinct semester from krs k join matakuliah m on k.idmatakuliah=m.kdmatakuliah where m.tags='skripsi'and k.idusers='".$_GET['uid']."' and k.pembimbing='2'");
while($row=mysqli_fetch_array($ret1))
{
?>
    <tr height="50">
      <td><b>Semester </b></td>
      <td>: <?php echo htmlentities($row['semester']); ?></td>
      
    </tr>
    <?php } ?>
    <tr>
<td colspan='2'><hr></td>
</tr>
    <tr>
  
      <td > 
      <button name="Submit2" class="btn btn-info btn-xs" type="submit"  value="Print Data" onClick="return f3();" style="cursor: pointer;" ><i class="fa fa-print"></i> Print</button>
      </td>
      
      <td > 
      <button name="Submit3" type="submit" class="btn btn-danger btn-xs" value="Close this window " onClick="return f2();" style="cursor: pointer;"  ><i class="fa fa-close"></i> Close this window</button>
      </td>

    </tr>

   
    <?php } 

 
    ?>
 
</table>
 </form>

 
</div>

</body>
</html>

     <?php } ?>