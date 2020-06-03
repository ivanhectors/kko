
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
	$year = date('Y');
	$bulan_ini=date('n');
	if($bulan_ini<=6){
		$bulan_ini='2';
	}else{
		$bulan_ini='1';
	}
	
	$iddosen=$_POST['iddosen'];
	$string_gabungan = $year.$bulan_ini;
	$semester=$string_gabungan;
	$klppeterpan=$_POST['klppeterpan'];
	$idusers = $_POST['idusers'];
	$status = $_POST['status'];


$sql =mysqli_query($con,"INSERT INTO kehadiran (idkelompok,idusers,iddosen,semester,status) VALUES ('$klppeterpan','$idusers','$iddosen','$semester','$status')");


$_SESSION['msg2']="Status kehadiran mahasiswa berhasil ditambahkan.";

}
elseif(isset($_POST['mybutton']))
{
	$year = date('Y');
	$bulan_ini=date('n');
	if($bulan_ini<=6){
		$bulan_ini='2';
	}else{
		$bulan_ini='1';
	}
	
	$iddosen=$_POST['iddosenn'];
	$string_gabungan = $year.$bulan_ini;
	$semester=$string_gabungan;
	$catatankonsultasi=$_POST['catatankonsultasi'];
	$klppeterpan=$_POST['klppeterpann'];




$sql =mysqli_query($con,"INSERT INTO catatankelompok(klppeterpan,iddosen,catatankonsultasi,semester) VALUES ('$klppeterpan','$iddosen','$catatankonsultasi','$semester')");
$_SESSION['msg']="Catatan evaluasi berhasil ditambahkan.";


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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
	
	<style>
    .bs-example{
        margin: 20px;        
    }
</style>
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
  <li><a href="evaluasiproyek.php">Kelompok Peterpan</a></li>
  <li>Catatan Evaluasi</li>
</ul>
					<div class="content">

						<div class="module">
							<div class="module-head">
							<?php
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select DISTINCT klppeterpan from kelompok where klppeterpan='$klppeterpan' and iddosen='".$_SESSION['dlogin']."'");
while($row=mysqli_fetch_array($ret))
{
?>	
								<h3>Kehadiran Konsultasi Kelompok <?php echo htmlentities($row['klppeterpan']);?></h3>
								<?php } ?>
							
							
									<br />

			<form class="form-horizontal row-fluid" name="absensi" method="post" >
			<?php
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username where k.klppeterpan='$klppeterpan'");
while($row=mysqli_fetch_array($ret))
{
?>	
			<div class="control-group">
<label class="control-label">Dosen Pembimbing</label>
<div class="controls">

<input type="text"class="span8 tip" name="iddosenn" style="width:50%;" value="<?php echo $row['username'];?>" readonly>

</div>
</div>

<div class="control-group">
<label class="control-label" >Kelompok Peterpan</label>
<div class="controls">
<input type="text" style="width:5%;text-align: center" maxlength="2"  name="klppeterpann" id="klppeterpan" class="span8 tip" value="<?php echo  htmlentities($row['klppeterpan']);?>" readonly>
</div>
</div>


<div class="control-group">
<label class="control-label" for="status">Kehadiran</label>
<div class="controls">
<table style="width:90%;" class="table table-hover table-bordered display">
									<thead>
										<tr>
											
										</tr>
									</thead>
									<?php 


$id=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select nim, namalengkap as fullName from users WHERE nim in ( SELECT idusers FROM kelompok where kelompok.klppeterpan='$id' and kelompok.iddosen='".$_SESSION['dlogin']."') ");


$cnt=1;
while($result=mysqli_fetch_array($ret))
{

?>
									<tr>	
											<td ><input type="hidden" for="idusers" value="<?php echo  htmlentities($result['nim']);?>"/><?php echo htmlentities($result['nim']);?> - <?php echo htmlentities($result['fullName']);?></td>
											
											<td>

											
											<a href="#" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo  htmlentities($result['nim']);?>">Open Modal</a></td>
<div class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel" id="myModal<?php echo  htmlentities($result['nim']);?>" role="dialog" aria-hidden="true">
				<!-- Modal -->
<div class="modal-dialog modal-lg" >
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h3 id="myModalLabel">Status Kehadiran Mahasiswa</h3>
          <h4 class="modal-title"> </h4>
        </div>
        <div class="modal-body">

		  <form>
<label for="iddosen"></label>
<input type="hidden" class="form-control" style="width:50%;" name="iddosen" value="<?php echo $row['username'];?>" readonly>
	


<input type="hidden" style="width:5%;text-align: center" maxlength="2"  id="klppeterpan" name="klppeterpan" class="span8 tip" value="<?php echo  htmlentities($row['klppeterpan']);?>" readonly>

<div class="form-group">
  <label class="control-label" >Nama Mahasiswa :</label>
  <div class="controls">
  <input type="text" class="form-control" name="idusers" value="<?php echo  htmlentities($result['nim']);?>" readonly>
</div>
</div>

<br>
<div class="control-group">
<label class="control-label" for="status">Kehadiran</label>
<div class="controls">
<select name="status" class="selectpicker" data-live-search="true" required>
<option value="">Status Kehadiran</option> 
<option name="status" value="1"> Hadir</option>
<option name="status" value="0"> Tidak Hadir</option>
</select>
</div>
</div>


        </div>
		</form>
        <div class="modal-footer">
          <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
  
</div>

											
											
                

											
										</tr>
										
										<?php
										$cnt=$cnt+1;  }?>
</table>
</div>
</div>

</form>
<?php } ?>


	
</div><!--/.content-->
				</div><!--/.span9-->
			</div>





<!-- Batas form kehadiran -->

<div class="module">
							<div class="module-head">
							<?php
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select DISTINCT klppeterpan from kelompok where klppeterpan='$klppeterpan' and iddosen='".$_SESSION['dlogin']."'");
while($row=mysqli_fetch_array($ret))
{
?>	
								<h3>Catatan Konsultasi Kelompok <?php echo htmlentities($row['klppeterpan']);?></h3>
								<?php } ?>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['mybutton']))
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

			<form class="form-horizontal row-fluid" name="absensi" method="post" >
			<?php
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username where k.klppeterpan='$klppeterpan' and k.iddosen='".$_SESSION['dlogin']."'");
while($row=mysqli_fetch_array($ret))
{
?>	

<input type="hidden" class="span8 tip" name="iddosenn" style="width:50%;" value="<?php echo $row['username'];?>" readonly>
<input type="hidden" style="width:5%;text-align: center" maxlength="2"  name="klppeterpann" id="klppeterpan" class="span8 tip" value="<?php echo  htmlentities($row['klppeterpan']);?>" readonly>


<?php } ?>

