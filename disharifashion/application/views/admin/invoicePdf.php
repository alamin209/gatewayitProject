<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tanuki Billing Template</title>
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/invoicePdfstyle.css" media="all" />

    <!--bootstrap -->
    <link href="<?php echo base_url()?>public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>public/js/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="header" class="clearfix">
    <div  id="logo">
        <img src="<?php echo base_url()?>assets/front/images/Dishari.png?>">
    </div>

    <div id="company">
        <h1 class="name">dishari fashion</h1>
        <div>Location:H#162/A,Sultanganji Road,</div>
        <div>Rayer Bazar,Dhaka</div>
        <div>Cell: +8801795-802841</div>
        <div><a href="mailto:as7453592@gmail.com"> Email: as7453592@gmail.com</a></div>
    </div>

</div>
<main>

    <?php

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



<!--    --><?php //foreach ($orders as $allOrder){?>
        <div id="details" class="clearfix">

            <div class="row">
            <div id="client" class="col-sm-4" >
                <div class="to">INVOICE TO:</div>
                <h2 class="name"><?php echo $customer_info->firstname.' '.$customer_info->lastname?></h2>
                <div class="address"><?php echo $customer_info->address?>,<?php echo $customer_info->zip_code?>,<?php echo $district_name;?>,<?php echo $country_name; ?> </div>
                <div class="email"><a href="mailto:<?php echo $customer_info->email_address?>"><?php echo $customer_info->email_address?></a></div>
            </div>

<!--            <div id="invoice">-->
<!--                <h1>ORDER# --><?php //echo $order_info->order_id?><!--</h1>-->
<!--                <div class="date">Date of Invoice: Invoice Date :</b> --><?php //echo $order_info->order_date?><!--</div>-->
<!--                <div class="date">Due Date :</b> --><?php //echo date('Y-m-d', strtotime($order_info->order_date. ' + 7 day'))?><!--</div>-->
<!---->
<!--            </div>-->
            <div id="client" class="col-sm-4">

                <div class="to"> Ship  TO:</div>
                <h2 class="name"><?php echo $shipping_info->name?>Mobile:<?php echo $shipping_info->phone?></h2>
<!--                <div class="phone"> </div>-->
                <div class="address"><?php echo $shipping_info->address?>,<?php echo $dis_name; ?>,<?php echo $shipping_info->city?></div>
                <div class="email"><a href="mailto:<?php echo $shipping_info->email?>"><?php echo $shipping_info->email?><</a></div>
            </div>
            <div id="client" class="col-sm-4">
                <div class="to">Order</div>
                <div>No.<?php echo $order_info->order_id?></div>
                <div class="date">Invoice Date :</b> <?php echo $order_info->order_date?></div>
                <div class="date">Due Date :</b> <?php echo date('Y-m-d', strtotime($order_info->order_date. ' + 7 day'))?></div>

            </div>
            </div>
        </div>


        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th ="no">#</th>

                <th class="image">Image</th>
                <th class="desc">PRODUCT NAME</th>
                <th class="unit">UNIT PRICE</th>
                <th class="qty">QUANTITY</th>
<!--                <th class="prices">Discount</th >-->
                <th class="total">TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total=0;
            $i=0;
            $i=1;
            foreach( $order_details_info as $v_order_info) {
                ?>
                <tr>
                    <td class="no"><?php echo $i ?></td>
                    <td class="image"><a href="#">
                            <img src="<?php echo $v_order_info->product_image; ?>" width="50" height="50"/>
                        </a></td>
                    <td class="desc"><h3> <?php echo $v_order_info->product_name; ?></h3></td>
                    <!--                    <td class="unit">$--><?php //echo $orderItems->rate
                    ?><!--</td>-->
                    <td class="qty"><?php echo $v_order_info->product_sales_quantity; ?></td>
                    <td class="prices">BDT <?php echo $v_order_info->product_price; ?></td>
                    <td class="total"><?php echo $v_order_info->product_sales_quantity * $v_order_info->product_price; ?></td>
                </tr>
                <?php
                $i++;

                $total = $total + $v_order_info->product_sales_quantity * $v_order_info->product_price;


            }

            ?>
            </tbody>

            <tfoot>

            <tr>
                <td colspan="1"></td>
                <td colspan="4">SUBTOTAL</td>
                <td>$BDT <?php echo $total;?></td>
            </tr>
<!--            <tr>-->
                <td colspan="1"></td>
                <td colspan="4">GRAND TOTAL</td>
                <td><?php echo 'BDT&nbsp;'.$total; ?></td>
            </tr>

            </tfoot>

        </table>



    <div id="thanks">Thank you!</div>

</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>