
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
$year = date('Y');
$bulan_ini=date('n');
if($bulan_ini<=6){
    $bulan_ini='2';
}else{
    $bulan_ini='1';
}
	$idusers=$_POST['idusers'];
	$iddosen=$_POST['iddosen'];
	$idmatakuliah=$_POST['idmatakuliah'];
	$pembimbing=$_POST['pembimbing'];
	$string_gabungan = $year.$bulan_ini;
	$semester=$string_gabungan;

$sql=mysqli_query($con,"insert into krs(idusers,iddosen,idmatakuliah,pembimbing,semester) values('$idusers','$iddosen','$idmatakuliah','$pembimbing','$semester')");
$_SESSION['msg']="Record baru berhasil di tambahkan.";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from kelompok where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Record Mahasiswa tersebut telah dihapus.";
		  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Registrasi KRS</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
								<h3>Kartu Rencana Studi Mahasiswa</h3>
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

			<form class="form-horizontal row-fluid" name="krs" method="post" >




<div class="control-group">
<label class="control-label" for="idusers">Mahasiswa</label>
<div class="controls">
<select name="idusers" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
<option value="">Pilih Mahasiswa</option> 
<?php 


$query=mysqli_query($con,"select * from users order by nim asc");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['nim'];?>"><?php echo $row['nim'];?> - <?php echo $row['namalengkap'];?></option>
<?php } ?>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="idmatakuliah">Mata Kuliah</label>
<div class="controls">
<select name="idmatakuliah" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
<option value="">Pilih Matakuliah</option> 
<?php 
$query=mysqli_query($con,"select * from matakuliah order by kdmatakuliah");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['kdmatakuliah'];?>"><?php echo $row['kdmatakuliah'];?> - <?php echo $row['matakuliah'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="iddosen">Dosen Pembimbing</label>
<div class="controls">
<select name="iddosen" class="selectpicker" data-live-search="true" required>
<option value="">Pilih Dosen Pembimbing</option> 
<?php 
$query=mysqli_query($con,"select * from dosen order by nmdosen asc");
while($row=mysqli_fetch_array($query))
{?>

<option name="iddosen" value="<?php echo $row['username'];?>"> <?php echo $row['nmdosen'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="pembimbing"></label>
<div class="controls">
<select name="pembimbing" class="selectpicker" required> 
<option value="">Keterangan Dosen</option> 
<option name="pembimbing" value="1">Dosen Pembimbing I</option>
<option name="pembimbing" value="2">Dosen Pembimbing II</option>
</select><span> <i class="fa fa-question-circle-o" style="font-size:18px" title="Pilih keterangan dosen pembimbing"></i></span>
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