<div class="control-group">
<label class="control-label" >Catatan Konsultasi</label>
<div class="controls">
<textarea type="richtext" style="width:90%;"  rows="5" id="catatankonsultasi" name="catatankonsultasi" class="span8 tip" value="<?php echo  htmlentities($row['klppeterpan']);?>" required></textarea>
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" id="mybutton" name="mybutton" value="publish" alt="Publish" class="btn btn-primary">Beri Catatan</button>
											</div>
										</div>
									</form>
							</div>
						</div>






	<div class="module">
							<div class="module-head">
								<h3>Riwayat Catatan Kelompok</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Dosen Pembimbing</th>
											<th>Catatan</th>

											<th><center>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select kelompok.id as id, kelompok.catatankonsultasi as catatan, kelompok.dosen as dosen,kelompok.nim as nim,kelompok.klppeterpan as kelompok from kelompok where kelompok.dosen='".$_SESSION['dlogin']."' and kelompok.klppeterpan='$id'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['dosen']);?></td>
											<td><?php echo htmlentities($row['catatan']);?> Sudah Oke.</td>
											
											<td ><center>
											<button class="btn btn-info" href="catatanevaluasi.php?id=<?php echo $row['kelompok']?>" ><i class="icon-edit"></i> Edit</button> <button class="btn btn-danger" href="peterpan.php?id=<?php echo $row['kelompok']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign" color="red"></i> Hapus</button></td>
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
	$('input [id="present]').click(function(){
if($('input [name="present"]').is(':checked')){
    $('input [name="absent"]').attr('disabled' , true)
}

});
	</script>
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