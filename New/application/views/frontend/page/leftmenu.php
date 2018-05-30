<ul id="Categories">
	<?php
		error_reporting(0);
		foreach($All_Category as $category){
			$CatID = $category->cat_id;

			$SelectSubCat = $this->db->select('*')->from('subcategory')->where('subcat_catid',$CatID)->get()->row();

			$SubCatID = $SelectSubCat->subcat_catid;
			
			if(empty($SubCatID)){ ?>

				<li>
					<a href="<?= base_url('welcome/ProductByCatID/'.$CatID);?>">
						<img src="<?= base_url($category->cat_image);?>" title="<?= $category->category; ?>" alt="<?= $category->category; ?>" width="30px" height="30px"/>
						&nbsp;<?= $category->category; ?>
					</a>
				</li>

			<?php }else{ ?>

				<li>
					<a href="<?= base_url('welcome/SubCategory/'.$CatID);?>">
						<img src="<?= base_url($category->cat_image);?>" title="<?= $category->category; ?>" alt="<?= $category->category; ?>" width="30px" height="30px"/>
						<!-- <i class="fa fa-hand-o-right" aria-hidden="true" style="color:blue;"></i> -->
						&nbsp;<?= $category->category; ?>
					</a>
					<!-- <ul id="u208" style="display: none;">
						<li><a href="#" style="background: url(<?= base_url('assets/front/');?>images/uploads/icons/sameday_gift.png) no-repeat 8px 10px;">Sub-Category</a></li>
					</ul> -->
				</li>

			<?php }
					}
			?>
</ul>
<br clear="all" />
<!--<div style="padding-top:10px;text-align:center;">
	<select name="lang" class="dropDown" onchange="jumpMenu('parent',this,0)">
		<option value="" >Australian $ (AU)</option>
		<option value="" selected="selected">BD Taka (BDT)</option>
		<option value="" >British Pounds (GB)</option>
		<option value="" >Canadian $ (CA)</option>
		<option value="" >Euro € (EUR)</option>
		<option value="" >US Dollars (US$)</option>
	</select>
</div>-->