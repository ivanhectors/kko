<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$email=$_POST['email'];
$fname=$_POST['namalengkap'];
$contactno=$_POST['telpon'];
$address=$_POST['alamat'];
$nmwarga=$_POST['nmwarga'];
$judulskripsi=$_POST['judulskripsi'];
$judulkp=$_POST['judulkp'];
$tempatkp=$_POST['tempatkp'];
$pincode=$_POST['kodepos'];
$ipk=$_POST['ipk'];
$query=mysqli_query($con,"update users set email='$email', namalengkap='$fname', telpon='$contactno', alamat='$address', nmwarga='$nmwarga', judulskripsi='$judulskripsi', judulkp='$judulkp', tempatkp='$tempatkp', kodepos='$pincode', ipk='$ipk' where nim='".$_SESSION['login']."'");
if($query)
{
$successmsg="Profile Telah diperbaharui!";
}
else
{
$errormsg="Profile gagal diubah!";
}
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

    <title>KKO | User Update Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
    <style>
.site-footer {
  position: fixed;
  left: 0;
  bottom: 0;
  padding: 10px 0;
  width: 100%;


}
</style>
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Profile info</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Sukses!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Aduh!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <?php $query=mysqli_query($con,"select * from users where nim='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;Profil : <?php echo htmlentities($row['namalengkap']);?></h4>
    <h5><b>PROFIL MAHASISWA :</h5>
                      <form class="form-horizontal style-form" method="post" name="profile" >

 
  <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">NIM</label>
<div class="col-sm-4">
<input type="text" name="nim" value="<?php echo htmlentities($row['nim']);?>" class="form-control" readonly>
 </div>
 <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
 <div class="col-sm-4">
 <input type="text" name="namalengkap" required="required" value="<?php echo htmlentities($row['namalengkap']);?>" class="form-control" >
 </div>

<div class="form-group">

 </div>
<label class="col-sm-2 col-sm-2 control-label">Email </label>
 <div class="col-sm-4">
<input type="email" name="email" required="required" value="<?php echo htmlentities($row['email']);?>" class="form-control" >
</div>
 </div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Telp</label>
 <div class="col-sm-4">
<input type="text" name="telpon" required="required" value="<?php echo htmlentities($row['telpon']);?>" class="form-control">
</div>
<label class="col-sm-2 col-sm-2 control-label">Alamat </label>
<div class="col-sm-4">
<textarea  name="alamat" required="required" class="form-control"><?php echo htmlentities($row['alamat']);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Kewarganegaraan</label>
<div class="col-sm-4">
<select name="nmwarga" required="required" class="form-control">
<option value="<?php echo htmlentities($row['nmwarga']);?>"><?php echo htmlentities($row['nmwarga']);?></option>
<?php $sql=mysqli_query($con,"select nmwarga from warga ");
while ($rw=mysqli_fetch_array($sql)) {
  if($rw['nmwarga']==$st)
  {
    continue;
  }
  else
  {
  ?>
  <option value="<?php echo htmlentities($rw['nmwarga']);?>"><?php echo htmlentities($rw['nmwarga']);?></option>
<?php
}}
?>

</select>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
<div class="col-sm-2">
<input type="text" name="regdate" value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
 </div>
</div>


<label class="col-sm-2 col-sm-2 control-label">Kode Pos</label>
<div class="col-sm-2">
<input type="text" name="kodepos" maxlength="6" value="<?php echo htmlentities($row['kodepos']);?>" class="form-control">
</div>
</div>


<h5><b>INFORMASI AKADEMIK MAHASISWA :</b></h5>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Judul Skripsi</label>
<div class="col-sm-4">
<input type="text" name="judulskripsi" maxlength="225" value="<?php echo htmlentities($row['judulskripsi']);?>" class="form-control">
</div>
<label class="col-sm-2 col-sm-2 control-label">Judul Kerja Praktik </label>
<div class="col-sm-4">
<input type="text" name="judulkp" value="<?php echo htmlentities($row['judulkp']);?>" class="form-control" >
 </div>
</div>

<div class="form-group">

<label class="col-sm-2 col-sm-2 control-label">Tempat Kerja Praktik </label>
 <div class="col-sm-4">
<input type="text" name="tempatkp" maxlength="25"  value="<?php echo htmlentities($row['tempatkp']);?>" class="form-control" >
</div>
<label class="col-sm-2 col-sm-2 control-label">IPK </label>
<div class="col-sm-1">
<input type="text" name="ipk"  value="<?php echo htmlentities($row['ipk']);?>" class="form-control" readonly>
 </div>
 </div>

 <div class="form-group">

<label class="col-sm-2 col-sm-2 control-label">Tahun Masuk </label>
 <div class="col-sm-4">
 <?php
      $data =  $row['nim'];
      $tahunmasuk= substr("$data",2,-4); //20191 //72160057
      echo'<input type="text" maxlength="4" value="20'.$tahunmasuk.'" class="form-control" readonly>'
      ?> 
</div>

<label class="col-sm-2 col-sm-2 control-label">Kelompok Peterpan </label>
<div class="col-sm-1">
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
  $cnt=1;
  $query=mysqli_query($con,"select klppeterpan from kelompok where idusers='".$_SESSION['login']."' and semester='$semester'");
while($row=mysqli_fetch_array($query))
{
  ?>
<input type="text" name="klppeterpan" maxlength="2" required="required" value="<?php echo htmlentities($row['klppeterpan']);?>" class="form-control" readonly>
<?php } ?>
 </div>
 </div>






<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">User Photo</label>
<div class="col-sm-4">
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/noimage.png" width="256" height="256" >
<a href="update-image">Change </a>

<?php else:?>
	<img src="userimages/<?php echo htmlentities($userphoto);?>" width="256" height="256">
  <a href="update-image">Change </a>
  
<?php endif;?>
</div>


</div>




<h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>

<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>

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
