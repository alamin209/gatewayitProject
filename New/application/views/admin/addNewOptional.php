<form action="<?php echo base_url()?>Super_admin/addOptional"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-body">

        <div class="form-group">

            <label class="control-label col-md-3"> extra size  Name<span class="required"> * </span></label>
            <div class="col-md-5">
                <input type="text" name="optional" placeholder="enter  optional Text" required class="form-control input-height" />
            </div>

            <input type="hidden" name="product_id"  value="<?php echo $prduct_id ?>"  required class="form-control input-height" />
            <input type="hidden" name="optional_id"  value="<?php echo  $name?>"  required class="form-control input-height" />


        </div>


        <div  class="form-group">
            <div class="form-actions">
                <div class="row">

                    <div class="col-md-offset-3 col-md-4">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>