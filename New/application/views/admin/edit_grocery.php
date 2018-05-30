<?php include('header.php'); ?>
  
<link href="<?= base_url('assets/admin/wysiwyg/bootstrap-wysihtml5.css'); ?>" rel="stylesheet" media="screen">

  <div class="inner_content">
    <div class="inner_content_w3_agile_info">
      <div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="row">
            <div class="col-md-2"></div>                       
            <div class="col-md-8">
              <div class="panel panel-info">

                <div class="panel-heading" style="text-align: center;font-size: 16px;"> <i class="fa fa-star" aria-hidden="true"></i>
                  Update Item(s)
                </div>

                  <div class="panel-body">
                    <?php
                      $message=$this->session->userdata('message');
                      if($message){
                        
                        echo '<div class="alert alert-success">' . $message . "</div>";
                        $this->session->unset_userdata('message');
                      }
                    ?>
                    <form name="edit_category" id="edit_category" action="<?php echo base_url('Grocery_item/update_grocery');?>" enctype="multipart/form-data" method="post" onsubmit="return(validate());">

                      <div class="form-group">
                        <label class="control-label" for="userfile">Select Category</label>
                        <div class="controls">
                          <select class="form-control" name="cat_id" id="category">
                              <option value="-1">Select Categoty</option>
                              <?php getAllcategory(); ?>
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Name</label>
                        <div class="controls">
                          <input type="text" name="prod_name" class="form-control" value="<?= $selected_product->prod_name; ?>" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Price</label>
                        <div class="controls">
                          <input type="number" name="prod_price" class="form-control" value="<?= $selected_product->prod_price; ?>" required>
                          <input type="hidden" name="id" class="form-control" value="<?= $selected_product->id; ?>" required>
                        </div>
                      </div>

                      <br>
                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Save Change</button>
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
    </div>
  </div>

<script type="text/javascript">

   document.forms['edit_category'].elements['cat_id'].value='<?php echo $selected_product->cat_id?>';
   
</script>

<?php include('footer.php'); ?>