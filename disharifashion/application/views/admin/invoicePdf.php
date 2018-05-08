<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Order Details Template</title>
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/invoicePdfstyle.css" media="all" />

    <!--bootstrap -->
    <link href="<?php echo base_url()?>public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>public/js/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="header" class="clearfix">

    <div id="company">
        <h1 class="name">Gateway</h1>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
    </div>

</div>
<main>

        <?php foreach ($orders as $allOrder){?>
            <div id="details" class="clearfix">

                <div id="client">
                    <div class="to">INVOICE TO:</div>
                     <h2 class="name">Customer Name:<?php echo $allOrder->firstname?> <?php  echo $allOrder->lastname ?> </h2>
                     <div class="address">Address: <?php echo $allOrder->address?>, Mobile No:<?php echo $allOrder->mobile_no?>,</div>
                    <div>Total Amount:<?php echo $allOrder->order_total ?>Tk</div>
                    <div class="email">Email:<a href="mailto:<?php echo $allOrder->email_address?>"><?php echo $allOrder->email_address?></a></div>
                </div>

                <div id="invoice">
<!--                    <h1>ORDER# --><?php //echo $allOrder->id ?><!--</h1>-->
                    <div class="date">Date of Invoice: <?php echo date('d/m/Y')?></div>
                </div>

        <div id="invoice">
            <h1>ORDER# <?php echo $allOrder->order_id?></h1>
<!--            <div class="date">Date of Invoice: --><?php //echo date('d/m/Y')?><!--</div>-->
        </div>

    </div>
  <?php } ?>


    <div id="thanks">Thank you!</div>
<!--    <div id="notices">-->
<!--        <div>NOTICE:</div>-->
<!--        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>-->
<!--    </div>-->
</main>
<
</body>
</html>
