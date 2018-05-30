<?php include('header.php'); ?>

	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
            <div class="agile_top_w3_grids">
    			<div class="panel panel-info">
                    <div class="panel-heading"> <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <a href="<?php print base_url('super_admin/AddFloverWeight');?>">
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

    				<div class="block-content collapse in">				 
                        <div class="span12">
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Product Category</th>
                                        <th>Product Flaver</th>
                                        <th>Product Weight</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                		$i=1;
                                        if($result){
                                		foreach ($result as $value) {                            			
                                	?>
                                        <tr>
                                            <td class="center"><?php print $i++;?></td>
                                            <td class="center"><?php print $value->category;?></td> 
                                            <td class="center"><?php print $value->flaver;?></td>
                                            <td class="center"><?php print $value->weight;?></td>
                                            <td class="center"><?php print $value->price.' tk';?></td>
                                            <td class="center">
                                                <a href="<?php print base_url('Super_admin/EditFloverWeight/'.$value->fw_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |

                                                <a href="<?php print base_url('Super_admin/DeleteFloverWeight/'.$value->fw_id);?>" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>

                                    <?php } 
                                        }else{
                                            echo "Nothing Found !!!";
                                        }
                                    ?>
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

<?php include('footer.php'); ?>