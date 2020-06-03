
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['id']) && $_GET['action']=='del')
{
$id=$_GET['id'];
$query=mysqli_query($con,"delete from kelompok where idkelompok = '$id'");
header('location:peterpan');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Admin | Data Mahasiswa Peterpan</title>
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
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+400+',height='+500+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
<style>
	.badge {
  padding: 1px 9px 2px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}
.badge:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
}
.badge-error {
  background-color: #dc3545;
}
.badge-error:hover {
  background-color: #953b39;
}
.badge-warning {
  background-color: #f89406;
}
.badge-warning:hover {
  background-color: #c67605;
}
.badge-success {
  background-color: #28a745;
}
.badge-success:hover {
  background-color: #356635;
}
.badge-info {
  background-color: #3a87ad;
}
.badge-info:hover {
  background-color: #2d6987;
}
.badge-inverse {
  background-color: #333333;
}
.badge-inverse:hover {
  background-color: #1a1a1a;
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
					<div class="content">

						<div class="module">
								


	<div class="module">
							<div class="module-head">
								<h3>Data Mahasiswa Peterpan</h3>
							</div>
							<div class="module-body table-hover">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th width="2%">#</th>
											<th><center>Mahasiswa</th>
											<th width="2%"><center>KLP</th>
											<th width="2%"> <center>Nilai</th>
											<th width="2%"><center>Huruf</th>
											<th width="15%"><center>Semester</th>
											<th width="10%"><center>Action</th> 
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username order by k.updationDateKelompok DESC");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									 
										<tr>
											<td><center><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['nim']);?> - <?php echo htmlentities($row['namalengkap']);?></td>
											<td><center><?php echo htmlentities($row['klppeterpan']);?></td>
											<td><center><?php echo htmlentities($row['nilaiakhir']);?></td>
											<td><center><?php

                      
$statusnilai= htmlentities($row['nilaiakhir']);
if($statusnilai>="85"){

  echo  '<label class="badge badge-success" title="Lulus">A</label>';
}
elseif($statusnilai>="80"){

    echo  '<label class="badge badge-success" title="Lulus">A-</label>';
  }
  elseif($statusnilai>="75"){

    echo  '<label class="badge badge-success" title="Lulus">B+</label>';
  }
  elseif($statusnilai>="70"){

    echo  '<label class="badge badge-success" title="Lulus">B</label>';
  }
  elseif($statusnilai>="65"){

    echo  '<label class="badge badge-success" title="Lulus">B-</label>';
  }
  elseif($statusnilai>="60"){

    echo  '<label class="badge badge-warning" title="Lulus">C+</label>';
  }
  elseif($statusnilai>="55"){

    echo  '<label class="badge badge-warning" title="Lulus">C</label>';
  }
  elseif($statusnilai>="45"){

    echo  '<label class="badge badge-error" title="Tidak Lulus">D</label>';
  }
else{

  echo '<label class="badge badge-error" title="Tidak Lulus" >E</label>';
}



?></td>
											<td><center>  
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
      
      ?>     </td>
											<td><center>
											<a href="javascript:void(0);" onClick="popUpWindow('http://localhost//peterpan/kko/admin/edit_record.php?id=<?php echo htmlentities($row['idkelompok']);?>');" title="Edit Data : <?php echo htmlentities($row['namalengkap']);?> ?">
<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i></button>
											</a>
									
											<a href="peterpan.php?id=<?php echo htmlentities($row['idkelompok']);?>&&action=del" title="Delete This Data?" onClick="return confirm('Do you really want to delete ?')">
<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
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