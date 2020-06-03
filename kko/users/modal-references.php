
		          <!-- Modal -->
                  <form class="form-login" name="forgot" method="post">
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="informasi" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Informasi Dosen Pembimbing</h4>
		                      </div>
		                      <div class="modal-body">
                          <?php $query=mysqli_query($con,"select * from dosen where username='".$_GET['iddosen']."'");
while($row=mysqli_fetch_array($query))
{?>
		                          
                              <p>Nama : <b><?php echo htmlentities($row['nmdosen']);?></b></p>
                              <p>Email : <a href="mailto:<?php echo htmlentities($row['emaildosen']);?>"><?php echo htmlentities($row['emaildosen']);?></a></p>
                              <p>Telpon : <a href="tel:<?php echo htmlentities($row['telpdosen']);?>"> <?php echo htmlentities($row['telpdosen']);?></a></p>
                              <?php } ?>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
		                
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          </form>

              <form class="form-login" name="forgot" method="post">
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Ubah Konsultasi</h4>
		                      </div>
		                      <div class="modal-body">
                          <p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if($errormsg){
echo htmlentities($errormsg);
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?></p>
                          <?php $query=mysqli_query($con,"select detailkonsultasi,filekonsultasi from tblkonsultasi where nokonsultasi='".$_GET['id']."'");
while($row=mysqli_fetch_array($query))
{?>
<label class="control-label"><b>Catatan Konsultasi :</b></label>		                        
<textarea rows="4" cols="50" name="detailkonsultasi" placeholder="" value="<?php echo htmlentities($row['detailkonsultasi']);?>" class="form-control" ><?php echo htmlentities($row['detailkonsultasi']);?></textarea><br >
<!-- <label class="control-label"><b>File Konsultasi :</b></label>
<input type="file" name="image" class="btn btn-outline-secondary" class="form-control"><br>	 -->
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="submit" name="change" onclick="return valid();">Submit</button>
		                      </div>
                              