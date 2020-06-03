<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                              <?php $query=mysqli_query($con,"select nim,namalengkap,userImage from users where nim='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                  <p class="centered"><a href="profile.php">
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/noimage.png"  class="img-circle" width="70" height="70" >
<?php else:?>
  <img src="userimages/<?php echo htmlentities($userphoto);?>" class="img-circle" width="70" height="70">

<?php endif;?>
</a>
</p>
 
                  <h5 class="centered"><?php echo htmlentities($row['namalengkap']);?></h5>
                  <h5 class="centered"><?php echo htmlentities($row['nim']);?></h5>


                  <?php } ?>
                    
                  <li class="mt">
                      <a href="dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Profil</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="profile">Ubah Data</a></li>
                          <li><a  href="change-password">Ubah Password</a></li>
                        
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="konsultasi" >
                          <i class="fa fa-book"></i>
                          <span>Konsultasi</span>
                      </a>
                    </li>
                  </li>
                  <li class="sub-menu">
                      <a href="h-skripsi" >
                          <i class="fa fa-tasks"></i>
                          <span>Riwayat Konsultasi</span>
                      </a>
                      <ul class="sub">
                      <!-- <li><a  href="konsultasi-history">Peterpan</a></li> -->
                          <li><a  href="h-kp">Kerja Praktik</a></li>
                          <li><a  href="h-skripsi">Skripsi</a></li>
                        
                      </ul>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="c_kartu_konsultasi" >
                          <i class="fa fa-print"></i>
                          <span>Cetak Kartu Konsultasi</span>
                      </a>
                      <!-- <ul class="sub">
                          <li><a  href="KP_REPORT" target="_blank">Kerja Praktik</a></li>
                          <li><a  href="SKRIPSI_REPORT" target="_blank">Skripsi</a></li> -->
                        
                      </ul>
                    </li>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>