<?php 
session_start();
error_reporting(0);
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

    <title>Kartu Konsultasi Online | Riwayat Konsultasi</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
th, td {

  vertical-align: middle;

}
  </style>
  
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
          	<h4><i class="fa fa-angle-right"></i> Riwayat Konsultasi</h4>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="table">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center;width:5%">No</th>
                                  <th style="text-align: center;width:20%">Mata Kuliah</th>                                 
                                  <th style="text-align: center">Dosen Pembimbing</th>
                                  <th style="text-align: center">Tanggal</th>
                                  <th style="text-align: center">Terakhir diubah</th>
                                  <th style="text-align: center">Status</th>
                                  <th style="text-align: center">Action</th>
                                  
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
  $cnt=1;
  $query=mysqli_query($con,"select * from tblkonsultasi t join matakuliah m on t.idmatakuliah=m.kdmatakuliah join dosen d on t.iddosen=d.username where idusers='".$_SESSION['login']."' and t.idmatakuliah='SI4426' and t.semester='$semester' order by t.lastUpdationDate DESC");
while($row=mysqli_fetch_array($query))
{
  ?>
                                <tbody>

                              <tr>
                                  <td align="center"><?php echo htmlentities($cnt);?></td>
                                  <td>[<?php echo htmlentities($row['kdmatakuliah']);?>] <?php echo htmlentities($row['matakuliah']);?></td>
                                  <td align="center"><?php echo htmlentities($row['nmdosen']);?></td>                                 
                                  <td align="center"><?php echo htmlentities($row['regDate']);?></td>
                                 <td align="center"><?php echo  htmlentities($row['lastUpdationDate']);

                                 ?></td>
                                  <td align="center"><?php 
                                    $status=$row['sts_konsul'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      <span title="Belum di beri catatan"><i class="fa fa-times-circle" style="font-size:18px;color:#d41919"></i></span>
                                   <?php }
 if($status=="in process"){ ?>
<button type="button" class="btn btn-warning">Diproses</button>
<?php }
if($status=="selesai") {
?>
<span title="Sudah di beri catatan"><i class="fa fa-check-circle" style="font-size:18px;color:#19d454"></i></span>
<?php } ?>
                                   <td align="center">
                                   <a href="dtl-konsultasi.php?id=<?php echo htmlentities($row['nokonsultasi']);?>&iddosen=<?php echo htmlentities($row['username']);?>">
<i class="fa fa-info-circle" style="font-size:18px;color:#3283a8"></i></a>
                                   </td>
                                </tr>
                              <?php $cnt=$cnt+1;} ?>
                            
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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
    

  </body>
</html>
<?php } ?>
