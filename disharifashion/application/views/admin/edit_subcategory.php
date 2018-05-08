<?php
include('header.php');
?>
	<div class="inner_content">
		<!-- /inner_content_w3_agile_info-->
		<div class="inner_content_w3_agile_info">
			<!-- /agile_top_w3_grids-->
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
                              <img src="<?php print base_url($result->subcat_image);?>" height="120px" width="100px" title="category image" alt="category image">
                          </td>
                           <div class="control-group">
                          <label class="control-label" for="userfile">Image</label>
                          <div class="controls">
                            <input type="file" name="subcat_image" id="company" class="form-control" required>
                          </div>
                        </div>
                          <input type="hidden" name="id" value="<?php print $result->subcat_id;?>" class="form-control">
                        </div>
                        <br>
                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>   
			</div>							
		</div><!-- //inner_content_w3_agile_info-->
	</div>
<?php
include('footer.php');
?>