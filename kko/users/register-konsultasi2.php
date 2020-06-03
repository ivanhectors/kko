<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$matakuliah=$_POST['matakuliah'];
$namakategori=$_POST['namakategori'];
$dosen=$_POST['dosen'];
$dosen2=$_POST['dosen2'];
$noc=$_POST['noc'];
$detailkonsultasi=$_POST['detailkonsultasi'];
$compfile=$_FILES["compfile"]["name"];



move_uploaded_file($_FILES["compfile"]["tmp_name"],"dokumenkonsultasi/".$_FILES["compfile"]["name"]);
$query=mysqli_query($con,"insert into tblkonsultasi(userId,matakuliah,namakategori,dosen,dosen2,noc,detailkonsultasi,filekonsultasi) values('$uid','$matakuliah','$namakategori','$dosen','$dosen2','$noc','$detailkonsultasi','$compfile')");
// code for show complaint number
$sql=mysqli_query($con,"select nokonsultasi from tblkonsultasi  order by nokonsultasi desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['nokonsultasi'];
}
$complainno=$cmpn;
echo '<script> alert("Permintaan Konsultasi anda berhasil dikirimkan. Dosen pembimbing akan segera memberikan catatan konsultasi anda #"+"'.$complainno.'")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Kartu Konsultasi Online | Sistem Informasi</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#dosen").html(data);
    $("#dosen2").html(data);
    
  }
  });
  }
  </script>
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Ajukan Konsultasi</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Konsultasi</label>
<div class="col-sm-4">
<select name="matakuliah" id="matakuliah" class="form-control" onChange="getCat(this.value);" readonly>
  <option value="3" readonly>[SI4426] Skripsi</option>
</select>
 </div>
 
<label class="col-sm-2 col-sm-2 control-label">Dosen Pembimbing I</label>
 <div class="col-sm-4">
<select name="dosen" id="dosen" class="form-control" required="required" readonly>
<option value="">Pilih Dosen Pembimbing I</option>
<?php $sql=mysqli_query($con,"select id,dosen from dosen ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['dosen']);?>"><?php echo htmlentities($rw['dosen']);?></option>
<?php
}
?>
</select>
</div>
 </div>



 <div class="form-group">


<label class="col-sm-2 col-sm-2 control-label">Dosen Pembimbing II</label>
<div class="col-sm-4">
<select name="dosen2" id="dosen2" required="required" class="form-control" readonly>
<option value="">Pilih Dosen Pembimbing II</option>
<?php $sql=mysqli_query($con,"select id,dosen from dosen ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['dosen']);?>"><?php echo htmlentities($rw['dosen']);?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Masukkan Catatan (*jika ada) </label>
<div class="col-sm-6">
<textarea  name="detailkonsultasi" placeholder="Max 200 kata" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">File Pendukung (Jika ada) </label>
<div class="col-sm-6">
<input type="file" name="compfile" class="btn btn-outline-secondary" value="">* Format file yang bisa diupload adalah: jpg, png, docx, xls, xlsx, pptx, odt, zip, txt & pdf.
<br>** Ukuran file maksimal 2MB
</div>
</div>



                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary ">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
