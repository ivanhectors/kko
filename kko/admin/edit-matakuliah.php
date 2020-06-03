
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
	$kdmatakuliah=$_POST['kdmatakuliah'];
	$matakuliah=$_POST['matakuliah'];
	$deskripsi=$_POST['deskripsi'];
	$status=$_POST['status'];
	$idmatakuliah=intval($_GET['idmatakuliah']);
$sql=mysqli_query($con,"update matakuliah set kdmatakuliah='$kdmatakuliah', matakuliah='$matakuliah',deskripsi='$deskripsi',statusmakul='$status' where idmatakuliah='$idmatakuliah'");
$_SESSION['msg']="Mata Kuliah berhasil diubah.";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Edit Mata Kuliah</title>
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
								<h3>Edit Mata Kuliah Mandiri</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="matakuliah" method="post" >
<?php
$idmatakuliah=intval($_GET['idmatakuliah']);
$query=mysqli_query($con,"select * from matakuliah where idmatakuliah='$idmatakuliah'");
while($row=mysqli_fetch_array($query))
{
?>	

<div class="control-group">
<label class="control-label" for="basicinput">Kode Matakuliah</label>
<div class="controls">
<input type="text" placeholder="Masukkan Kode Matakuliah"  onBlur="userAvailability()" maxlength="6" id="kdmatakuliah" name="kdmatakuliah" style="width:10%;" value="<?php echo  htmlentities($row['kdmatakuliah']);?>" class="span8 tip" required>
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Nama Matakuliah</label>
<div class="controls">
<input type="text" placeholder="Masukkan Nama Mata Kuliah"  name="matakuliah" value="<?php echo  htmlentities($row['matakuliah']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="status">Status Matakuliah</label>
<div class="controls">
<select name="status" class="selectpicker" class="span8 tip" style="width:47%" data-live-search="true" >
<option value="<?php echo  htmlentities($row['status']);?>"><?php $data =  $row['status'];
												  if($data =="1"){
											
													echo  "Aktif";
												  } 
												  else{ 
												  
													echo "Tidak Aktif";
												  }?></option> 
<option value="1">Aktif pada dashboard mahasiswa</option>
<option value="0">Tidak aktif pada dashboard mahasiswa</option>
</select>
</div>
</div>

<div class="control-group">
											<label class="control-label" for="basicinput">Deskripsi</label>
											<div class="controls">
												<textarea class="span8" name="deskripsi" rows="5"><?php echo  htmlentities($row['deskripsi']);?></textarea>
											</div>
										</div>
									<?php } ?>	

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
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