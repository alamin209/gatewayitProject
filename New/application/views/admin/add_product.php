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
                  Upload New Product(s)
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
                    <form action="<?php echo base_url('product_save');?>" enctype="multipart/form-data" method="post">

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Name</label>
                        <div class="controls">
                          <input type="text" name="name" class="form-control" required>
                        </div>
                      </div>

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
                        <label class="control-label" for="userfile">Select Sub-Category</label>
                        <div class="controls">
                           <select name="subcategory" id="subcat_name" class="form-control">
                                <option value="">Select Sub Categoty</option>
                            </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Description</label>
                        <div class="controls">
                          <textarea name="description"></textarea>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Price</label>
                        <div class="controls">
                          <input type="text" name="price" class="form-control" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Code</label>
                        <div class="controls">
                          <input type="text" name="code" class="form-control" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Product Quantity</label>
                        <div class="controls">
                          <input type="number" name="prod_qty" class="form-control" required>
                        </div>
                      </div>
                        <div id="Item_price"> </div>
                        <div class="control-group">
                            <label class="control-label" for="userfile">If you want to add any Optional Information</label>
                            <div class="controls">
                                <input class="btn btn-success" type="button" name = 'add' value='Add' onclick="selectid2()">
                            </div>
                        </div>
                        <div id="showattr" style="display: none">
                            <div id='TextBoxesGroup'>
                                <div id="TextBoxDiv1" >
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> Color/Weight/Size/Extra #1 : </label>
                                        <div class="controls">
                                            <input class="form-control input-height"  placeholder="Add your optional  description 1" name="option_extra" >
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="userfile">Given Color/Weight/Size/Extra #1  value should be input here </label>
                                        <div class="controls">
                                            <input class="form-control input-height"   type='textbox' id='textbox1' name="textbox[]" >                                        </div>
                                    </div>

                                </div>
                            </div>
<!--                            <div id="add_remove_button" class="form-group" style="margin-left: 230px">-->
<!--                                <input class="btn btn-success" type='button' value='Add More' id='addButton'>-->
<!--                                 <input class="btn btn-danger" type='button' value='Remove' id='removeButton'>-->
<!--                            </div>-->

                        </div>
                      <div class="control-group">
                        <label class="control-label" for="userfile">Upload image</label>
                        <div class="controls">
                          <input type="file" name="image" id="company"   class="form-control">
                        </div>
                        <p>Image size should be less than 1 MB</p>
                      </div>
                      <br>
                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Upload Product</button>
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

<script type="text/javascript">

    $('#category').change(function () {
        $.get("<?php echo base_url()?>Super_admin/getSubcatByCatId/" + this.value, function (data, status) {
            $('#subcat_name').html(data);
        });
        
    });
        
function selectid2() {
document.getElementById('showattr').style.display = "block";
document.getElementById('Item_price').style.display = "none";
//        document.getElementById('Item_Status').style.display = "none";
document.getElementById('add_remove_button').style.display = "block";
return false;
}
</script>


<script type="text/javascript">
    // $(document).ready(function(){
    //     var counter = 2;
    //     $("#addButton").click(function () {
    //         if(counter>10){
    //             alert("Only 10 textboxes allow");
    //             return false;
    //         }
    //         var newTextBoxDiv = $(document.createElement('div'))
    //             .attr("id", 'TextBoxDiv' + counter);
    //         newTextBoxDiv.after().html('<div class="form-group">'+
    //             '<label class="control-label">Size/Extra #'+ counter + ' : </label>'+
    //             '<div class="controls">'+
    //             '<input class="form-control input-height"  placeholder="Add your optional  description  "  type="textbox" id="textbox1" name="textbox[]" >'+
    //             '</div>'+
    //             '</div>'
    //         );
    //         newTextBoxDiv.appendTo("#TextBoxesGroup");
    //         counter++;
    //     });
        $("#removeButton").click(function () {
            if(counter==2){
                alert(" textbox to remove");
                document.getElementById('Item_price').style.display = "block";
//                    document.getElementById('Item_Status').style.display = "block";
                document.getElementById('add_remove_button').style.display = "none";
                document.getElementById('showattr').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });
</script>