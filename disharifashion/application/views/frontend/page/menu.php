<style>

nav a {
	text-decoration: none;
	color: #383838;
	display: block;
	font-family: "Helvetica";
	font-size: 11px;
	margin: 0px;
	padding: 0px 0px;
	text-transform: uppercase;
	outline: none;
}
body a:hover {
	color: #CD1F25;
	outline: none;
}
/*nav { background-color: #FFFFFF; }*/

nav ul {
	margin: 3px 3px 3px 0px;
	padding: 0px 0px;
	list-style: none;
	display: none;
}
nav li, nav .nav-toggle {
	text-align: center;
	position: relative;
	display: inline-block;
	cursor: pointer;
	width: 100%;
}
nav .dropdown > a:after {
	content: 'V';
	position: absolute;
	right: 15px;
	-webkit-transform: scaleY(1);
	-ms-transform: scaleY(1);
	transform: scaleY(1);
	-webkit-transition: -webkit-transform 0.2s ease;
	transition: transform 0.2s ease;
}
nav .dropdown.open, .desktop nav li:hover { /*background-color: #ffffff;*/
}
nav .dropdown.open > a:after, .desktop nav li:hover > a:after {
	-webkit-transform: scaleY(-1);
	-ms-transform: scaleY(-1);
	transform: scaleY(-1);
}
nav .dropdown ul {
	position: relative;
	/* background-color: #FFFFFF;*/
	display: none;
}
nav a {
	display: block;
	padding: 5px 5px 8px 5px;
}
nav li a {
	width: 200px;
}
.desktop nav {
	width: 200px;
}
.desktop nav li {
	text-align: left;
	width: 190px;
	z-index: 900;
}
.nav ul li ul li {
	text-decoration: none;
}
.desktop nav li:hover ul {
	-webkit-transform: scaleY(1);
	-ms-transform: scaleY(1);
	transform: scaleY(1);
	visibility: visible;
	padding: 2px;
}
.desktop nav .dropdown:hover > a:after {
	-webkit-transform: rotate(90deg);
	-ms-transform: rotate(90deg);
	transform: rotate(90deg);
}
.desktop nav .dropdown > a:after {
	content: '>';
	-webkit-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition: -webkit-transform 0.2s ease;
	transition: transform 0.2s ease;
}
.desktop nav .dropdown ul {
	top: 0;
	left: 190px;
	position: absolute;
	display: block !important;
	visibility: hidden;
	-webkit-transform: scaleY(0);
	-ms-transform: scaleY(0);
	transform: scaleY(0);
	-webkit-transform-origin: top;
	-ms-transform-origin: top;
	transform-origin: top;
	-webkit-transition: -webkit-transform 0.2s ease;
	transition: transform 0.2s ease;
}
.desktop nav .nav-toggle {
	display: none;
}
</style>

<div class="categoriess" style="margin-top: -3px;">
    <?php 
    	$row_number=1;
        foreach ($All_Category as $category) {
       	$CatID = $category->cat_id;
    ?>

		<nav>
		    <ul>
		      <li class="dropdown">
		      	<a href="<?= base_url('Welcome/ProductByCatId/'.$CatID);?>" style="text-decoration: none; color: black; font-size: 12px; font-family: Arial Narrow,Arial,sans-serif;">
		      			<img src="<?= base_url('assets/front/images/icon/'.$row_number.'.png');?>" height="20" width="20">&nbsp;
			      	<?= $category->category ?>
			    </a>
		        <ul>
			        <?php 
			            $subcategory = $this->db->select('*')->from('subcategory')->where('subcat_catid',$CatID)->get()->result();
						foreach($subcategory as $subcat){ 
						$subcatID=$subcat->subcat_id;           
			        ?>
		        		<li><a href="<?= base_url('Welcome/ProductBySubId/'.$subcatID);?>" style="text-decoration: none; font-size: 12px; color: black; background-color: white; font-family: Arial Narrow,Arial,sans-serif;">
		        			<?= $subcat->subcategory; ?></a>
		        		</li>
		        	<?php } ?>
		        </ul>
		      </li>
		      <?php $row_number++;?>
		    </ul>
		</nav>
    <?php } ?>
</div>

<script>
var dropdown = 'nav li:has(ul)',
    dropdown_ul = 'nav li ul',
    nav_ul = 'nav > ul',
    nav_toggle = 'nav .nav-toggle',
    open_class = 'open',
    desktop_class = 'desktop',
    breakpoint = 640,
    anim_delay = 200;


function isDesktop() {
  return ($(window).width() > breakpoint);
}


$(function() {
  $(document).click(function(e) {
    var target = $(e.target).parent();
    var target_ul = target.children('ul');

    if (!isDesktop()) {
      $(dropdown).not(target).removeClass(open_class);
      $(dropdown_ul).not(target_ul).slideUp(anim_delay);

      if (target.is(dropdown)) {
        target.toggleClass(open_class);
        target_ul.slideToggle(anim_delay);
      }

      if (target.is(nav_toggle)) {
        target.toggleClass(open_class);
        $(nav_ul).slideToggle(anim_delay);
      }
    }
  })

  $(window).resize(function() {
    $('body').toggleClass(desktop_class, isDesktop());

    if (isDesktop()) {
      $(dropdown).removeClass(open_class);
      $(dropdown_ul).hide();
      $(nav_toggle).addClass(open_class);
      $(nav_ul).show();
    }
  });

  $(window).resize();
});
</script>