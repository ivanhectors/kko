
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
    $index = 0;
    $klppeterpan=$_POST['klppeterpan'];
    $idusers=$_POST['idusers'];
    $iddosen=$_POST['iddosen'];
    $string_gabungan = $year.$bulan_ini;
	$semester=$string_gabungan;

$sql=mysqli_query($con,"insert into kelompok(klppeterpan,idusers,iddosen,semester) values('$klppeterpan','$idusers','$iddosen','$semester')");
$_SESSION['msg']="Kelompok Mahasiswa Tersebut berhasil di tambahkan.";


}

		 
if(isset($_GET['id']) && $_GET['action']=='del')
{
$idadmin=$_GET['id'];
$query=mysqli_query($con,"delete from kelompok where idkelompok='$idadmin'");
$_SESSION['delmsg']="Record Mahasiswa tersebut telah dihapus.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Tambah Kelompok Peterpan</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
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
  <li>Tambah Kelompok Peterpan</li>

</ul>
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tambah Kelompok Peterpan Mahasiswa</h3>
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

			<form class="form-horizontal row-fluid" name="kelompok" method="post" >

<div class="control-group">
<label class="control-label" for="iddosen">Pilih Dosen Pembimbing</label>
<div class="controls">
<select name="iddosen" class="selectpicker" data-size="5" data-live-search="true" class="span8 tip" required>
<option value="">Pilih Dosen Pembimbing</option> 
<?php 
$query=mysqli_query($con,"select * from dosen");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['username'];?>"> <?php echo $row['nmdosen'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="idusers">Mahasiswa</label>
<div class="controls">
<select name="idusers" class="selectpicker" data-size="5" data-live-search="true" class="span8 tip" required>
<option value="">Pilih Mahasiswa</option> 
<?php 
$year = date('Y');
$bulan_ini=date('n');
if($bulan_ini<=6){
    $bulan_ini='2';
}else{
    $bulan_ini='1';
}
$string_gabungan = $year.$bulan_ini;
$semester=$string_gabungan;
$query=mysqli_query($con,"select * from users u WHERE NOT EXISTS ( SELECT * FROM kelompok k WHERE u.nim = k.idusers and k.semester = $string_gabungan ) ");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['nim'];?>"><?php echo $row['nim'];?> - <?php echo $row['namalengkap'];?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="klppeterpan">Kelompok Peterpan</label>
<div class="controls">
<input type="text" style="width:5%;" maxlength="2"  id="klppeterpan" name="klppeterpan" class="span8 tip" required>
</div>
</div>




	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit" name="submit" class="btn btn-primary">Buat Kelompok</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module">
							<div class="module-head">
								<h3>Data Kelompok Peterpan Mahasiswa </h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Dosen Pembimbing</th>
											<th>Nama</th>
											<th>Kelompok</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username");
$cnt=1;
while($row=mysqli_fetch_array($query)) 
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['nmdosen']);?></td>
											<td><?php echo htmlentities($row['namalengkap']);?></td>
											<td> <?php echo htmlentities($row['klppeterpan']);?></td>
											<td>
											<a href="ubahkelompok.php?idkelompok=<?php echo $row['idkelompok']?>" ><i class="icon-edit"></i></a>
											<a href="tambahkelompokmahasiswa.php?id=<?php echo $row['idkelompok']?>&&action=del" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
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