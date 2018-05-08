<?php
include('header.php');
?>
<br/><br/>
<br/><br/><br/>
<div id="date" style="display: none">
    <form method="post" action="<?php echo base_url()?>Super_admin/searchByDate" onsubmit="return checkDate()">

        <div class="col-md-3 col-sm-3" >
            <div class="form-group" >

                <label for="date">Start Date</label>
                <input type="date" class="form-control docs-date" name="startdate" id="startdate" placeholder="Pick a date">
            </div >
        </div>
        <div class="col-md-3 col-sm-3" >
            <div class="form-group" >

                <label for="date">End Date</label>
                <input type="date" class="form-control docs-date" name="enddate" id="enddate" placeholder="Pick a date">
            </div>



        </div>
        <div class="btn-group col-md-3 col-sm-3">

            <button style="margin-top: 30px"  id="addRow" onclick="checkDate()" onclick="" class="btn btn-info">
                submit
            </button>
        </div>


    </form>   <!--                                    </form>-->
</div>
<form action="<?php echo base_url()?>Super_admin/searchByOrderId" method="post">
    <div id="order" style="display: none;">
        <div class="col-md-3 col-sm-3" >
            <div class="form-group" >

                <label for="date">Order ID</label>
                <input type="text" class="form-control " name="orderid" placeholder="Order ID">
            </div >

        </div>
        <div class="btn-group col-md-3 col-sm-3" >

            <button style="margin-top: 30px"  type="submit"  onclick="" class="btn btn-info">
                submti
            </button>
        </div>
    </div>
</form>
<div class="btn-group col-md-3 col-sm-3" id="searchbydate">

    <button style="margin-top: 30px"   onclick="searchbydate()" class="btn btn-info">
        Search By Date
    </button>
</div>
<div class="btn-group col-md-3 col-sm-3" id="searchbyoder">

    <button style="margin-top: 30px"  id="searchbyorderid" onclick="searchbydorder()" class="btn btn-info">
        Search By OrderID
    </button>
</div>
<table class="table table-bordered table-dark">
    <thead>
    <tr>
        <th scope="col">SL</th>
        <th scope="col">Order Id</th>
        <th scope="col">Total</th>
        <th scope="col">Order Status</th>
        <th scope="col">Order Date</th>
        <th scope="col">Order  Details</th>
    </tr>
    </thead>
    <tbody>


    <?php $count = 1;  foreach ($allreport as $o) { ?>
        <tr>

            <td><?php echo  $count ?> </td>
            <td><?php echo $o->order_id ?> </td>

            <td><?php echo $o->order_total ?></td>
            <td><?php echo $o->order_status ?> </td>
            <td><?php  echo $o->order_date ?> </td>
            <td><a href="<?= base_url('Super_admin/ViewOrderDetails/'.$o->order_id) ?>">
                    View|
                </a>
                <a href="<?= base_url('Super_admin/CreateInvoice/'.$o->order_id) ?>">
                    Invoice
                </a>
            </td>

        </tr>
        <?php $count++ ; }  ?>
    </tbody>
</table>

<script>
    function searchbydate(){
        document.getElementById('searchbydate').style.display='none';
        document.getElementById('date').style.display='block';
        document.getElementById('order').style.display='none';
        document.getElementById('searchbyoder').style.display='block';
    }
    function checkDate() {

        var startdate = document.getElementById('startdate').value;
        var enddate = document.getElementById('enddate').value;


        if (startdate > enddate){

            alert('End Date must be greater than start date');
            return false;
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/Report/searchByDate" )?>',
                data:{'startdate':startdate,'enddate':enddate},
                cache: false,
                success:function(data)
                {
                    $('#example4').html(data);
                }
            });
        }

    }
    function searchbydorder(){
        document.getElementById('searchbydate').style.display='block';
        document.getElementById('order').style.display='block';
        document.getElementById('date').style.display='none';
        document.getElementById('searchbyoder').style.display='none';
    }
</script>
</div>
<?php include('footer.php');?>
