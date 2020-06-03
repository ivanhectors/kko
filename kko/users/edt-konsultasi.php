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
    $detailkonsultasi=$_POST['detailkonsultasi'];
    $compfile=$_FILES["compfile"]["name"];
  
  // get the image extension
$extension = substr($compfile,strlen($compfile)-4,strlen($compfile));
// allowed extensions
$allowed_extensions = array(".mp4");

// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(in_array($extension,$allowed_extensions))
{
echo "<script>alert('* Format file yang bisa diupload adalah: jpg, png, docx, xls, xlsx, pptx, odt, zip, txt & pdf.');</script>";
}
else
{
$titik=".";
//rename the image file
$imgnewfile=md5($compfile).$titik.$extension;
// Code for move image into directory
move_uploaded_file($_FILES["compfile"]["tmp_name"],"dokumenkonsultasi/".$imgnewfile);
  $query=mysqli_query($con,"update tblkonsultasi set detailkonsultasi='$detailkonsultasi', filekonsultasi='$imgnewfile' WHERE nokonsultasi='".$_GET['nokonsultasi']."' ");
  if($query)
  {
  $successmsg="Profile photo Successfully !!";
  }
  else
  {
  $errormsg="Profile photo not updated !!";
  }

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

    <title>Kartu Konsultasi Online</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.badge {
  padding: 4px 9px 2px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.mybutton {
  padding: 2px 6px 2px;
  font-size: 12.025px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #3a87ad;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.mybutton:hover {
  color: #ffffff;
  text-decoration: none;
  cursor: pointer;
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
  </head>

  <body>

  <section id="container" >
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
      <section id="main-content" style="padding-left:3%; color:#000">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Edit Konsultasi</h3>
            <hr>
            
            <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >
 <?php 
 $idkonsultasi=$_GET['nokonsultasi'];
 $query=mysqli_query($con,"select * from tblkonsultasi t join matakuliah m on t.idmatakuliah=m.kdmatakuliah join dosen d on t.iddosen=d.username where nokonsultasi='$idkonsultasi'");
while($row=mysqli_fetch_array($query))
{?>
          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>No. Konsultasi  </b></label>
          		<div class="col-sm-4">
          		<p>: <?php echo htmlentities($row['nokonsultasi']);?></p>
          		</div>
<label class="col-sm-2 col-sm-2 control-label"><b>Tanggal diajukan </b></label>
              <div class="col-sm-4">
              <p>: <?php echo htmlentities($row['regDate']);?></p>
              </div>
          	</div>


<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Mata Kuliah </b></label>
              <div class="col-sm-4">
              <p>: [<?php echo htmlentities($row['kdmatakuliah']);?>] <?php echo htmlentities($row['matakuliah']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b>Dosen Pembimbing </b> </label>
              <div class="col-sm-4">
              <p>: <a data-toggle="modal" href="dtl-konsultasi.php#informasi"><?php echo htmlentities($row['nmdosen']);?></a></p>

              </div>
            </div>



  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Konsultasi Mahasiswa </b></label>
              <div class="col-sm-4">
              <textarea type="richtext" name="detailkonsultasi" cols="40" rows="5" value="<?php echo htmlentities($row['detailkonsultasi']);?>"><?php echo htmlentities($row['detailkonsultasi']);?></textarea>
              </div>
              <label class="col-sm-2 col-sm-2 control-label"><b>File Konsultasi </b></label>
              <div class="col-sm-4">
               <input type="file" name="compfile" class="btn btn-outline-secondary" class="form-control" required><span><?php echo htmlentities($row['filekonsultasi']);?></span>
                            </div>
            </div>  



  <div class="row mt">
  <label class="col-sm-2 col-sm-2 control-label"><b>Catatan Dosen </b></label>
              <div class="col-sm-4">
              <p>: <?php echo htmlentities($row['catatankonsultasi']);?></p>
              </div>

            <label class="col-sm-2 col-sm-2 control-label"><b>File Revisi </b></label>
              <div class="col-sm-4">
              <p>: <?php $cfile=$row['filerevisi'];
              if($cfile=="" || $cfile=="NULL")
              {
                echo htmlentities("-");
              }
              else{ ?>
              <a href="dokumenkonsultasi/<?php echo htmlentities($row['filekonsultasi']);?>" target='_blank'> View File</a>
              <?php } ?>
                            </p>
                            </div>


            </div> 




 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b>Status Konsultasi </b></label>
              <div class="col-sm-4">
              <p>: <?php 

$statuskons= htmlentities($row['sts_konsul']);
if($statuskons=="selesai"){

  echo  '<label class="badge badge-success" title="Telah diberi catatan"><i class="fa fa-check"></i></label>';
}
else {
  echo  '<label class="badge badge-error" title="Belum diberi catatan"><i class="fa fa-refresh"></i></label>';
}
              ?></p>
              
              </div>
            <label class="col-sm-2 col-sm-2 control-label"><button type="submit" name="submit" class="btn mybutton" style="padding: 4px 9px 2px;font-size: 12.025px;"><i class="fa fa-save"></i> Save</button></label>
              <div class="col-sm-4">
              </div>
              </form>
            </div> 
            

		     
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          </form>
              </hr>
               <?php } ?>



		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
<?php include('includes/footer.php');?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
