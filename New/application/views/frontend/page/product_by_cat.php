<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="topnavarea">
				<a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /<a href="#" class='txtLocation'>Products</a>
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
					<div class="headtext"><?= $Cat_name->category; ?></div>
                    <input type="hidden" name="cat_id"   cat_id="<?php echo $Cat_name->cat_id; ?>">

					<div class="share">
						<div style="margin-right:80px;float:right;width:80px">
							<iframe src="http://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.upoharbd.com&amp;width=152px&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21&amp;appId=182132298657766" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:152px; height:21px;" allowTransparency="true"></iframe>
						</div>
						<div style="float:left;" class="menudisplay"></div>
						<br clear="all"/>
					</div>
				</div>

				<div class="navigationarea">
					<div class="navigation">
						<div style="float:left;width:50%;padding: 18px 0 0 0;">Total <?php echo count($All_CatProduct);?> Products</div>
						<div style="float:right;width:50%;text-align:right !important;padding: 18px 0 0 0;margin: 0 0 0 0;">
							Sort By: 
							<select class="dropDown" id="sortMethod" class="textbox"   name="categoryid">
							  <option value="">Default</option>
							  <option value="low">Price - Low to High</option>
							  <option value="high">Price - High to Low</option>
							  <option value="code">Product Code</option>
							  <option value="lat">Latest</option>
							</select>
						</div>
						<br clear="all"/>
					</div>
				</div>

				<div class="innerproductarea" id="example">
				
					<?php
						foreach($All_CatProduct as $product){
					?>
						<div class="actualProduct">
							<div class="productpic">
								<a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">
									<img src="<?= base_url($product->image);?>" alt="<?= $product->prod_name; ?>" border="0" title="<?= $product->prod_name; ?>" />
								</a>
							</div>
							<br clear="all"/>
							<div class="productshortdis">
								<h2 style="font-size:18px;min-height:80px;">
									<a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">
										<?= $product->prod_name; ?>
									</a>
								</h2>
								<div class="price"><span style="font-size:18px;"> Tk ৳<?= $product->prod_price; ?> <div class="txtSale"></div></span></div>
								<?php echo substr(strip_tags($product->prod_desc,'<p><em><a><br/><b><strong>'),0,100); ?>
								&hellip;<a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">Details</a> <br /><span class="CatBoxStock" style="color:red;"></span>
							</div>
							<div class="clear"></div>
							<br clear="all"/>
						</div>
					<?php } ?>
					<br clear="all"/>
				</div>
			
			</div>

			<!--<div id="load_more" style="cursor:pointer;margin-bottom:10px;border:#dcdcdc 1px solid;width:98%;text-align:center;padding:10px;background-color:#fafafa;">Click Here to Load More Products</div>

			<div id="script_loading" style="display:none;margin-bottom:10px;border:#dcdcdc 1px solid;width:98%;text-align:center;padding:10px;background-color:#fafafa;">Loading&nbsp;&nbsp;<img src="inc/images/ajax-loader.gif"/></div>

			<div id="script_finished" style="display:none;margin-bottom:10px;border:#dcdcdc 1px solid;width:98%;text-align:center;padding:10px;background-color:#fafafa;">Showing 148 products</div>-->

			<script>

				function resetFinished(){
					document.getElementById("finished_loading").value=0;
				}

				$j(document).ready(function() {
				var loading  = false; //to prevents multipal ajax loads
				var total_pages = 13;
				var finished = document.getElementById("finished_loading").value;

						$j(window).bind('scroll', function() {

							var finished = document.getElementById("finished_loading").value;
							if($j(window).scrollTop() >= $j('.productlisting').offset().top + $j('.productlisting').outerHeight() - window.innerHeight && finished < total_pages && loading==false) {
							loading = true;
							document.getElementById("load_more").style.display = "none";
							document.getElementById("script_loading").style.display = "block";
							var searchPage = document.getElementById("search_str").value;
							if(searchPage==1){
							var dataString = 'page=' + finished + '&ajax_load=1' + '&_a=viewCat' + '&searchStr='; 
							}else{
							var dataString = 'page=' + finished + '&ajax_load=1' + '&_a=viewCat' + '&catId=184'; 
							}

								$j.ajax({  
									type: "GET",  
									url: "https://www.upoharbd.com/index.php?",  
									data: dataString,  
									success: function(theResponse) {


									$j(theResponse).hide().appendTo("#productlisting").fadeIn(500);

									$j("#finished_loading").val(parseInt($j("#finished_loading").val()) + 1);

									var finished = document.getElementById("finished_loading").value;




									loading = false;

									document.getElementById("script_loading").style.display = "none";

									document.getElementById("load_more").style.display = "block";

									if(finished == total_pages){
									document.getElementById("script_finished").style.display = "block";
									document.getElementById("load_more").style.display = "none";
									}


									}  

								});  

							}
						});


						$j("#load_more").click(function() {
						
							var finished = document.getElementById("finished_loading").value;
							
							if(finished < total_pages && loading==false) {
					
							loading = true;
					
							document.getElementById("load_more").style.display = "none";

							document.getElementById("script_loading").style.display = "block";


							var searchPage = document.getElementById("search_str").value;
							
							if(searchPage==1){
							var dataString = 'page=' + finished + '&ajax_load=1' + '&_a=viewCat' + '&searchStr='; 
							}else{
							var dataString = 'page=' + finished + '&ajax_load=1' + '&_a=viewCat' + '&catId=184'; 
							}

						
								$j.ajax({  
									type: "GET",  
									url: "https://www.upoharbd.com/index.php?",  
									data: dataString,  
									success: function(theResponse) {
					
									$j(theResponse).hide().appendTo("#productlisting").fadeIn(500);
					
									$j("#finished_loading").val(parseInt($j("#finished_loading").val()) + 1);
					
									var finished = document.getElementById("finished_loading").value;

									loading = false;
					
									document.getElementById("script_loading").style.display = "none";
					
									document.getElementById("load_more").style.display = "block";

									if(finished == total_pages){
									document.getElementById("script_finished").style.display = "block";
									document.getElementById("load_more").style.display = "none";
									}

									}  
					
								});  
						
								}
						});

				});
			</script>
            <script>
                $(document).ready(function() {

                    $('select[name="categoryid"]').on('change', function() {

                        var stateID = $(this).val();
                        var cat_id ="<?php echo $Cat_name->cat_id; ?>";
                        if(stateID) {

                            $.ajax({
                                url:"<?php echo base_url() ?>Welcome/sortingCatIdProduct/",
                                data:{id:stateID,cat_id:cat_id},
                                type: "POST",
                                success:function(data) {
                                    $('#example').html(data);
                                }

                            });

                        }

                    });

                });
            </script>


            <input type="hidden" id="finished_loading" value="1"/>
			<input type="hidden" id="search_str" value="0"/>

			<script>
				document.getElementById("finished_loading").value = 1;
			</script>

		</div>
		<div class="clear"></div>
	</div>
</div>

