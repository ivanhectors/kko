
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['dlogin'])==0)
	{	
header('location:index.php');
}
else{

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['id']) && $_GET['action']=='del')
{
$id=$_GET['id'];
$query=mysqli_query($con,"delete from tblkonsultasi where nokonsultasi ='$id'");
header('location:konsultasibelumselesai');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<style>
    .site-footer {
  position: fixed;
  left: 0;
  bottom: 0;
  padding: 10px 0;
  width: 100%;


}
.badge {
  padding: 4px 9px 2px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.mybutton {
  padding: 2px 6px 2px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #3a87ad;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.mybutton:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
.badge:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
.badge-error {
  background-color: #dc3545;
}
.badge-error:hover {
  background-color: #953b39;
}
.badge-warning {
  background-color: #f89406;
}
.badge-warning:hover {
  background-color: #c67605;
}
.badge-success {
  background-color: #28a745;
}
.badge-success:hover {
  background-color: #356635;
}
.badge-info {
  background-color: #3a87ad;
}
.badge-info:hover {
  background-color: #2d6987;
}
.badge-inverse {
  background-color: #333333;
}
.badge-inverse:hover {
  background-color: #1a1a1a;
}

    </style>
	<STYLE>a {text-decoration: none;} </STYLE>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						


	<div class="module">
							<div class="module-head">
								<h3>Catatan Konsultasi</h3>
							
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	table-hover display" width="100%">
									
									<tbody>

<?php 
$query=mysqli_query($con,"select * from tblkonsultasi t join matakuliah m on t.idmatakuliah=m.kdmatakuliah join users u on t.idusers=u.nim join dosen d on t.iddosen=d.username where nokonsultasi='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{

?>									
										<tr>
											<td><b>No. Konsultasi</b></td>
											<td><?php echo htmlentities($row['nokonsultasi']);?></td>
											<td><b>Nama Mahasiswa</b></td>
											<td> <?php echo htmlentities($row['namalengkap']);?></td>
											<td><b>Tanggal Konsultasi</b></td>
											<td><?php 
                      $tanggal = htmlentities($row['regDate']);
                      echo date("d F Y", strtotime($tanggal)); 
                      ?>
											</td>
										</tr>

<tr>
											<td><b>Mata Kuliah </b></td>
											<td><?php echo htmlentities($row['matakuliah']);?></td>
											<td><b>Dosen Pembimbing </b></td>
											<td> <?php echo htmlentities($row['nmdosen']);?></td>
											<td><b>Terakhir Diubah</b></td>
											<td><?php 
                      $tanggal = htmlentities($row['lastUpdationDate']);
                      echo date("d F Y", strtotime($tanggal)); 
                      ?></td>

											</td>
										</tr>
<tr>
											<td ><b>Konsultasi Mahasiswa</b></td>
											<td colspan="5"> <?php echo htmlentities($row['detailkonsultasi']);?></td>
											
										</tr>


											</tr>
<tr>
											<td><b>File Konsultasi</b></td>
											
											<td > <?php $cfile=$row['filekonsultasi'];
if($cfile=="" || $cfile=="NULL" || $cfile=="d41d8cd98f00b204e9800998ecf8427e.")
{
  echo "<b>-";
}
else{?>
<a href="../users/dokumenkonsultasi/<?php echo htmlentities($row['filekonsultasi']);?>" target="_blank"/><button type="button" class="btn btn-info btn-xs" title="Lihat File"><i class="fa fa-eye"></i> View</button></a>
<?php } ?></td>
<td><b>File Revisi</b></td>
											
											<td colspan="5"> <?php $cfile=$row['filerevisi'];
if($cfile=="" || $cfile=="NULL" || $cfile=="d41d8cd98f00b204e9800998ecf8427e.")
{
  echo "<b>-";
}
else{?>
<a href="../dosen/dokumenrevisi/<?php echo htmlentities($row['filerevisi']);?>" target="_blank"/> <button type="button" class="btn btn-info btn-xs" title="Lihat File"><i class="fa fa-eye"></i> View</button></a>
<?php } ?></td>
</tr>

<tr>
<td><b>Status</b></td>
											
											<td colspan="5"><?php 

$statuskons= htmlentities($row['sts_konsul']);
if($statuskons=="selesai"){

  echo  '<label class="badge badge-success" title="Telah diberi catatan"><i class="fa fa-check"></i> Telah diberi catatan</label>';
}
else {
  echo  '<label class="badge badge-error" title="Belum diberi catatan"><i class="fa fa-close"></i> Belum diberi catatan</label>';
}
              ?></td>
											
										</tr>


<tr>
<td ><b style="color:red;">Catatan Dosen </b></td>
<td colspan="5"><?php

$status='NULL';                   
$rt = mysqli_query($con,"SELECT catatankonsultasi,lastUpdationDate FROM tblkonsultasi where nokonsultasi='".$_GET['cid']."' and catatankonsultasi is NULL ");
$num1 = mysqli_fetch_array($rt);
{?><?php 
	$notifikasi=htmlentities($row['catatankonsultasi']);
	
	$tanggal=htmlentities($row['lastUpdationDate']);
	if($rt >="0"){

		echo $notifikasi;
	  }
	  else{
	  
	  } 
                      ?><?php } ?></td>
</tr>




<tr>
											<td><b>Action</b></td>
											
											<td colspan="4"> 
<a href="ubahkonsultasi.php?cid=<?php echo htmlentities($row['nokonsultasi']);?>" title="Beri/Update Catatan">
											 <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Beri Catatan</button>
											 <a href="detailkonsultasi.php?id=<?php echo htmlentities($row['nokonsultasi']);?>&&action=del" title="Hapus konsultasi ini?" onClick="return confirm('Yakin ingin menghapus konsultasi ini? Data yang telah dihapus tidak dapat dikembalikan lagi.')">
											 <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"> Hapus</button></a></td>
											</a></td>
											<td colspan="4"> 
											<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/peterpan/kko/dosen/userprofile.php?uid=<?php echo htmlentities($row['idusers']);?>');" title="Detail Mahasiswa">
											 <button type="button" class="btn btn-primary btn-xs">Detail Mahasiswa</button></a>
											 
											 </td>
											
										</tr>
										<?php  } ?>
										
								</table>
							</div>
						</div>						
						</div>
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>
<?php } ?>