<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Konsultasi Mahasiswa
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="konsultasibelumselesai.php">
											<i class="icon-tasks"></i>
											Belum di beri catatan
											<?php

  $status='NULL';                   
$rt = mysqli_query($con,"SELECT * FROM tblkonsultasi where sts_konsul is NULL and iddosen='".$_SESSION['dlogin']."' ");
$num1 = mysqli_num_rows($rt);
{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="konsultasiselesai.php">
											<i class="icon-inbox"></i>
											Riwayat Konsultasi

										</a>
									</li>
								</ul>
							</li>

<!-- Sidebar Peterpan-->


							<ul class="widget widget-menu unstyled">
							<?php

$status='peterpan';                   
$rt = mysqli_query($con,"SELECT k.idmatakuliah,m.tags FROM krs k join matakuliah m on k.idmatakuliah=m.matakuliah where m.tags='$status' and k.iddosen='".$_SESSION['dlogin']."' ");
$num1 = mysqli_num_rows($rt);
{?><?php 
	$notifikasi=htmlentities($num1);
	if($notifikasi >="0"){

		echo  '
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages1">
									<i class="menu-icon icon-paste"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Peterpan
								</a>
								<ul id="togglePages1" class="collapse unstyled">
									<li>
										<a href="peterpan">
											<i class="menu-icon icon-group"></i>
											Kelompok Kerja Mahasiswa
										</a>
									</li>
									<li>
										<a href="evaluasiproyek">
											<i class="menu-icon icon-tasks"></i>
											Evaluasi Kemajuan Proyek

										</a>
									</li>
									<li>
										<a href="nilaiakhirkelompok">
											<i class="menu-icon icon-tasks"></i>
											Nilai Akhir Proyek

										</a>
									</li>
									<li>
										<a href="c_kko_peterpan">
											<i class="menu-icon icon-tasks"></i>
											Cetak Kartu Konsultasi Akhir

										</a>
									</li>
								</ul>
							</li>';
						}
						else{
						
				  
						}
				  
				  
				  ?>
				  <?php } ?>

							<ul class="widget widget-menu unstyled">
							<?php

$status='kp';                   
$rt = mysqli_query($con,"SELECT k.idmatakuliah,m.tags FROM krs k join matakuliah m on k.idmatakuliah=m.matakuliah where m.tags='$status' and k.iddosen='".$_SESSION['dlogin']."' ");
$num1 = mysqli_num_rows($rt);
{?><?php 
	$notifikasi=htmlentities($num1);
	if($notifikasi >="0"){

		echo  '
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages2">
									<i class="menu-icon icon-paste"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Kerja Praktik
								</a>
								<ul id="togglePages2" class="collapse unstyled">
									<li>
										<a href="daftarbimbingankp">
											<i class="menu-icon icon-group"></i>
											Daftar Bimbingan Mahasiswa
										</a>
									</li>
									<li>
										<a href="riwayatkonsultasikp">
											<i class="menu-icon icon-tasks"></i>
											Riwayat Bimbingan

										</a>
									</li>
								</ul>
							</li>';
						}
						else{
						
				  
						}
				  
				  
				  ?>
				  <?php } ?>


							<ul class="widget widget-menu unstyled">
							<?php

$status='skripsi';                   
$rt = mysqli_query($con,"SELECT k.idmatakuliah,m.tags FROM krs k join matakuliah m on k.idmatakuliah=m.matakuliah where m.tags='$status' and k.iddosen='".$_SESSION['dlogin']."' ");
$num1 = mysqli_num_rows($rt);
{?><?php 
	$notifikasi=htmlentities($num1);
	if($notifikasi >="0"){

		echo  '<li>
		<a class="collapsed" data-toggle="collapse" href="#togglePages3">
			<i class="menu-icon icon-paste"></i>
			<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
			Skripsi
		</a>
		<ul id="togglePages3" class="collapse unstyled">
			<li>
				<a href="daftarbimbinganskripsi">
					<i class="menu-icon icon-group"></i>
					Daftar Bimbingan Mahasiswa
				</a>
			</li>
			<li>
				<a href="riwayatkonsultasiskripsi">
					<i class="menu-icon icon-tasks"></i>
					Riwayat Bimbingan

				</a>
			</li>

		</ul>
	</li>';
	  }
	  else{
	  

	  }


?>
<?php } ?>
							

							
							<li>
								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Data Mahasiswa
								</a>
							</li>
						</ul>



							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
