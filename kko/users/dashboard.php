<?php session_start();
error_reporting(1);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ 
  if(isset($_POST['submit']))
{
  $semester=$_POST['semester'];
  header('location:dashboard_.php');

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
<script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsemester.php",
  data:'kdmatakuliah='+val,
  success: function(data){
    $("#myChart").html(data);
    
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



          <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  
                  	<!-- <div class="col-md-2 col-sm-2 box0">
                        <div>
                 
                  </div></div>



                  	
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
                                <?php 
                   
// $rt = mysqli_query($con,"SELECT * FROM tblkonsultasi where idusers='".$_SESSION['login']."' and sts_konsul is null");
// $num1 = mysqli_num_rows($rt);
// {?>
					  			<h3><?php //echo htmlentities($num1);?></h3>
                  			</div>
					  			<p><?php //echo htmlentities($num1);?> Konsultasi belum diberi catatan.</p>
                  		</div>
                      <?php// }?> -->

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >
                      <div class="col-md-2 col-sm-2 box0">
                        <!-- <div class="box1">
                  <span class="li_news"></span> -->
                       <?php 
  $status="selesai"; 
  $statuskehadiran="1"; 
  $peterpan="SI3423";  
  $kp="SI4313";
  $skripsi="SI4426"; 
  $semester=$_GET['semester'];
$rt = mysqli_query($con,"SELECT * FROM tblkonsultasi where idusers='".$_SESSION['login']."' and sts_konsul='$status' and semester='".$_GET['semester']."'");
$peterpan = mysqli_query($con,"SELECT * FROM kehadiran where idusers='".$_SESSION['login']."' and statuskehadiran='$statuskehadiran' and semester='".$_GET['semester']."'");
$kp = mysqli_query($con,"SELECT * FROM tblkonsultasi where idusers='".$_SESSION['login']."' and idmatakuliah='$kp' and sts_konsul='$status' and semester='".$_GET['semester']."'");
$skripsi = mysqli_query($con,"SELECT * FROM tblkonsultasi where idusers='".$_SESSION['login']."' and idmatakuliah='$skripsi' and sts_konsul='$status' and semester='".$_GET['semester']."'");
$num1 = mysqli_num_rows($rt);
$num2 = mysqli_num_rows($peterpan);
$num3 = mysqli_num_rows($kp);
$num4 = mysqli_num_rows($skripsi);
{?>
                  <!-- <h3><?php// echo htmlentities($num1);?></h3>
                        </div>
                  <p><?php //echo htmlentities($num1);?> Konsultasi sudah diberi catatan.</p> -->
                      
                </div>

<?php }?>

</div>
</div>
<br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Semester</label>
<div class="col-sm-2">
<select name="semester" id="matakuliah" onchange="window.location=this.value" required="required" title="Pilih semester untuk melihat grafik total konsultasi." class="form-control">
<option value="" >Pilih Semester</option>
<?php $sql=mysqli_query($con,"select DISTINCT semester from tblkonsultasi where idusers='".$_SESSION['login']."' and sts_konsul='selesai' ");
while ($rw=mysqli_fetch_array($sql)) {
  if($rw['semester']==$st)
  {
    continue;
  }
  else
  {
  ?>
  <option value="dashboard.php?semester=<?php echo htmlentities($rw['semester']);?>"><center>
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


</form>

<br> 
<br>
<div style="width: 600px;height: 500px">
	<canvas id="myChart" ></canvas>
  <p>* Harap diperhatikan minimal kelulusan untuk ujian pendadaran bagi mata kuliah skripsi ialah <b>6 kali</b> konsultasi dengan dosen pembimbing. </p>
</div>

                  	


                  	</div><!-- /row mt -->	
                  
                      </div>
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

  <script> 
 
 var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'horizontalBar',
			data: {
				labels: ["Pemograman Terintegrasi Terapan", "Kerja Praktik", "Skripsi"],
				datasets: [{
					label: 'Total Konsultasi',
					data: [<?php echo htmlentities($num2);?>, <?php echo htmlentities($num3);?>, <?php echo htmlentities($num4);?>, 0,10, ],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 2
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:false
						}
					}]
				}
			}
		});
</script>


  </body>

</html>
<?php } ?>
