<?php include('header.php'); ?>

<style type="text/css">
        
        body,td,input,select {
            font-family: Tahoma;
            font-size: 11px;
            color: #000000;
        }

        form {
            margin: 0px;
        }

        a {
            color: #000000;
        }

        #wrapper {
            width: 600px;
        }

        #invoicetoptables {
            width: 100%;
            background-color: #cccccc;
            border-collapse: seperate;
        }

        td#invoicecontent {
            background-color: #ffffff;
            color: #000000;
            font-size: 14px;
            padding: 10px;
        }

        #invoicecontent strong{
            text-transform: uppercase;
            font-size: 18px;
            color: green;
        }

        .unpaid {
            font-size: 16px;
            color: #cc0000;
            font-weight: bold;
        }

        .paid {
            font-size: 16px;
            color: #779500;
            font-weight: bold;
        }

        .refunded {
            font-size: 16px;
            color: #224488;
            font-weight: bold;
        }

        .cancelled {
            font-size: 16px;
            color: #cccccc;
            font-weight: bold;
        }

        .collections {
            font-size: 16px;
            color: #ffcc00;
            font-weight: bold;
        }

        #invoiceitemstable {
            width: 100%;
            background-color: #cccccc;
            border-collapse: seperate;
        }

        td#invoiceitemsheading {
            background-color: #efefef;
            color: #000000;
            font-weight: bold;
            text-align: center;
        }

        td#invoiceitemsrow {
            background-color: #ffffff;
            color: #000000;
        }

        .creditbox {
            border: 1px dashed #cc0000;
            font-weight: bold;
            background-color: #FBEEEB;
            text-align: center;
            width: 100%;
            padding: 10px;
            color: #cc0000;
            margin-left: auto;
            margin-right: auto;
        }

        #prod_info td{

            text-align: center;
            font-size: 14px;

        }

        #summary tr td{
            font-size: 14px;
        }

    </style>
