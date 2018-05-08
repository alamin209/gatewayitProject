<?php
include('header.php');
?>
	<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
		<div class="inner_content_w3_agile_info">
					<!-- /agile_top_w3_grids-->
			<div class="agile_top_w3_grids">
				 <div class="navbar navbar-inner block-header">
                    <div class="alert alert-info">All Category &nbsp;
                        <a href="<?php print base_url('add_category');?>">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                </div>	
                <?php
                	if($this->session->userdata('update')){

                		echo '<div class="alert alert-success">' . $this->session->userdata('update') . "</div>";
                		$this->session->unset_userdata('update');

                	}elseif($this->session->userdata('delete')){

                		echo '<div class="alert alert-danger">' . $this->session->userdata('delete') . "</div>";
                		$this->session->unset_userdata('delete');

                	}
                ?>
				 <div class="block-content collapse in">				 
                    <div class="span12">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>Category Photo</th>
                                    <th>Edit</th>
                                    <!-- <th>Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$i=1;
                            		foreach ($result as $value) {
                            			
                            	?>
                                    <tr>
                                        <td class="center"><?php print $i++;?></td>                                     
                                        <td class="center"><?php print $value->category;?></td>

                                        <td class="center">
                                            <img src="<?php print base_url($value->cat_image);?>" height="120px" width="100px" title="category image" alt="category image">
                                        </td>

                                        <td class="center"><a href="<?php print base_url('edit_category'.'/'.$value->cat_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a></td>

                                       <!--  <td class="center"><a href="<?php //print base_url('delete_category'.'/'.$value->cat_id);?>"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></td> -->
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
                        <div id="pagination">
                            <?php //echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>				         
			</div>							
		</div><!-- //inner_content_w3_agile_info-->
	</div>
<?php
include('footer.php');
?>