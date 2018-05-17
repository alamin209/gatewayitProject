<?php include('header.php'); ?>

	<div class="inner_content">

		<div class="inner_content_w3_agile_info">

			<div class="agile_top_w3_grids"> 

        <div class="block">
          

          <div class="row">
            <div class="col-md-3"></div>                       
            <div class="col-md-6">
              <div class="panel panel-info">

                <div class="panel-heading"> <i class="fa fa-star" aria-hidden="true"></i>
                  Add Category
                </div>

                  <div class="panel-body">
                    <?php
                        $message = $this->session->userdata('message');
                        if (isset($message)) {
                            echo '<div class="alert alert-success">' . $message . "</div>";
                            $this->session->unset_userdata('message');
                        }
                    ?>

                    <form action="<?php echo base_url('category_save');?>" enctype="multipart/form-data" method="post">

                      <div class="control-group">
                        <label for="userfile">Name :</label>
                          <input type="text" name="name" id="company" class="form-control" required>
                      </div>

                      <div class="control-group">
                        <label for="userfile">Upload Photo :</label>
                          <input type="file" name="cat_image" class="form-control" >
                          <p>Image dimention must be 150x150</p>
                      </div>
                      <br>

                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Save Category</button>
                      </div>

                    </form>
                  </div>
                </div>
            </div>
          </div>
  
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>