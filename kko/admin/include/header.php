<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="change-password.php">
			  		KKO | Admin Portal
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
					<li><?php $query=mysqli_query($con,"select * from admin where username='".$_SESSION['alogin']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
 <a href="change-profil"> <?php echo htmlentities($row['nmadmin']);?>
						
						</a></li>
						<?php } ?> 
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/admin.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="change-profil">Ubah Profil</a></li>
								<li><a href="change-password">Change Password</a></li>
								<li class="divider"></li>
								<li><a href="logout">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
