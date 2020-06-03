
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
	foreach ($_POST['attendance_status'] as $id => $attendance_status)
    {
		$iddosen=$_POST['iddosen'];
		$klppeterpan=$_POST['klppeterpan'];
        $student_name = $_POST['idusers'][$id];
		$semester=$_POST['semester'];
        $attendance = $con->prepare("INSERT INTO kehadiran (idkelompok,idusers,iddosen,semester,status) VALUES (?, ?, ?, ? ,?)");
        $attendance->bind_param("iisis",$klppeterpan ,$student_name ,$iddosen ,$semester, $attendance_status);
        $attendance->execute();
    }
     
    if ($con->affected_rows==1) {
        $msg = "Attendance has been added successfully";
	}
	
	
	$iddosen=$_POST['iddosen'];
	$semester=$_POST['semester'];
	$catatankonsultasi=$_POST['catatankonsultasi'];
	$klppeterpan=$_POST['klppeterpan'];


$sql =mysqli_query($con,"INSERT INTO catatankelompok(klppeterpan,iddosen,catatankonsultasi,semester) VALUES ('$klppeterpan','$iddosen','$catatankonsultasi','$semester')");
$_SESSION['msg']="Catatan evaluasi berhasil ditambahkan.";

}
if(isset($_POST['submit2']))
{
	
	$iddosen=$_POST['iddosen'];
	$semester=$_POST['semester'];
	$catatankonsultasi=$_POST['catatankonsultasi'];
	$klppeterpan=$_POST['klppeterpan'];


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
								<h3>Catatan Konsultasi Kelompok <?php echo htmlentities($row['klppeterpan']);?></h3>
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

			<form class="form-horizontal row-fluid" name="catatankelompok" method="post" >
			<?php
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username where k.klppeterpan='$klppeterpan'");
while($row=mysqli_fetch_array($ret))
{
?>	
			<div class="control-group">
<label class="control-label" for="iddosen">Dosen Pembimbing</label>
<div class="controls">

<input type="text"class="span8 tip" style="width:50%;" name="iddosen" value="<?php echo $row['username'];?>" readonly>

</div>
</div>

<div class="control-group">
<label class="control-label" >Kelompok Peterpan</label>
<div class="controls">
<input type="text" style="width:5%;text-align: center" maxlength="2"  id="klppeterpan" name="klppeterpan" class="span8 tip" value="<?php echo  htmlentities($row['klppeterpan']);?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="status">Kehadiran</label>
<div class="controls">
<table style="width:90%;" class="table table-hover table-bordered display">
									<thead>
										<tr>
											<th><center>Mahasiswa</th>
											<th><center>Kehadiran</th>
										</tr>
									</thead>
									<?php 
$subcheck = (isset($_POST['subcheck'])) ? 1 : 0;
$id=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select nim, namalengkap as fullName from users WHERE nim in ( SELECT idusers FROM kelompok where kelompok.klppeterpan='$id' and kelompok.iddosen='".$_SESSION['dlogin']."') order by idusers desc");

$cnt=1;
while($result=mysqli_fetch_array($ret))
{

?>
									<tr>	
											<td ><input type="hidden" for="idusers" name="idusers" value="<?php echo  htmlentities($result['nim']);?>"/><?php echo htmlentities($result['nim']);?> - <?php echo htmlentities($result['fullName']);?></td>
											<td ><a data-toggle="modal" data-target="#myModal" href="formkehadiran.php?idusers=<?php echo $result['nim']?>" ><i class="icon-edit"></i></a><label for="present0"><input type="checkbox" id="present0" name="attendance_status[]<?php $cnt=$cnt+1; ?>" value="Present"> </label>
					
                </td>

											
										</tr>
										
										<?php
										 $cnt=$cnt+1; }?>
</table>
</div>
</div>

<div class="control-group">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Contact Us</button>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content-->
<div class="control-group">
<div class="controls">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4 class="modal-title">Contact Us</h4>
</div>
<div class="modal-body">

        <form role="form" method="post2" id="reused_form">
        <p>
            Send your message in the form below and we will get back to you as early as possible.
        </p>

        <div class="form-group">
            <label for="name">
                Name:</label>
            <input type="text" class="form-control"
            id="name" name="name"   required maxlength="50">

        </div>
        <div class="form-group">
            <label for="email">
                Email:</label>
            <input type="email" class="form-control"
            id="email" name="email" required maxlength="50">
        </div>
        <div class="form-group">
            <label for="name">
                Message:</label>
            <textarea class="form-control" type="textarea" name="message"
            id="message" placeholder="Your Message Here"
            maxlength="6000" rows="6"></textarea>
        </div>
        <button type="submit2" class="btn btn-lg btn-success btn-block" id="btnContactUs">Post It! →</button>

    </form>
    <div id="success_message" style="width:100%; height:100%; display:none; ">
        <h3>Sent your message successfully!</h3>
    </div>
    <div id="error_message"
    style="width:100%; height:100%; display:none; ">
        <h3>Error</h3>
        Sorry there was an error sending your form.

    </div>
</div>

</div>

 </div>
</div>
<div class="control-group">
<input type="hidden" for="semester" name="semester" value="<?php echo  htmlentities($row['semester']);?>" />
<?php } ?>

<div class="control-group">
<label class="control-label" >Catatan Konsultasi</label>
<div class="controls">
<textarea type="richtext" style="width:90%;"  rows="5" id="catatankonsultasi" name="catatankonsultasi" class="span8 tip" value="<?php echo  htmlentities($row['klppeterpan']);?>" ></textarea>
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit" name="submit" class="btn btn-primary">Beri Catatan</button>
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
	<script>
$(function()
{
    function after_form_submitted(data)
    {
        if(data.result == 'success')
        {
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        }
        else
        {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors,function(key,val)
            {
                $('#error_message ul').append('<li>'+key+':'+val+'</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();

            //reverse the response on the button
            $('button[type="button"]', $form).each(function()
            {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if(label)
                {
                    $btn.prop('type','submit' );
                    $btn.text(label);
                    $btn.prop('orig_label','');
                }
            });

        }//else
    }

	$('#reused_form').submit(function(e)
      {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function()
        {
            $btn = $(this);
            $btn.prop('type','button' );
            $btn.prop('orig_label',$btn.text());
            $btn.text('Sending ...');
        });


                    $.ajax({
                type: "POST",
                url: 'handler.php',
                data: $form.serialize(),
                success: after_form_submitted,
                dataType: 'json'
            });

      });
});
</script>
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