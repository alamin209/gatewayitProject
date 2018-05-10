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

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			<i class="fa fa-list"></i>
			User List
			<span class="add-new-record">
				<i class="fa fa-plus"></i>
				<a class="white" href="<?php echo base_url(); ?>">
					Add New Record
				</a>
			</span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Member Name</th>
						<th>Date</th>
						<th>Payment For</th>
						<th>Total Payable</th>
						<th>Total Paid</th>
						<th>Due</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$count=1;
						foreach($all_payment as $payment){ ?>
						<tr>
							<td class="center"><?= $count++; ?></td>
							<td><?= $payment->first_name.' '.$payment->last_name;?></td>
							<td><?= $payment->payment_date;?></td>
							<td><?= $payment->payment_for;?></td>
							<td>6500</td>
							<td><?= $payment->total_payment;?></td>
							<td>1500</td>
							<td>Not Paid</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>