<style>
.badge {
  padding: 1px 5px 1px;
  font-size: 11px;
  font-weight: bold;
  white-space: nowrap;
  color: #ffffff;
  background-color: #999999;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
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
  background-color: #dc3545;
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
  background-color: #28a745;
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
<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="change-password.php">
			  		KKO | Dosen Portal
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">

						<li><?php $query=mysqli_query($con,"select * from dosen where username='".$_SESSION['dlogin']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
 <a href="change-profil"> <?php echo htmlentities($row['nmdosen']);?>
						
						</a></li>
						<?php } ?> 

						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/admin.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu" >
								<li><a href="konsultasibelumselesai">Konsultasi <?php

$status='NULL';                   
$rt = mysqli_query($con,"SELECT * FROM tblkonsultasi where sts_konsul is NULL and iddosen='".$_SESSION['dlogin']."' ");
$num1 = mysqli_num_rows($rt);
{?><?php 
	$notifikasi=htmlentities($num1);
	if($notifikasi >="0"){

		echo  '<b class="badge badge-warning pull-right" title="'.$notifikasi.' Konsultasi belum diberi catatan">'.$notifikasi.'</b>';
	  }
	  else{
	  
		echo '<b class="badge badge-success pull-right" title="'.$notifikasi.' Konsultasi">'.$notifikasi.'</b>';
	  }


?></b>
<?php } ?></a></li>
								<li><a href="change-profil">Ubah Profil</a></li>
								<li><a href="change-password">Ubah Password</a></li>
								<li class="divider"></li>
								<li><a href="logout">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
