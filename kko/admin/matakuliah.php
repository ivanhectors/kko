
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$kdmatakuliah=$_POST['kdmatakuliah'];
	$matakuliah=$_POST['matakuliah'];
	$deskripsi=$_POST['deskripsi'];
	$status=$_POST['status'];
$sql=mysqli_query($con,"insert into matakuliah(kdmatakuliah,matakuliah,deskripsi,statusmakul) values('$kdmatakuliah','$matakuliah','$deskripsi','$status')");
$_SESSION['msg']="Sukses! Matakuliah mandiri baru berhasil di tambahkan.";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from matakuliah where idmatakuliah = '".$_GET['idmatakuliah']."'");
                  $_SESSION['delmsg']="Matakuliah telah dihapus.";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Mata Kuliah Mandiri</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilitymatakuliah.php",
data:'kdmatakuliah='+$("#kdmatakuliah").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
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
								<h3>Tambah Matakuliah Mandiri Baru</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong></strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong></strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
	

			<div class="control-group">
<label class="control-label" for="basicinput">Kode Matakuliah</label>
<div class="controls">
<input type="text" onBlur="userAvailability()" style="width:10%;" placeholder="Kode..." maxlength="6" id="kdmatakuliah" name="kdmatakuliah" class="span8 tip" required>
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Nama Mata Kuliah</label>
<div class="controls">
<input type="text" placeholder="Masukkan Nama Mata Kuliah"  name="matakuliah" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="status">Status Matakuliah</label>
<div class="controls">
<select name="status" class="selectpicker" class="span8 tip" style="width:47%" data-live-search="true" >
<option value="">Pilih Status</option> 
<option value="1">Aktif pada dashboard mahasiswa</option>
<option value="0">Tidak aktif pada dashboard mahasiswa</option>
</select>
</div>
</div>

<div class="control-group">
											<label class="control-label" for="basicinput">Deskripsi Mata Kuliah</label>
											<div class="controls">
												<textarea class="span8" placeholder="Masukkan Deskripsi Mata Kuliah." name="deskripsi" rows="5"></textarea>
											</div>
										</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit" name="submit" class="btn btn-primary">Tambah</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module">
							<div class="module-head">
								<h3>Matakuliah Mandiri Yang Tersedia</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th><center>#</th>
											<th><center>Kode</th>
											<th><center>Nama Matakuliah</th>
											<th><center>Deskripsi</th>
											<th><center>Status</th>
											<th><center>Diubah</th>
											<th></th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from matakuliah");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><center><?php echo htmlentities($cnt);?></td>
											<td><center><?php echo htmlentities($row['kdmatakuliah']);?></td>
											<td><?php echo htmlentities($row['matakuliah']);?></td>
											<td><?php echo htmlentities($row['deskripsi']);?></td>
											<td title="<?php 
												  $data =  $row['status'];
												  if($data =="1"){
											
													echo  "Matakuliah ini Aktif pada konsultasi mahasiswa";
												  } 
												  else{ 
												  
													echo "Matakuliah ini Tidak Aktif pada konsultasi mahasiswa";
												  }
											
											
											?>"><center>
											<?php 
												  $data =  $row['status'];
												  if($data =="1"){
											
													echo  "Aktif";
												  } 
												  else{ 
												  
													echo "Tidak Aktif";
												  }
											
											
											?></td>
											<td><?php echo htmlentities($row['updationDate']);?></td>
											<td>
											<a title="Edit Matakuliah ?" href="edit-matakuliah.php?idmatakuliah=<?php echo $row['idmatakuliah']?>" ><i class="icon-edit"></i></a>
											<a title="Hapus Matakuliah ?" href="matakuliah.php?idmatakuliah=<?php echo $row['idmatakuliah']?>&del=delete" onClick="return confirm('Yakin ingin menghapus matakuliah ini?')"><i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
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