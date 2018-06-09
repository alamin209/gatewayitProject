<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="topnavarea">
				<a href="" title="HomePage">Home</a> /<a href="" class='txtLocation'>Gifts and Dress for Him</a>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="leftmenuarea menudisplay">
				<div class="leftmenu">
					<?php include('leftmenu.php');?>
				</div>
			</div>
			
			<div class="rightcontentarea">
				<div class="headarea">
					<div class="headtext"><?= $Category_Name->category; ?></div>
					<div class="share">
						<div style="margin-right:80px;float:right;width:80px">
							<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.upoharbd.com&width=152px&layout=button_count&action=like&show_faces=false&share=true&height=21&appId=182132298657766" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:152px; height:21px;" allowTransparency="true"></iframe>
						</div>
						<div style="float:left;" class="menudisplay"></div>
						<br clear="all"/>
					</div>
				</div>

				<div class="noProductsMessage">
					<img src="<?= base_url('assets/front/');?>images/tick.jpg" width="33" height="31" border="0" alt="Please" /> Please click on any section below to view the products in that category
				</div>

				<div id="SubCategories">
					<?php foreach($All_SubCategory as $subcat){ ?>

						<div id="thumbHomePage">
							<a href="<?= base_url('welcome/ProductBySubID/'.$subcat->subcat_id);?>">
								<img src="<?= base_url($subcat->photo);?>" height="149" width="168" title="<?= $subcat->subcategory;?>" alt="<?= $subcat->subcategory;?>"/>
							</a>
						<div class="thumbText"><a href="<?= base_url('welcome/ProductBySubID/'.$subcat->subcat_id);?>"><?= $subcat->subcategory;?></a></div>
						
					</div>
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>