
<?php
session_start();
include('include/config.php');

if(strlen($_SESSION['dlogin'])==0)
	{	
header('location:index.php');
}
else{
    if(isset($_POST["submit"]) && $_POST["submit"]!="") {
        $usersCount = count($_POST["idusers"]);
        for($i=0;$i<$usersCount;$i++) { 
            $sql =mysqli_query($con,"UPDATE kelompok set nilaiakhir='" . $_POST["nilaiakhir"][$i] . "' WHERE idusers='" . $_POST["idusers"][$i] . "'");
    }
    $_SESSION['msg']="Catatan evaluasi berhasil ditambahkan.";


}
    
    
    
    


if(isset($_GET['idkehadiran']) && $_GET['action']=='del')
{
$idkehadiran=$_GET['idkehadiran'];

$query=mysqli_query($con,"delete from kehadiran where idkehadiran='$idkehadiran'");

$sec = "1";

header("location:javascript://history.go(-1)");

}

if(isset($_GET['idcatatankelompok']) && $_GET['action']=='del')
{
$idcatatankelompok=$_GET['idcatatankelompok'];

$query=mysqli_query($con,"delete from catatankelompok where idcatatankelompok='$idcatatankelompok'");


header("location:javascript://history.go(-1)");

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
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


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
<div class="input-prepend">
<span class="add-on">@</i></span>
<input type="text" class="span8 tip" name="iddosen" style="width:75%;" value="<?php echo $row['username'];?>" readonly>
</div>
</div>
</div>

<div class="control-group">
<label class="control-label" >Kelompok Peterpan</label>
<div class="controls">
<div class="input-prepend">
<span class="add-on"><i class="fa fa-users" aria-hidden="true"></i></i></span>
<input type="text" class="span8 tip" style="width:20%;text-align: center" maxlength="2"  name="klppeterpan" id="klppeterpan" value="<?php echo  htmlentities($row['klppeterpan']);?>" readonly>
</div>
</div>
</div>


<div class="control-group">
<label class="control-label" for="status">Input Nilai Akhir</label>
<div class="controls">
<table style="width:90%;" class="table table-hover table-bordered display">
									<thead>
										<tr>
											
										</tr>
									</thead>
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
$id=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select nim, namalengkap as fullName from users WHERE nim in ( SELECT idusers FROM kelompok where kelompok.klppeterpan='$id' and kelompok.iddosen='".$_SESSION['dlogin']."' and semester='$semester') ");

// ($con,"select * from kelompok k join user u on k.idusers=u.nim where k.klppeterpan='$id' and k.iddosen='".$_SESSION['dlogin']."' ");
$cnt=1;
while($result=mysqli_fetch_array($ret))
{

?>
									<tr>	
											
											
											<td style="width:70%">
											<?php echo $result["nim"]; ?> - <?php echo $result["fullName"]; ?>
                      <input type="hidden" name="idusers[]" value="<?php echo $result["nim"]; ?>" />
                    </td>
					<td>
                    <div class="input-prepend">
                    <span class="add-on"><i class="fa fa-trophy"></i></span>
                    <input type="text" class="span8 tip" style="width:20%;text-align: center"  maxlength="2"  name="nilaiakhir[]" id="nilaiakhir" oninvalid="this.setCustomValidity('Isi nilai terlebih dahulu')" oninput="setCustomValidity('')" required>
                    </div>
                </td>
	
										</tr>
										
										<?php $cnt=$cnt+1; } ?>
</table>
</div>
</div>



<?php } ?>


	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit" name="submit" value="publish" alt="Publish" class="btn btn-primary">Input/Ubah Nilai</button>
											</div>
										</div>
									</form>
									</div>
						</div>
									
<!-- Batas Riwayat Kehadiran Kelompok -->


            <div class="module">
							<div class="module-head">
								<h3>Nilai Akhir Peterpan Mahasiswa</h3>
							</div>
							<div class="module-body table table-hover">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th style="width:1%"><center>#</th>
                                            <th><center>Mahasiswa</th>
											<th style="width:19%"><center>Terakhir diubah </th>
                                            <th style="width:12%"><center>Nilai Akhir</th>
                                            <th style="width:12%"><center>Huruf</th>

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
$id=intval($_GET['klppeterpan']);
$query=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim where klppeterpan='$id' and iddosen='".$_SESSION['dlogin']."' and semester='$semester' order by creationDate desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['namalengkap']);?></td>
											<td><center>
                      <?php 
                      $tanggal = htmlentities($row['updationDateKelompok']);
                      echo date("d F Y", strtotime($tanggal)); 
                      ?>
                      </td>
                      <td><center>
                      <?php echo htmlentities($row['nilaiakhir']);?>
                    </td>
                    <td><center>
                    <?php

                      
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



?>

                    </td>
                      
											
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
$(document).ready(function(){
	
  var dataTable = $('#attendance_table').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"attendance_action.php",
      method:"POST",
      data:{action:"fetch"}
    }
  });

  $('#attendance_date').datepicker({
    format:'yyyy-mm-dd',
    autoclose:true,
    container: '#formModal modal-body'
  });

  function clear_field()
  {
    $('#attendance_form')[0].reset();
    $('#error_attendance_date').text('');
  }

  $('#add_button').click(function(){
    $('#modal_title').text("Add Attendance");
    $('#formModal').modal('show');
    clear_field();
  });

  $('#attendance_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"attendance_action.php",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
        $('#button_action').val('Validate...');
        $('#button_action').attr('disabled', 'disabled');
      },
      success:function(data)
      {
        $('#button_action').attr('disabled', false);
        $('#button_action').val($('#action').val());
        if(data.success)
        {
          $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
          clear_field();
          $('#formModal').modal('hide');
          dataTable.ajax.reload();
        }
        if(data.error)
        {
          if(data.error_attendance_date != '')
          {
            $('#error_attendance_date').text(data.error_attendance_date);
          }
          else
          {
            $('#error_attendance_date').text('');
          }
        }
      }
    })
  });

  $('.input-daterange').datepicker({
    todayBtn:"linked",
    format:"yyyy-mm-dd",
    autoclose:true,
    container: '#formModal modal-body'
  });

  $(document).on('click', '#report_button', function(){
    $('#reportModal').modal('show');
  });

  $('#create_report').click(function(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var error = 0;
    if(from_date == '')
    {
      $('#error_from_date').text('From Date is Required');
      error++;
    }
    else
    {
      $('#error_from_date').text('');
    }

    if(to_date == '')
    {
      $('#error_to_date').text("To Date is Required");
      error++;
    }
    else
    {
      $('#error_to_date').text('');
    }

    if(error == 0)
    {
      $('#from_date').val('');
      $('#to_date').val('');
      $('#formModal').modal('hide');
      window.open("report.php?action=attendance_report&from_date="+from_date+"&to_date="+to_date);
    }

  });

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
