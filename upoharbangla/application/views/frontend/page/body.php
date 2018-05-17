<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="catarea">
				<div class="categorylist">
					<?php
						error_reporting(0);
						foreach($All_Category as $category){
							$CatID = $category->cat_id;

							$SelectSubCat = $this->db->select('*')->from('subcategory')->where('subcat_catid',$CatID)->get()->row();

							$SubCatID = $SelectSubCat->subcat_catid;

							if($CatID == 43){ ?>

								<div id="thumbHomePage">
									<a href="<?= base_url('Grocery_item/Grocery/');?>">
										<img src="<?= base_url($category->cat_image);?>" title="Upohar Bangla" alt="img" width="168px" height="149px"/>
									</a>
									<div class="thumbText">
										<a href="<?= base_url('Grocery_item/Grocery/');?>"><?= $category->category;?></a>
									</div>
								</div>

							<?php }elseif(empty($SubCatID)){ ?>
							
								<div id="thumbHomePage">
									<a href="<?= base_url('welcome/ProductByCatID/'.$CatID);?>">
										<img src="<?= base_url($category->cat_image);?>" title="Upohar Bangla" alt="img" width="168px" height="149px"/>
									</a>
									<div class="thumbText">
										<a href="<?= base_url('welcome/ProductByCatID/'.$CatID);?>"><?= $category->category;?></a>
									</div>
								</div>
							
							<?php }else{ ?>
							
								<div id="thumbHomePage">
									<a href="<?= base_url('welcome/SubCategory/'.$CatID);?>">
										<img src="<?= base_url($category->cat_image);?>" title="Upohar Bangla" alt="img" width="168px" height="149px"/>
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
		</div>
	</div>
</div>

<div class="container aboutpadding">
	<div class="row">
		<div class="col-md-12 aboutusarea">
			<div class="aboutservices">About Our service</div>
			<div class="col-md-4 aboutus">
				<p>Upoharbangla.com(উপহারবাংলা.কম) is on of the
					leadership oneline stores in Bangladesh.We are providing gift delivery
					service in Bangladesh.We are started our journey from a
					medium shope in Dhaka.Which is now serving more peoples of our customers
					in the world and every people can send gifts to their friends and
					families living in Bangladesh.Our every honorable coustomer can now
					place oneline gift orders from United States,United
					Kingdom,Newzealand,Canada,Australia,Denmark,Russia,Singapore,European,Bangladesh
					and all countries in the world.We provide gift delivery service in all
					cities of Bangladesh occasions such as valentines day,mother’s
					day,father’s day, birthday, anniversary,wedding,pohela boishak, new
					year,chirstmas day and etc.We also provide corporate gift delivery
					service in Bangladesh.You can right place same day or urgent gift order
					in Dhaka cities.We are committed to care and we carefully reach your
					destination lovely gift and it’s our goal.Visit www.upoharbangla.com
					[1] for order and more information about gift delivery service of
					Bangladesh</p>

					<p>Upoharbangla gift delivers flowers,food items,cakes,sweets,dress
					helthcare item in all cities of Bangladesh.From 6 am to 10 pm at
					night.Dhaka metro area are gift delivery free.All gifts items and
					flowers supply from Dhaka if the order is for other cities.For
					deliveries to outside of Dhaka,delivery charge will be added during
					checkout.</p>
			</div>
			<div class="col-md-4 center"><img src="<?= base_url('assets/front/');?>images/Bangladesh.jpg" alt="" width="285px" height="400px" /></div>
			<div class="col-md-4 aboutus">
				<p><b># SAFE PAYMENT OPTION</b><br>
				We are committed to ensure the security of your information.Shopping at
				upoharbangla.com [2] is 100% safe. All Credit card and Debit card
				payments on upoharbangla.com [2] are processed through secure and
				trusted payment gateways. You can be assured that upoharbangla offers
				you the highest standards of security currently available on the
				internet so as to ensure that your shopping  [3]experience is safe and
				secure</p>

				<p><b># Our staff quality</b><br>
				We have permanent and part-time staffs. All of our staffs are student at
				various universities in Dhaka. Everybody know their job very well, they
				are always well dressed smiling face and their better manner are most
				happy every gift recipients.</p>

				<p>Upoharbangla give not only better service keep better products quality
				any others.Customers happness and satisfaction are upoharbangla's
				goal.We always provide great service for everybody stay with us.</p>
			</div>
		</div>
	</div>
</div>