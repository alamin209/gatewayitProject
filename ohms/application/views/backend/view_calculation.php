<?php 
	if(!empty($message)){
?>
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>

		<i class="ace-icon fa fa-check green"></i>
		<?php echo $message; ?>
	</div>

<?php } ?>

<!-- PAGE CONTENT BEGINS -->
	<div class="row">
		<div class="col-xs-12">
			<div class="table-header">
				<i class="fa fa-list"></i>
				Total Calculation by Month to Month
			</div>
			<div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>SN</th>
							<th>Month</th>
							<th>Total Expense</th>
							<th>Cash In</th>
							<th>View Details</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="center">1</td>
							<td>January</td>
							<td>25000</td>
							<td>5000</td>
							<td>View</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->