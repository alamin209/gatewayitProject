<?php include('header.php');?>

<script type="text/javascript">
  function validate(){
    
     if( document.addcategory.category.value == "0" )
     {
     alert( "Please Select a Category!" );
     return false;
     }
     return( true );
  }
</script>

	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
        <div class="block">
            
        <div class="row">
          <div class="col-md-3"></div>                       
            <div class="col-md-6">
              <div class="panel panel-info">

                <div class="panel-heading"> <i class="fa fa-star" aria-hidden="true"></i>
                  Add Sub-Category
                </div>

                  <div class="panel-body">
                    <?php
                        $message = $this->session->userdata('message');
                        if (isset($message)) {
                            echo '<div class="alert alert-success">' . $message . "</div>";
                            $this->session->unset_userdata('message');
                        }
                    ?>
                    <form name="addcategory" action="<?php echo base_url('subcategory_save');?>" enctype="multipart/form-data" method="post" onsubmit="return(validate());">
                     <div class="control-group">
                      <label class="control-label" for="userfile">Select Category</label>
                      <div class="controls">
                        <select name="category" class="form-control">
                          <option value="0">Select Category</option>
                          <?php
                            foreach ($category as $value) {
                          ?>
                          <option value="<?php print $value->cat_id;?>"><?php print $value->category;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="userfile">Sub-Category Name</label>
                      <div class="controls">
                        <input type="text" name="subcategory" class="form-control" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="userfile">Upload Image</label>
                      <div class="controls">
                        <input type="file" name="photo" class="form-control">
                      </div>
                      <p>Image size should be less then 1 MB and  150x150</p>
                    </div>

                    <br>
                    <div class="form-actions">
                      <button type="submit" name="submit" class="btn btn-primary">Save Sub-category</button>
                    </div>

                  </form>
                  </div>
                </div>
            </div>
          </div>

        </div>  
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>