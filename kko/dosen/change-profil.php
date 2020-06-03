
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


if(isset($_POST['submit']))
{

    $username=$_POST['username'];
    $nmdosen=$_POST['nmdosen'];
    $emaildosen=$_POST['emaildosen'];
    $telpdosen=$_POST['telpdosen'];


$sql=mysqli_query($con,"update dosen set username='$username',nmdosen='$nmdosen',emaildosen='$emaildosen',telpdosen='$telpdosen' where username='".$_SESSION['dlogin']."'");
$_SESSION['msg']="Profil Dosen berhasil di Ubah.";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from warga where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Warga Negara telah di hapus..";
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
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
								<h3>Ubah Profil</h3>
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

									<form class="form-horizontal row-fluid" name="dosen" method="post" >
			<?php

$ret=mysqli_query($con,"select * from dosen where username='".$_SESSION['dlogin']."'");
while($row=mysqli_fetch_array($ret))
{
?>	


<div class="control-group">
<label class="control-label">Username</label>
<div class="controls">
<div class="input-prepend">
<span class="add-on">@</i></span>
<input type="text" class="span8 tip" name="username" style="width:75%;" value="<?php echo $row['username'];?>" readonly>
</div>
</div>
</div>

<div class="control-group">
<label class="control-label">Nama Dosen</label>
<div class="controls">
<div class="input-prepend">
<span class="add-on">Aa</i></span>
<input type="text" class="span8 tip" name="nmdosen" style="width:95%;" value="<?php echo $row['nmdosen'];?>">
</div>
</div>
</div>

<div class="control-group">
<label class="control-label">Email</label>
<div class="controls">
<div class="input-prepend">
<span class="add-on"><i class="fa fa-envelope"></i></span>
<input type="email" class="span8 tip" name="emaildosen" style="width:95%;" value="<?php echo $row['emaildosen'];?>">
</div>
</div>
</div>

<div class="control-group">
<label class="control-label">Phone</label>
<div class="controls">
<div class="input-prepend">
<span class="add-on"><i class="fa fa-phone-square"></i></span>
<input  type="tel" class="span8 tip" name="telpdosen" maxlength="13" style="width:95%;" value="<?php echo $row['telpdosen'];?>">
</div>
</div>
</div>



<?php } ?>

	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit" name="submit" class="btn btn-primary">Ubah Profil</button>
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
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
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