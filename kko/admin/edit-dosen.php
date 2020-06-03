
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
	$username=$_POST['username'];
	$nmdosen=$_POST['nmdosen'];
	$iddosen=intval($_GET['iddosen']);
$sql=mysqli_query($con,"update dosen set username='$username', nmdosen='$nmdosen' where iddosen='$iddosen'");
$_SESSION['msg']="Data Dosen Telah berhasil diubah!";

}


?>
<?php
  if(isset($_POST['submit4']))

{
	$iddosen=$_GET['iddosen'];

$sql=mysqli_query($con,"UPDATE dosen SET password=MD5('12345') WHERE iddosen='".$_GET['iddosen']."'");
$_SESSION['msg']="Password Dosen berhasil direset ke defauld '12345'";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Edit Dosen Pembimbing</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
								<h3>Edit Dosen Pembimbing</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
<?php if(isset($_POST['submit4']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
<?php
$iddosen=intval($_GET['iddosen']);
$query=mysqli_query($con,"select * from dosen where iddosen='$iddosen'");
while($row=mysqli_fetch_array($query))
{
?>		

<div class="control-group">
<label class="control-label" for="basicinput">Username</label>
<div class="controls">
<input type="text" placeholder=""  name="username" value="<?php echo  htmlentities($row['username']);?>" class="span8 tip" required>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Nama Dosen Pembimbing</label>
<div class="controls">
<input type="text" placeholder=""  name="nmdosen" value="<?php echo  htmlentities($row['nmdosen']);?>" class="span8 tip" required>
</div>
</div>


									<?php } ?>	

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary">Update</button> <button type="submit4" style="color:black;" name="submit4" class="btn btn-warning" onClick="return confirm('Yakin ingin mereset password dosen ini ?')" >Reset Password</button>
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