<?php include('header.php'); ?>

    <link href="<?= base_url('assets/admin/wysiwyg/bootstrap-wysihtml5.css'); ?>" rel="stylesheet" media="screen">

    <script type="text/javascript">
        function validate(){

            if( document.addproduct.cat_id.value == "-1" )
            {
                alert( "Please Select A Category!" );
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
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="panel panel-info">

                                <div class="panel-heading" style="text-align: center;font-size: 16px;"> <i class="fa fa-star" aria-hidden="true"></i>
                                    Upload New Item(s)
                                </div>

                                <div class="panel-body">
                                    <?php
                                    $message=$this->session->userdata('message');
                                    if($message){

                                        echo '<div class="alert alert-success">' . $message . "</div>";
                                        $this->session->unset_userdata('message');
                                    }
                                    ?>
                                    <form name="addproduct" action="<?php echo base_url('Foodcourt/save_food');?>" enctype="multipart/form-data" method="post" onsubmit="return(validate());">

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
                                                <input type="text" name="prod_name" class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- <div class="control-group">
                                            <label class="control-label" for="sscdescription">Description</label>
                                            <div class="controls">
                                              <textarea class="input-xlarge textarea" placeholder="Enter description..." id="sscdescription" name="sscdescription"></textarea>
                                            </div>
                                        </div> -->

                                        <div class="control-group">
                                            <label class="control-label" for="userfile">Product Price</label>
                                            <div class="controls">
                                                <input type="number" name="prod_price" class="form-control" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-actions">
                                            <button type="submit" name="submit" class="btn btn-primary">Upload Item</button>
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

<?php include('footer.php'); ?>