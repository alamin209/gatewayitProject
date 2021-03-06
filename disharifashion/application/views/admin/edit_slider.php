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
                  Update Slide
                </div>

                  <div class="panel-body">
                    <?php
                      $img_msg = $this->session->userdata('img_msg');
                      if (isset($img_msg)) {
                        echo '<div class="alert alert-danger">' . $img_msg . "</div>";
                        $this->session->unset_userdata('img_msg');
                      }
                    ?>

                    <?php
                      $message=$this->session->userdata('message');
                      if($message){
                        
                        echo '<div class="alert alert-success">' . $message . "</div>";
                        $this->session->unset_userdata('message');
                        
                      }
                    ?>
                    <form action="<?php echo base_url('super_admin/update_slide');?>" enctype="multipart/form-data" method="post">

                      <div class="control-group">
                        <div class="controls">
                          <img src="<?= base_url($result->image);?>" height="120px" width="130px">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Upload image</label>
                        <div class="controls">
                          <input type="file" name="image" id="company" class="form-control" required>
                        </div>
                      </div>
                      <br>
                      <input type="hidden" name="slide_id" class="form-control" value="<?= $result->slide_id;?>">
                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Update Slide</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-md-2"></div> 
          </div>
        </div>
      </div>              
    </div>
  </div>

<?php include('footer.php'); ?>