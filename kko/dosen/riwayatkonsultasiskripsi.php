
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
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
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
								<h3>Riwayat Konsultasi Skripsi</h3>
							</div>
							<div class="module-body table">


							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th title="No. Konsultasi"><center>No</th>
											<th><center>Nama Mahasiswa</th>
											<th><center>Matakuliah</th>
											<th><center>Reg Date </th>
											<th><center>Status</th>
											<th><center>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$st='selesai';
$tags='skripsi';
$query=mysqli_query($con,"select tblkonsultasi.*,users.namalengkap as name,matakuliah.kdmatakuliah,matakuliah.matakuliah as makul from tblkonsultasi join matakuliah on tblkonsultasi.idmatakuliah=matakuliah.kdmatakuliah join users on users.nim=tblkonsultasi.idusers where tblkonsultasi.sts_konsul='$st' and iddosen='".$_SESSION['dlogin']."' and matakuliah.tags='$tags' order by tblkonsultasi.regDate desc");
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
											<td><center><?php echo htmlentities($row['nokonsultasi']);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td>[<?php echo htmlentities($row['kdmatakuliah']);?>] <?php echo htmlentities($row['makul']);?></td>
											<td><center><?php 
                      $tanggal = htmlentities($row['regDate']);
                      echo date("d F Y", strtotime($tanggal)); 
                      ?></td>
										
											<td><center><?php 
                                    $status=$row['sts_konsul'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      <span title="Belum di beri catatan"><i class="fa fa-times-circle" style="font-size:18px;color:#d41919"></i></span>
                                   <?php }
 if($status=="in process"){ ?>
<button type="button" class="btn btn-warning">Diproses</button>
<?php }
if($status=="selesai") {
?>
<span title="Sudah di beri catatan"><i class="fa fa-check-circle" style="font-size:18px;color:#19d454"></i></span>
<?php } ?></td>
											
											<td><center>   <a href="detailkonsultasi.php?cid=<?php echo htmlentities($row['nokonsultasi']);?>" title="Lihat Detail"><i class="fa fa-info-circle" style="font-size:18px;color:#3283a8"></i></a> 
											</td>
											</tr>

										<?php  } ?>
										</tbody>
								</table>
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