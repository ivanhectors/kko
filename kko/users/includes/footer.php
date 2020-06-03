 <footer class="site-footer">
          <div class="text-center">
          <?php

$query=mysqli_query($con,"select * from master where idmaster='1'");
while($row=mysqli_fetch_array($query))
{
?>		

			<b class="copyright">&copy; <?php echo  htmlentities($row['footertahun']);?> - </b> <?php echo  htmlentities($row['copyright']);?>
			<?php } ?>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>