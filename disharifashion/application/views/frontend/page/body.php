<?php include 'slider.php'; ?>
<style>
body {
	font-family: "Lato", sans-serif;
	color: #DEBCEE;
}
/* Style the links inside the list items */
ul.nav li a {
	display: inline-block;
	color: black;
	text-align: center;
	padding: 7px 8px;
	text-decoration: none;
	transition: 0.3s;
	font-size: 14px;
}
/* Change background color of links on hover */
ul.nav li a:hover {
	background-color: #E3DD02;
}
/* Create an active/current tablink class */
ul.nav li a:focus, .active {
	color: black;
	background-color: #FFF;
}
/* Style the tab content */
.tabcontent {
	display: none;
	padding: 6px 12px;
	-webkit-animation: fadeEffect 1s;
	animation: fadeEffect 1s;
	color: black;
}
.tab-content a img {
	height: 80px;
	width: 100px;
	/*padding: 20px 30px;*/
	margin: 20px 25px;
}
.tab-content a:hover {
	background-color: red;
}
.colors p {
	color: #F17E0A;
}
.c {
	background-color: black;
}
@-webkit-keyframes fadeEffect {
from {
opacity: 0;
}
to {
	opacity: 1;
}
}
@keyframes fadeEffect {
from {
opacity: 0;
}
to {
	opacity: 1;
}
}
input[type=text] {
	width: 100%;
	padding: 12px 12px;
	margin: 4px 0;
	box-sizing: border-box;
	border: none;
	background-color: #3CBC8D;
	color: white;
}
.column {
	margin: 15px 15px 0;
	padding: 0;
}
.column:last-child {
	padding-bottom: 60px;
}
.column::after {
	content: '';
	clear: both;
	display: block;
}
.column div {
	position: relative;
	float: left;
	margin: 0 0 0 25px;
	padding: 0;
}
.column div:first-child {
	margin-left: 0;
}
.column div span {
	position: absolute;
	bottom: -20px;
	left: 0;
	z-index: -1;
	display: block;
	width: 300px;
	margin: 0;
	padding: 0;
	color: #444;
	font-size: 18px;
	text-decoration: none;
	text-align: center;
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
	opacity: 0;
}
figure {
	margin: 0;
	padding: 0;
	background: #fff;
	overflow: hidden;
}
figure:hover+span {
	bottom: -36px;
	opacity: 1;
}
/* Circle */
.hover15 figure {
	position: relative;
}
.hover15 figure::before {
	position: absolute;
	top: 50%;
	left: 50%;
	z-index: 2;
	display: block;
	content: '';
	width: 0;
	height: 0;
	background: rgba(255,255,255,.2);
	border-radius: 100%;
	-webkit-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	opacity: 0;
}
.hover15 figure:hover::before {
	-webkit-animation: circle .75s;
	animation: circle .75s;
}
@-webkit-keyframes circle {
0% {
opacity: 1;
}
40% {
opacity: 1;
}
100% {
width: 200%;
height: 200%;
opacity: 0;
}
}
@keyframes circle {
0% {
opacity: 1;
}
40% {
opacity: 1;
}
100% {
width: 200%;
height: 200%;
opacity: 0;
}
}
/* Zoom Out #1 */
.hover01 a img {
	-webkit-transform: scale(1.5);
	transform: scale(1.5);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover01 a:hover img {
	-webkit-transform: scale(1);
	transform: scale(1);
}
/* Zoom Out #2 */
.hover04 figure img {
	width: 400px;
	height: auto;
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover04 figure:hover img {
	width: 300px;
}
/* Zoom In #1 */
.hover1311 a img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover1311 a:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.3);
}
/* Zoom In #2 */
.hover132 a img {
	width: 300px;
	height: auto;
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover132 a:hover img {
	width: 350px;
}
/* Zoom Out #1 */
.hover131 a img {
	-webkit-transform: scale(1.5);
	transform: scale(1.5);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover13 a:hover img {
	-webkit-transform: scale(1);
	transform: scale(1);
}
p {
	color: black;
}
.imgs {
	max-height: 195px;
}
.textdec ul li a {
	text-decoration: none;
	text-transform: uppercase;
	font-size: 12px;
	color: #312F3D;
}
.textdec ul li {
	padding: 0 10px 0 10px;
}
.imag a figure img {
	height: 200px;
	width: 180px;
	padding: 10px;
}
.imag11 a figure img {
	margin-top: 1.5px;
}
.container h3, p {
	color: #666666;
}
.colors ul li a {
	text-align: left;
	font-size: 12px;
	color: #312F3D;
	padding-bottom: 10px;
}
</style>

<br>

<!-- 1st body item (start)-->

<div class="container">

	<?php
		foreach ($All_Category as $category) {
		$CatID = $category->cat_id;
	?>

	    <div class="row">
		    <!--Left Menu Start-->
		    <div class="col-sm-2">
		      <div class="row">
		        <div class="col-sm-12 colors">
		          <center>
		            <p style="background-color: #0072bc; text-transform: uppercase; color: #ffffff; font-size: 18px; font-family: Arial Narrow,Arial,sans-serif; padding: 15px;margin-top: 20px;margin:10px;">
		            	<?= $category->category; ?>
		            </p>
		          </center>

		            <?php
						$subcategory = $this->db->select('*')->from('subcategory')->where('subcat_catid',$CatID)->get()->result();
						foreach($subcategory as $subcat){ 
						$subcatID=$subcat->subcat_id;
					?>
				
				        <a href="<?= base_url('Welcome/ProductBySubId/'.$subcatID);?>" style="text-decoration: none;">
				          	<p style="text-transform: uppercase; color: #5C3000; font-size: 15px; font-family: Arial Narrow,Arial,sans-serif;"><img src="<?= base_url('assets/front/');?>images/product.png" height="24" width="24">
				          	<?= $subcat->subcategory; ?></p>
				        </a>

				    <?php } ?>

		        </div>
		      </div>
		    </div>
		    <!--Left Menu End-->

		    <!--Image Middle Start-->
		    <div class="col-sm-4 hover15">
		        <h3 class="text-center" style="text-transform: uppercase; border-bottom: double #008081; color: #008081; margin: 0 8px 13px 0;"><?= $category->category; ?></h3>
		      <a href="<?= base_url('Welcome/ProductByCatId/'.$CatID);?>">
		      <figure><img width=100%; height=100%; style="margin-left: -8px; border:1px solid #e2e2e2;" class="img-responsive" src="<?= base_url($category->cat_image);?>"></figure>
		      </a><br>
		    </div>
		    <!--Image Middle End-->
		    <div class="col-sm-6" style="padding: 10px 0 5px 2px;">
		      <div class="row">

		      	<?php
					$ProductByCat = $this->db->select('*')->from('product')->where('prod_catid',$CatID)->limit(6)->get()->result();
					foreach($ProductByCat as $product){
				?>

		        <div class="col-sm-6 col-md-4 text-center">
		            <div class="textdec  glow text-center">
		            	<p><a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>" style="text-decoration: none; background-color: #e2e2e2; font-size: 15px; padding:0 0 0 5px; font-family: Arial Narrow,Arial,sans-serif;"><?= $product->prod_name ?></a></p>
			            <div class="imags" style=" border:1px solid #e2e2e2; height: 220px; width: 180px; padding: 10px; margin-top: 10px;">
			            	<a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">
			            		<figure><img class="img-responsive" src="<?= base_url($product->image);?>" width="100%"></figure>
			            	</a><br>
			            	<p><?= 'BDT '.$product->prod_price ?></p>
			            </div>
		            </div>
		        </div>

		        <?php } ?>

		      </div>
		    </div>

	    </div><hr>

    <?php } ?>

  <div class="vertical_line"></div>
  <style> .vertical_line{height:1px; width:100%;background:#DCDCDC;} </style>
</div>
<br>
<!-- 1st body item (end)-->