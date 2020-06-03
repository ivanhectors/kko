	<div class="footer">
		<div class="container">
		<?php

$query=mysqli_query($con,"select * from master where idmaster='1'");
while($row=mysqli_fetch_array($query))
{
?>		

			<b class="copyright">&copy; <?php echo  htmlentities($row['footertahun']);?> </b> <?php echo  htmlentities($row['copyright']);?>
			<?php } ?>
		</div>
	</div>