
<?php foreach ($optionaInfo  as $o) { ?>
    <form action="<?php echo base_url()?>Super_admin/exupdateoptional/<?php echo $o->extr_id?>"  method="post" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3"> extra size  Name<span class="required"> * </span></label>
                <div class="col-md-5">
                    <input type="text" name="optional" value="<?php echo $o->extra_name ?>" required class="form-control input-height" />
                </div>
                <input type="hidden" name="prod_id"  value="<?php echo $o->prod_id ?>"  required class="form-control input-height" />
                <input type="hidden" name="optional_id"  value="<?php echo $o->optional_id ?>"  required class="form-control input-height" />


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
<?php } ?>