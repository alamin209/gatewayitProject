<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="topnavarea">
				<a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /&nbsp;Our Category Catelog</div>
		</div>
	</div>
</div>
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="catarea2">
				<div class="cathead">Upohar Bangla Catelog</div>
				<div class="categorylist">

					<?php
						error_reporting(0);
						foreach($All_Category as $category){
							$CatID = $category->cat_id;
							$SelectProduct = $this->db->select('*')->from('product')->where('prod_catid',$CatID)->get()->row();
							$SubCatID = $SelectProduct->prod_subcatid;
							
							if($SubCatID == NULL){ ?>
					
								<div id="thumbHomePage">
									<a href="<?= base_url('welcome/ProductByCatID/'.$CatID);?>">
										<img src="<?= base_url($category->cat_image);?>" height="149" width="168" title="Upoharbangla.com" alt="Upoharbangla"/>
									</a>
									<div class="thumbText">
										<a href="<?= base_url('welcome/ProductByCatID/'.$CatID);?>"><?= $category->category;?></a>
									</div>
								</div>

							<?php }else{ ?>
							
								<div id="thumbHomePage">
									<a href="<?= base_url('welcome/SubCategory/'.$CatID);?>">
										<img src="<?= base_url($category->cat_image);?>" height="149" width="168" title="Upoharbangla.com" alt="Upoharbangla"/>
									</a>
									<div class="thumbText">
										<a href="<?= base_url('welcome/SubCategory/'.$CatID);?>"><?= $category->category;?></a>
									</div>
								</div>
							
							<?php } ?>
							
					<?php } ?>

					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>