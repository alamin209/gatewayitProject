<?php 
	include('header.php');
	
	include "application/libraries/libchart/classes/libchart.php";

	$chart = new PieChart();

	$dataSet = new XYDataSet();
	foreach($product_info as $v_product){

        $dataSet->addPoint(new Point("$v_product->order_status ($v_product->order_total)", $v_product->order_total));
    }	
	
	$chart->setDataSet($dataSet);

	$chart->setTitle("Order Details as Graphical View");
	$chart->render("assets/img/report/order_details.png");
?>
	<div class="clearfix"></div>
	
	<div class="inner_content">
	    <!-- /inner_content_w3_agile_info-->
		<div class="inner_content_w4_agile_info">
		<!-- /agile_top_w3_grids-->
		    <div class="agile_top_w3_grids">
		    	<div class="row">
		    		<div class="col-md-6">
		    			<ul class="ca-menu">
							<li>
								<a href="<?php print base_url('products');?>">							
									<i class="fa fa-building-o" aria-hidden="true"></i>
									<div class="ca-content">
										<h4 class="ca-main"><?php print count($result);?></h4>
										<h3 class="ca-sub">Product's</h3>
									</div>
								</a>
							</li>
							
							<li>
								<a href="<?php print base_url('super_admin/ManageOrder');?>">
									<i class="fa fa-tasks" aria-hidden="true"></i>
									<div class="ca-content">
										<h4 class="ca-main three"><?php print count($result4);?></h4>
										<h3 class="ca-sub three">Order Details</h3>
									</div>
								</a>
							</li>

							<div class="clearfix"></div>
						</ul>
		    		</div>
		    		<div class="col-md-6">
		    			<br>
		    			<div>
							<img alt="Pie chart"  src="<?php echo base_url();?>assets/img/report/order_details.png" style="border: 1px solid gray;"/>
						</div>
		    		</div>
		    	</div>
		    </div>							
	    </div>
	</div>
<?php include('footer.php');?>
