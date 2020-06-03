<?php session_start();
error_reporting(1);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ 

  
  
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Kartu Konsultasi Online | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <script src="assets/js/chart-master/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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



          <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="height: 520px;">

                <h4 class="mb"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Kartu Konsultasi</h4>
                <form class="form-horizontal style-form" method="post" name="profile" >
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Kerja Praktik</label>
<div class="col-sm-2">
<select name="semester" id="matakuliah" onchange="window.location=this.value" required="required" title="Pilih semester untuk mencetak konsultasi." class="form-control">
<option value="" >Pilih Semester</option>
<?php $sql=mysqli_query($con,"select DISTINCT t.semester from tblkonsultasi t join matakuliah m on t.idmatakuliah=m.kdmatakuliah where m.tags='kp' and idusers='".$_SESSION['login']."' and sts_konsul='selesai' ");
while ($rw=mysqli_fetch_array($sql)) {
  if($rw['semester']==$st)
  {
    continue;
  }
  else
  {
  ?>
  <option value="kp_report.php?semester=<?php echo htmlentities($rw['semester']);?>" target="_blank"><center>
											<?php
	  $data =  $rw['semester'];
	  $tahunsekarang= substr("$data",0,-1);
      $sms= substr("$data",-1); //20191
      if($sms =="1"){

        echo  "$tahunsekarang (Gasal)";
      }
      else{
      
        echo "$tahunsekarang (Genap)";
      }
      
      ?>     </option></a>

<?php
}}
?>
</select>

</div>
</div>
<tr>
<div class="form-group">

 </div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Skripsi</label>
<div class="col-sm-2">
<select name="semester" id="matakuliah" onchange="window.location=this.value" required="required" title="Pilih semester untuk melihat grafik total konsultasi." class="form-control">
<option value="" >Pilih Semester</option>
<?php $sql=mysqli_query($con,"select DISTINCT t.semester from tblkonsultasi t join matakuliah m on t.idmatakuliah=m.kdmatakuliah where m.tags='skripsi' and idusers='".$_SESSION['login']."' and sts_konsul='selesai' ");
while ($rw=mysqli_fetch_array($sql)) {
  if($rw['semester']==$st)
  {
    continue;
  }
  else
  {
  ?>
  <option value="skripsi_report.php?semester=<?php echo htmlentities($rw['semester']);?>"><center>
											<?php
	  $data =  $rw['semester'];
	  $tahunsekarang= substr("$data",0,-1);
      $sms= substr("$data",-1); //20191
      if($sms =="1"){

        echo  "$tahunsekarang (Gasal)";
      }
      else{
      
        echo "$tahunsekarang (Genap)";
      }
      
      ?>     </option></a>

<?php
}}
?>
</select>

</div>
</div>





                  	

</form>
                  	</div><!-- /row mt -->	
                  
                      </div>
                      </div>


				
          </section>
      </section>
<?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script type="text/javascript" src="chartjs/Chart.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	


  </body>

</html>
<?php } ?>
