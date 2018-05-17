<?php include('header.php'); ?>

	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="block-content collapse in">
                <div class="span12">
                    <form action="<?php echo base_url('update_subcategory');?>" enctype="multipart/form-data" method="post">
                        <div class="control-group">
                          <label class="control-label" for="userfile">Subcategory Name</label>
                          <div class="controls">
                            <input type="text" name="subcategory" value="<?php print $result->subcategory;?>" class="form-control" required>
                          </div>
                          <td class="center">
                              <img src="<?php print base_url($result->photo);?>" height="120px" width="100px" title="category image" alt="category image">
                          </td>
                           <div class="control-group">
                          <label class="control-label" for="userfile">Upload Image</label>
                          <div class="controls">
                            <input type="file" name="photo" class="form-control">
                            <p>Image size should be less then 1 MB and  150x150</p>
                          </div>
                        </div>
                          <input type="hidden" name="id" value="<?php print $result->subcat_id;?>" class="form-control">
                        </div>
                        <br>
                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>   
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>