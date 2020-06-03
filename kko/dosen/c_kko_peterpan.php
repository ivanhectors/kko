
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
	$semester=$_POST['semester'];
	$klppeterpan=$_POST['klppeterpan'];

$sql=mysqli_query($con,"select * from kelompok where semester='$semester' and klppeterpan='$klppeterpan' and iddosen='".$_SESSION['dlogin']."'");
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
.button2 {
	background-color:#008CBA; /* Green */
  border: none;
  color: white;
  padding: 3px 6px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 5px;
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  
}
.a {
	color: white;

}
.a:hover {
	color: white;

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
  <li>Kelompok Peterpan</li>
</ul>


<div class="module">

	<div class="module">
							<div class="module-head">
								<h3>Data Kelompok Peterpan Mahasiswa</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											
											<th><center>Kelompok</th>
											<th><center>Pembimbing</th>
											<th><center>Semester</th>
											<th><center>Cetak Konsultasi</th>
										</tr>
									</thead>
									<tbody>

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
$query=mysqli_query($con,"SELECT DISTINCT klppeterpan,semester,d.nmdosen FROM peterpan.kelompok join dosen d on kelompok.iddosen=d.username WHERE kelompok.iddosen='".$_SESSION['dlogin']."' order by semester asc");
$cnt=1;

while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											
											<td>Kelompok <?php echo htmlentities($row['klppeterpan']);?></td>
											<td><?php echo htmlentities($row['nmdosen']);?></td>
											<td><center> Tahun 
											<?php
	  $data =  $row['semester'];
	  $tahunsekarang= substr("$data",0,-1);
      $sms= substr("$data",-1); //20191
      if($sms =="1"){

        echo  "$tahunsekarang (Gasal)";
      }
      else{
      
        echo "$tahunsekarang (Genap)";
      }
      
      ?>     
      
    
 
											
											
			
										</td>
											
											
											
											
											<td><center>
											<button class="button2"> <a class="a" href="peterpan_report.php?klppeterpan=<?php echo htmlentities($row['klppeterpan']);?>&semester=<?php echo htmlentities($row['semester']);?>" target="_blank"><i class="icon-print" title="Cetak Kartu Konsultasi"></i></a></button>
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