<body>
    <div class="inner_content">
        <!-- /inner_content_w3_agile_info-->
        <div class="inner_content_w3_agile_info">
            <!-- /agile_top_w3_grids-->
            <div class="agile_top_w3_grids">
                
                <div class="block-content collapse in">              
                    <div class="span12">

                        <table cellspacing="1" width="80%" cellpadding="10" border="1px" align="center">
                            <tbody>
                                <tr>
                                    <td bgcolor="#ffffff">

                                        <h2>Order View</h2>
                                        <hr/><br>

                                        <?php

                                            //shipping district & shipping cost
                                            $district =  $shipping_info->district;
                                            $row = $this->db->select('*')->from('states')->where('id',$district)->get()->row();
                                            $shipping_cost = $row->shipping_cost;
                                            $st_name = $row->st_name;

                                            //customer country & district
                                            $country =  $customer_info->country;
                                            $row = $this->db->select('*')->from('countries')->where('id',$country)->get()->row();
                                            $country_name = $row->con_name;

                                            $cus_district =  $customer_info->district;
                                            $row = $this->db->select('*')->from('states')->where('id',$cus_district)->get()->row();
                                            $district_name = $row->st_name;

                                            $shipping_district = $shipping_info->district;
                                            $row = $this->db->select('*')->from('states')->where('id',$shipping_district)->get()->row();
                                            $dis_name = $row->st_name;
                                        ?>

                                        <table width="80%" id="invoicetoptables" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" id="invoicecontent" style="border:1px solid #cccccc">

                                                        <table width=100%" height="100" cellspacing="0" cellpadding="10" id="invoicetoptables">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="50%" valign="top" id="invoicecontent" style="border:1px solid #cccccc">
                                                                        <strong><u>Invoice To</u></strong><br>
                                                                        <b>Name :</b> <?php echo $customer_info->firstname.' '.$customer_info->lastname?><br>
                                                                        <b>Email :</b> <?php echo $customer_info->email_address?><br>
                                                                        <b>Mobile :</b> <?php echo $customer_info->mobile_no?><br>
                                                                        <b>Address :</b> <?php echo $customer_info->address?>,<?php echo $customer_info->zip_code?><br>
                                                                        <b>Country :</b> <?php echo $country_name; ?><br>
                                                                        <b>District :</b> <?php echo $district_name;?>
                                                                    </td>

                                                                    <td width="25%" valign="top" id="invoicecontent" style="border:1px solid #cccccc">

                                                                        <strong><u>Ship To</u></strong><br>
                                                                        <b>Name :</b> <?php echo $shipping_info->name?><br>
                                                                        <b>Email :</b> <?php echo $shipping_info->email?><br>
                                                                        <b>Mobile :</b> <?php echo $shipping_info->phone?><br>
                                                                        <b>Address :</b> <?php echo $shipping_info->address?>, <br>
                                                                        <b>District :</b> <?php echo $dis_name; ?>, <br>
                                                                        <b>City :</b> <?php echo $shipping_info->city?>
                                                                    </td>

                                                                    <td valign="top" id="invoicecontent" style="border:1px solid #cccccc">
                                                                        <strong><u>Other</u></strong><br>
                                                                        <b>Take Photo :</b> <?php echo $shipping_info->take_photo?><br>
                                                                        <b>Call :</b> <?php echo $shipping_info->give_call?><br>
                                                                        <b>Delivery Time :</b> <?php echo $shipping_info->del_time?><br>
                                                                        <b>Delivery Date :</b> <?php echo $shipping_info->del_date?>, <br>
																		
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                            
                                                </tr>
                                            </tbody>
                                        </table>

                                        <p><strong><u>Invoice</u> #inv-<?php echo $order_info->order_id?></strong><br>
                                            <b>Invoice Date :</b> <?php echo $order_info->order_date?><br>
                                            <b>Due Date :</b> <?php echo date('Y-m-d', strtotime($order_info->order_date. ' + 7 day'))?>
                                        </p>
                                        <hr/>
                                        <h2>Order Details</h2>
                                        <hr/>

                                        <table class="table table-striped table-bordered table-hover roni" border="1" width="100%" id="invoicetoptables" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="image">Image</th>
                                                    <th class="name">Product Name</th>
                                                    <th class="quantity">Quantity</th>
                                                    <th class="quantity">Optional</th>
                                                    <th class="price">Unit Price</th>
                                                    <th class="total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $total=0;
                                                    foreach($order_details_info as $v_order_info){
                                                ?>
                                                <tr id="prod_info">
                                                    <td class="image">
                                                        <?php
                                                            if(!empty($v_order_info->product_image)){ ?>

                                                                <a href="#">
                                                                    <img src="<?php echo base_url().$v_order_info->product_image;?>" width="50" height="50"  alt="" />
                                                                </a>

                                                        <?php }else{

                                                                echo "";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="name">
														<?php
															echo $v_order_info->product_name.'<br>';
															
															$flaver = $this->db->select('*')->from('tbl_flover_weight')->where('fw_id',$v_order_info->flaver)->get()->row();

															$weight = $this->db->select('*')->from('tbl_flover_weight')->where('fw_id',$v_order_info->weight)->get()->row();
															
															if(!empty($flaver)){
																echo 'Flaver: '.$flaver->flaver.'<br>';
															}else{
																echo "";
															}
															if(!empty($weight)){
																echo 'Weight: '.$weight->weight.'<br>';
															}else{
																echo "";
															}
														?>
                                                    </td>
                                                    
                                                    <td class="quantity">
                                                       <?php echo $v_order_info->product_sales_quantity;?>
                                                    </td>
                                                    <td class="optional">
                                                        <?php echo $v_order_info->product_optional;?>
                                                    </td>

                                                    <td class="price">
                                                        BDT <?php echo $v_order_info->product_price;?>
                                                    </td>
                                                    <td class="total">
                                                        BDT <?php echo $v_order_info->product_sales_quantity * $v_order_info->product_price;?>
                                                    </td>
                                                </tr>
                                                <?php
                                                
                                                    $total = $total+$v_order_info->product_sales_quantity * $v_order_info->product_price;
                                                
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>

                                        <table  align="right" width="30%" border="1px" id="summary">
                                            <tbody>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="right"><b>Sub-Total :</b></td>
                                                    <td class="right numbers">BDT

                                                        <?php echo $total;?></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="right"><b>Shipping Cost :</b></td>
                                                    <td class="right numbers">
                                                        <?php
                                                            echo 'BDT '.$shipping_cost;
                                                        ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td class="right numbers_total"><b>Grand Total :</b></td>
                                                    <td class="right numbers_total">
                                                        <?php foreach ($orders_id as $orders_id)
                                                        { ?>

                                                            BDT <?php  echo $orders_id->  order_total + $shipping_cost; ?>
                                                      <?php  }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <?php
                                            if($order_info->order_status == 'pending'){ ?>

                                            <table  align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="right">
                                                            <button class="btn btn-danger">
                                                            Order Status:
                                                            </button>
                                                        </td>
                                                        <td class="right numbers">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primary" type="button"
                                                                    data-toggle="dropdown">Delivery Pending <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="<?= base_url('super_admin/ProductDelivered/'.$order_info->order_id) ?>">
                                                                            Product Delivered
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url('super_admin/CancleOrder/'.$order_info->order_id) ?>">
                                                                            Cancel Order
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        <?php } ?>

                                    </td>
                                </tr>
                            </tbody>
                       </table>
                        <p style="color:red ; text-align:right"> *500tk   Charge will be added for Foodcourt & Grocery  </p>
                    </div>
                </div>
            </div>                       
        </div>                          
    </div><!-- //inner_content_w3_agile_info-->

<?php include('footer.php'); ?>