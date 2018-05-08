<style>

ul.nav li a {
	display: inline-block;
	color: black;
	text-align: center;
	padding: 7px 8px;
	text-decoration: none;
	transition: 0.3s;
	font-size: 14px;
}
ul.nav li a:hover {
	background-color: #E3DD02;
}
ul.nav li a:focus, .active {
	color: black;
	background-color: #FFF;
}
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
.hover03 a img {
	-webkit-transform: scale(1.5);
	transform: scale(1.5);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover03 a:hover img {
	-webkit-transform: scale(1);
	transform: scale(1);
	z-index: 900;
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
.hover01 a img {
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover01 a:hover img {
	-webkit-transform: scale(1.1);
	transform: scale(1.1);
	display: block;
}
/* Zoom In #2 */
.hover02 a img {
	width: auto;
	height: auto;
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover02 a:hover img {
	width: auto;
}
/* Zoom Out #1 */
.hover13 a img {
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
	max-height: 100px;
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
.imag img {
	padding: 12px;
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
.h5css h6 {
	color: black;
	text-align: center;
}
.h5css span {
	margin-top: -10px;
	color: black;
}
.imgss a img {
	height: 240px;
	width: 210px;
	padding: 10px;
}
.imgss a {
	text-decoration: none;
}

</style>
<link rel="stylesheet" href="<?= base_url('assets/front/');?>css/css/etalage.css">
<script src="<?= base_url('assets/front/');?>js/js/jquery.etalage.min.js"></script>
<script>
      jQuery(document).ready(function($){

        $('#etalage').etalage({
          thumb_image_width: 300,
          thumb_image_height: 400,
          source_image_width: 900,
          source_image_height: 1200,
          show_hint: true,
          click_callback: function(image_anchor, instance_id){
            alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
          }
        });

      });
    </script>

<?php
function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
?>

<style>
#myCarousel .thumbnail {
	margin-bottom: 0;
}
.carousel-control.left, .carousel-control.right {
	background-image: none !important;
}
.carousel-control {
	color: blue;
	top: 40%;
	color: blue;
	bottom: auto;
	padding-top: 4px;
	width: 30px;
	height: 30px;
	text-shadow: none;
	opacity: 1;
}
.carousel-control:hover {
	color: red;
}
.carousel-control.left, .carousel-control.right {
	background-image: none !important;
}
.carousel-control.right {
	left: auto;
	right: -32px;
}
.carousel-control.left {
	right: auto;
	left: -32px;
}
.carousel-indicators {
	bottom: -30px;
}
.carousel-indicators li {
	border-radius: 0;
	width: 10px;
	height: 10px;
	background: #ccc;
	border: 1px solid #ccc;
}
.carousel-indicators .active {
	width: 12px;
	height: 12px;
	background: #3276b1;
	border-color: #3276b1;
}
/*animation*/

.deco a {
	text-decoration: none;
}
.deco li a {
	text-decoration: none;
	color: black;
}
input[type="text"] {
	background-color: #3cbc8d;
	border: medium none;
	box-sizing: border-box;
	color: white;
	margin: -4px 0px 0px 0px;
	padding: 12px;
	width: 100%;
}
</style>


<!-- start1 -->
<div class="bg">
  <div class="container">
    <div class="row">
      <div class="col-sm-2" style="background-color: #FFF;">
        <?php include 'menu.php'; ?>
      </div>
      <div class="col-sm-10">
        <div class="single_top">
          <div class="col-sm-4">
            <div class="grid images_3_of_2">
              
              <ul id="etalage">

                <li style="margin-left: 10px;"> <a href="#"> <img class="etalage_thumb_image" src="<?= base_url($product_description->image);?>" class="img-responsive" /> <img class="etalage_source_image" src="<?= base_url($product_description->image);?>" class="img-responsive" title="" /> </a> </li>

                <li style="margin-left: 10px;"> <a href="#"> <img class="etalage_thumb_image" src="<?= base_url($product_description->image);?>" class="img-responsive" /> <img class="etalage_source_image" src="<?= base_url($product_description->image);?>" class="img-responsive" title="" /> </a> </li>

                <li style="margin-left: 10px;"> <a href="#"> <img class="etalage_thumb_image" src="<?= base_url($product_description->image);?>" class="img-responsive" /> <img class="etalage_source_image" src="<?= base_url($product_description->image);?>" class="img-responsive" title="" /> </a> </li>

                <li style="margin-left: 10px;"> <a href="#"> <img class="etalage_thumb_image" src="<?= base_url($product_description->image);?>" class="img-responsive" /> <img class="etalage_source_image" src="<?= base_url($product_description->image);?>" class="img-responsive" title="" /> </a> </li>

              </ul>
              <div class="clearfix"></div>
            </div>
          </div>

            <div class="col-sm-5 deco" style="padding-left: 10px;">
             
              <h3 style="color: #0ABBB5;"><?= $product_description->prod_name; ?></h3>
              <div>
                <h4 style="color: #FF0961;">Product ID: <?= $product_description->prod_code; ?></h4>
                <p class="availability">Availability: <span class="color">In stock</span></p>
                <div class="price_single">
                	<span>৳ <?= $product_description->prod_price; ?></span>
                </div>
                <h2 class="quick">Quick Overview:</h2>
                <p class="quick_desc"><?= $product_description->prod_desc; ?></p>
                <div class="wish-list"></div>
                
                <div class="row">
                  <div class="col-sm-8">
                    <div class="quantity_box">
                      <ul class="product-qty" style="color: black;">
                        <span>Quantity:</span>
                        <input type="number" value="1" name="product_quantity" min="1" step="1" style="width: 3.631em; text-align: center;">
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="col-sm-4"></div>
                </div>
               
				<a href="<?= base_url('add_cart'.'/'.$product_description->prod_id);?>">
					<button class="btn bt1 btn-primary btn-normal btn-inline">Add to Cart</button>
				</a>
              </div>
              <div class="clearfix"> </div>
            </div>
        </div>
    </div>

          <div class="clearfix"></div>
          <br>
          <br>
          <div role="tabpanel"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"> <a href="#home" aria-controls="home" role="tab" data-toggle="tab"style="color: black; font-size: 18px;">Product Decription</a> </li>
              <li role="presentation"> <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab"style="color: black; font-size: 18px;">Additional Information</a> </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home"> <br>
                <p class="quick_desc" style="margin-left: 15px;"><?= $product_description->prod_desc; ?> </p>
              </div>
              <div role="tabpanel" class="tab-pane" id="tab"> <br>
                <p class="quick_desc" style="margin-left: 15px;"> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. <br>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>			