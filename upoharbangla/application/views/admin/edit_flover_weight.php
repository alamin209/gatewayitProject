<?php include('header.php'); ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  
  <div class="inner_content">
    <div class="inner_content_w3_agile_info">
      <div class="agile_top_w3_grids">
        <div class="block">
            <div class="row">
            <div class="col-md-2"></div>                       
            <div class="col-md-8">
              <div class="panel panel-info">

                <div class="panel-heading" style="text-align: center;font-size: 16px;"> <i class="fa fa-star" aria-hidden="true"></i>
                  Update Product Flaver & Weight
                </div>

                  <div class="panel-body">
                   
                    <?php
                      $message=$this->session->userdata('message');
                      if($message){
                        
                        echo '<div class="alert alert-success">' . $message . "</div>";
                        $this->session->unset_userdata('message');
                      }
                    ?>
                    <form name="edit_category" id="edit_category" action="<?php echo base_url('super_admin/UpdateFloverWeight');?>" enctype="multipart/form-data" method="post">

                      <div class="form-group">
                        <label class="control-label" for="userfile">Select Category</label>
                        <div class="controls">
                          <select class="form-control" name="category" id="category">
                              <option value="">Select Categoty</option>
                              <?php getAllcategory(); ?>
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Flaver</label>
                        <div class="controls">
                          <input type="text" name="flaver" class="form-control" value="<?= $select_info->flover; ?>">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Weight</label>
                        <div class="controls">
                          <input type="text" name="weight" class="form-control" value="<?= $select_info->weight; ?>">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Price</label>
                        <div class="controls">
                          <input type="number" name="price" class="form-control" value="<?= $select_info->price; ?>">
                          <input type="hidden" name="fw_id" class="form-control" value="<?= $select_info->fw_id; ?>">
                        </div>
                      </div>

                      <br>
                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Update IT</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-md-2"></div> 
          </div>
        </div>
        <!-- /block -->   
      </div>              
    </div><!-- //inner_content_w3_agile_info-->
  </div>

<?php include('footer.php'); ?>

<script type="text/javascript">

  document.forms['edit_category'].elements['category'].value='<?php echo $select_info->prod_catid?>';
   
    $('#category').change(function () {
        $.get("<?php echo base_url()?>Super_admin/getSubcatByCatId/" + this.value, function (data, status) {
            $('#subcat_name').html(data);
        });
        
    });
        
</script>