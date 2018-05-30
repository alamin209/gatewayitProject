<?php include('header.php'); ?>

	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
            <div class="agile_top_w3_grids">
    			<div class="panel panel-info">
                    <div class="panel-heading"> <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <a href="<?php print base_url('add_product');?>">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                    
                    <?php
                    	if($this->session->userdata('message')){

                    		print '<div class="alert alert-success">'.$this->session->userdata('message').'</div';
                    		$this->session->unset_userdata('message');
                    		
                    	}elseif($this->session->userdata('delete')){

                    		print '<div class="alert alert-danger">'.$this->session->userdata('delete').'</div>';
                    		$this->session->unset_userdata('delete');
                    		
                    	}
                    ?>
                    <?php if ($this->session->flashdata('errorMessage')!=null){?>
                        <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                    <?php }
                    elseif($this->session->flashdata('successMessage')!=null){?>
                        <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                    <?php }?>
    				<div class="block-content collapse in">				 
                        <div class="span12">
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <!-- <th>Product Subcategory</th> -->
                                        <!-- <th>Product Description</th> -->
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th> Extra size details </th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                		$i=1;
                                		foreach ($result as $value) {                            			
                                	?>
                                        <tr>
                                            <td class="center"><?php print $i++;?></td>                                     
                                            <td class="center"><?php print $value->prod_name;?>
                                                <br>
                                                <b>Product Code</b>:<?php print $value->prod_code;?>
                                            </td>
                                            <td class="center"><?php print $value->category;?></td> 
                                            <td class="center"><?php print 'BDT '.$value->prod_price;?></td>
                                            <td class="center"><?php print $value->prod_qty;?></td>
                                            <td><div class="table table-responsive">
                                                    <table style="margin-bottom: 4px" class="orderexmple table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                        <?php foreach ($product_d  as $d ) {  ?>
                                                            <?php  if( $value->prod_id== $d->prod_id ) { ?>
                                                                <tr>

                                                                    <td>

                                                                        <?php echo $d->op_desc ?>
                                                                    </td>
                                                                    <td>
                                                                        <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo $d->optional_id?>" onclick="selectid2(this)">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </button>

                                                                        <button type="button" data-panel-id="<?php echo $d->optional_id?>" onclick="selectid3(this)"class="btn btn-danger btn-xs">

                                                                            <i class="fa fa-trash-o "></i>
                                                                        </button>

                                                                    </td>
                                                                </tr>
                                                            <?php  }}?>


                                                        <tr>
                                                            <button id="addRow"  data-panel-id="<?php echo$value->prod_id ?>" onclick="selectid1(this)" class="btn btn-info" style="z-index: inherit">
                                                                Extra Info <i class="fa fa-plus"></i>
                                                            </button>
                                                        </tr>
                                                    </table>
                                                </div></td>
                                            <td class="center">
                                                <a href="<?php print base_url($value->image);?>" target="_blank">
                                                <img src="<?php print base_url($value->image);?>" width="100" height="100"> 
                                            </td>
                                            <td class="center">
                                                <a href="<?php print base_url('Super_admin/edit_product/'.$value->prod_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |

                                                <a href="<?php print base_url('delete_product/'.$value->prod_id);?>" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>

                                    <?php }?>

                                    <div id="myModal" class="modal">
                                        <br/><br/><br/>
                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <span class="close">×</span>

                                            <div id="txtHint"></div>

                                        </div>

                                    </div>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>				         
			</div>							
		</div><!-- //inner_content_w3_agile_info-->
	</div>

<script>
    function chk() {
        var con = confirm('Are you sure ?');
        if (con) {
            return true;
        } else {
            return false;
        }
    }
</script>

    <script>
        var modal = document.getElementById('myModal');
        var span = document.getElementsByClassName("close")[0];

        function selectid1(x)
        {
            btn = $(x).data('panel-id');

            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Super_admin/newOptionalProduct")?>',
                data:{id:btn},
                cache: false,
                success:function(data) {

                    $('#txtHint').html(data);

                }
            });
            modal.style.display = "block";


        }

        function selectid2(x)
        {

            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Super_admin/getOptionalProductId")?>',
                data:{id:btn},
                cache: false,
                success:function(data) {

                    $('#txtHint').html(data);

                }
            });
            modal.style.display = "block";

        }

        function selectid3(x)
        {

            if (confirm("are you sure delete this Extra ?"))
            {

                btn = $(x).data('panel-id');
                $.ajax({
                    type: 'POST',
                    url:'<?php echo base_url("Super_admin/deleteOptional")?>',
                    data: {id: btn},
                    cache: false,
                    success: function (data) {
                        alert(' Extra deleted Successfully');
                        location.reload();
                    }

                });
            }
        }
        function selectid5(x)
        {

            if (confirm("are you sure delete this Product ?"))
            {

                btn = $(x).data('panel-id');
                $.ajax({
                    type: 'POST',
                    url:'<?php echo base_url("Product/deleteProduct")?>',
                    data: {id: btn},
                    cache: false,
                    success: function (data) {
                        alert(' Product deleted Successfully');
                        location.reload();
                    }

                });
            }
        }

        function selectid4(x)
        {

            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Product/getproductInfoById")?>',
                data:{id:btn},
                cache: false,
                success:function(data) {

                    $('#txtHint').html(data);

                }
            });
            modal.style.display = "block";
        }

        // When the user clicks * of the modal, close it
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


    </script>


<?php include('footer.php'); ?>