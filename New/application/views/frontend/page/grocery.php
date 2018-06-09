
<script type="text/javascript">
	function updatesum() {
		document.depositeform.totaladdition.value = (document.depositeform.qty.value -0) * 420 + (document.depositeform.qty2.value -0) * 500 +(document.depositeform.qty3.value -0) * 100;
	}
</script>

<form name="depositeform" action="<?= base_url('add_cart/add_grocary/');?>" method="post">

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td width="2%">&nbsp;</td>
				<td width="54%">&nbsp;</td>
				<td width="28%">&nbsp;</td>
				<td width="16%">&nbsp;</td>
			</tr>

			<tr class="listtexttop">
				<td bgcolor="#ff6a00">&nbsp;</td>
				<td align="left" bgcolor="#ff6a00">Name</td>
				<td align="left" bgcolor="#ff6a00">Price / Unit</td>
				<td bgcolor="#ff6a00">Quantity</td>
			</tr>

			<tr class="listdesign">
				<td align="center">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="center">&nbsp;</td>
			</tr>

			<tr class="listdesign">
				<td align="center">&nbsp;</td>
				<td align="left">Regular Rice (নাজেরসাইয়ের)</td>
				<td align="left">Tk ৳420.00&nbsp;/&nbsp;1 Kg</td>
				<td align="center">
					<select name="qty[]" id="qty" onchange="updatesum()">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</td>
				<input type="text" name="item_name[]" value="Regular Rice (নাজেরসাইয়ের)" />
				<input type="text" name="item_price[]" value="Tk ৳420.00" />
				<input type="text" name="item_totalprice[]" value="420" />
			</tr>

			<tr class="listdesign">
				<td align="center">&nbsp;</td>
				<td align="left">beef</td>
				<td align="left">Tk ৳500.00&nbsp;/&nbsp;1 Kg</td>
				<td align="center">
					<select name="qty[]" id="qty2" onchange="updatesum()">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</td>
				<input type="text" name="item_name[]" value="beef" />
				<input type="text" name="item_price[]" value="Tk ৳500.00" />
				<input type="text" name="item_totalprice[]" value="500" />
			</tr>

			<tr class="listdesign">
				<td align="center">&nbsp;</td>
				<td align="left">DAAL</td>
				<td align="left">Tk ৳100.00&nbsp;/&nbsp;1 Kg</td>
				<td align="center">
					<select name="qty[]" id="qty3" onchange="updatesum()">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</td>
				<input type="text" name="item_name[]" value="DAAL" />
				<input type="text" name="item_price[]" value="Tk ৳100.00" />
				<input type="text" name="item_totalprice[]" value="100" />
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td height="25">&nbsp;</td>
				<td height="25" align="left">&nbsp;</td>
				<td height="25" align="right" class="listtext">Product Total:</td>
				<td height="25">
					<span style="margin-left:10px;"><span id="total_price">Tk ৳0.00</span>
					<input type="hidden" name="blank_price" id="blank_price" value="Tk ৳0.00"></span>
				</td>
			</tr>

			<tr>
				<td height="25">&nbsp;</td>
				<td height="25" align="left">&nbsp;</td>
				<td height="25" align="right" class="listtext"> Service Charge: </td>
				<td height="25"><span class="listtext" style="margin-left:10px;"><span id="base_price_text"><b>Tk ৳547.50</b></span><input type="hidden" name="base_price" id="base_price" value="547.50"></span></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr class="listdesign2" style="height:35px">
				<td>&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="right" class="listtext2">Package Total: </td>
				<td>
					<input name="totaladdition" value="0" id="totaladdition" readonly>
				</td>
			</tr>


			<tr class="listdesign2" style="height:35px">
				<td>&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="right" class="listtext2"></td>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</tbody>
	</table>

</form>