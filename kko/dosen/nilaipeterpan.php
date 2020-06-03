
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['dlogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{

	$dosen=$_POST['dosen'];
	$nim=$_POST['nim'];
	$klppeterpan=$_POST['klppeterpan'];
	$id=intval($_GET['id']);

$sql=mysqli_query($con," kelompok set dosen='$dosen',nim='$nim',klppeterpan='$klppeterpan' where id='$id'");
$_SESSION['msg']="Kelompok Mahasiswa Tersebut berhasil di Ubah.";

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
	<style>
/* Style the list */
ul.breadcrumb {

  list-style: none;

}

/* Display list items side by side */
ul.breadcrumb li {
  display: inline;
  font-size: 14px;
}

/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}

/* Add a color to all links inside the list */
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}

/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
  color: #01447e;

}

	</style>
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
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
			<ul class="breadcrumb">
  <li><a href="change-password.php">Home</a></li>
  <li><a href="nilaiakhirproyek.php">Nilai Akhir Proyek</a></li>
  <li><a href="inputnilaiakhir.php">Input Nilai Akhir</a></li>
  <li>Input Nilai</li>
</ul>
					<div class="content">

						<div class="module">
							<div class="module-head">


								<h3>Input Nilai </h3>

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
			
			<div class="control-group">
<label class="control-label" for="dosen">Dosen Pembimbing</label>
<div class="controls">

<input type="text"class="span8 tip" style="width:50%;" name="dosen" value="yetli" readonly>

</div>
</div>

<div class="control-group">
<label class="control-label" for="dosen">NIM</label>
<div class="controls">

<input type="text"class="span8 tip" style="width:50%;" name="dosen" value="72160057" readonly>

</div>
</div>

<div class="control-group">
<label class="control-label" for="dosen">Nama Mahasiswa</label>
<div class="controls">

<input type="text"class="span8 tip" style="width:50%;" name="dosen" value="Ivan Hector Sinambela" readonly>

</div>
</div>

<div class="control-group">
<label class="control-label" >Kelompok Peterpan</label>
<div class="controls">
<input type="text" style="width:5%;" maxlength="2"  id="klppeterpan" name="klppeterpan" class="span8 tip" value="1" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" >Nilai Akhir</label>
<div class="controls">
<input type="text" style="width:5%;" maxlength="3"  id="klppeterpan" name="klppeterpan" class="span8 tip" value="85" >
</div>
</div>









	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit" name="submit" class="btn btn-primary">Masukkan Nilai</button>
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
// Register onpaste on inputs and textareas in browsers that don't
// natively support it.
(function () {
    var onload = window.onload;

    window.onload = function () {
        if (typeof onload == "function") {
            onload.apply(this, arguments);
        }

        var fields = [];
        var inputs = document.getElementsByTagName("input");
        var textareas = document.getElementsByTagName("textarea");

        for (var i = 0; i < inputs.length; i++) {
            fields.push(inputs[i]);
        }

        for (var i = 0; i < textareas.length; i++) {
            fields.push(textareas[i]);
        }

        for (var i = 0; i < fields.length; i++) {
            var field = fields[i];

            if (typeof field.onpaste != "function" && !!field.getAttribute("onpaste")) {
                field.onpaste = eval("(function () { " + field.getAttribute("onpaste") + " })");
            }

            if (typeof field.onpaste == "function") {
                var oninput = field.oninput;

                field.oninput = function () {
                    if (typeof oninput == "function") {
                        oninput.apply(this, arguments);
                    }

                    if (typeof this.previousValue == "undefined") {
                        this.previousValue = this.value;
                    }

                    var pasted = (Math.abs(this.previousValue.length - this.value.length) > 1 && this.value != "");

                    if (pasted && !this.onpaste.apply(this, arguments)) {
                        this.value = this.previousValue;
                    }

                    this.previousValue = this.value;
                };

                if (field.addEventListener) {
                    field.addEventListener("input", field.oninput, false);
                } else if (field.attachEvent) {
                    field.attachEvent("oninput", field.oninput);
                }
            }
        }
    }
})();
</script>
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