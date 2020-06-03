
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

$sql=mysqli_query($con,"insert into kelompok(dosen,nim,klppeterpan) values('$dosen','$nim','$klppeterpan')");
$_SESSION['msg']="Kelompok Mahasiswa Tersebut berhasil di tambahkan.";

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
					<div class="content">

						<div class="module">
							<div class="module-head">



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

			

	<div class="module">
							<div class="module-head">
								<h3>Daftar Mahasiswa Bimbingan Skripsi </h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr style="font-size:12px;">
											<th>#</th>
											<th>NIM</th>
                                            <th>Mahasiswa</th>
                                            <th>Judul Skripsi</th>
											<th>Semester</th>
											<th>Pembimbing</th>
											<th style="width:10%;"><center>Action</th>


										</tr>
									</thead>
									<tbody>

<?php 
$query=mysqli_query($con,"select * from krs k join users u on k.idusers=u.nim join matakuliah m on k.idmatakuliah=m.kdmatakuliah where m.tags='skripsi' and k.iddosen='".$_SESSION['dlogin']."' order by k.semester asc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr style="font-size:11px;">
											<td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['nim']);?></td>
                                            <td><?php echo htmlentities($row['namalengkap']);?></td>
											<td><?php echo htmlentities($row['judulskripsi']);?></td>
											<td><?php echo htmlentities($row['semester']);?></td>
											<td> <center><?php 
											$data =  $row['pembimbing'];
											if($data =="1"){
									  
											  echo  "I";
											}
											else{
											
											  echo "II";
											}
											?></td>
											<td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/peterpan/kko/dosen/userprofile.php?uid=<?php echo htmlentities($row['idusers']);?>');" title="Detail Mahasiswa">
											 <button type="button" class="btn btn-info btn-xs"><i class="fa fa-search"></i></button></a> <a href="skripsi_report.php?semester=<?php echo htmlentities($row['semester']);?>&nim=<?php echo htmlentities($row['nim']);?>" target="_blank"><button type="button" class="btn btn-primary btn-xs" title="Cetak Kartu Konsultasi"> <i class="fa fa-print"></i></i></button></a></td>
                                            

										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
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