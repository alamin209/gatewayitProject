<style type="text/css">
    tr td{
        padding: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="topnavarea">
                <a href="<?= base_url('welcome/');?>" title="HomePage">Home</a> /<a href="#" class='txtLocation'>Food Court</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="leftmenuarea menudisplay">
                <div class="leftmenu">
                    <?php include('leftmenu.php');?>
                </div>
            </div>

            <div class="rightcontentarea">
                <div class="headarea">
                    <div class="headtext">Food Court Items</div>
                </div>

<?php
                if($this->session->userdata('message')){
                print '<div class="alert alert-success">'.$this->session->userdata('message').'</div>';
                $this->session->unset_userdata('message');

                }elseif($this->session->userdata('delete')){
                print '<div class="alert alert-danger">'.$this->session->userdata('delete').'</div>';
                $this->session->unset_userdata('delete');

                }
                ?>


                <div class="navigationarea">
                    <div class="navigation">
                        <div style="float:left;width:50%;padding: 18px 0 0 0;">Total <?php echo count($foods);?> items</div>
                    </div>
                </div>

                <div class="innerproductarea">
                    <p style="color:red ; text-align:right"> 500tk   Charge will be added  </p>
                    <table width="100%" border="1" >
                        <tbody>

                        <tr class="listtexttop">
                            <td align="left" bgcolor="#ff6a00">Name</td>
                            <td align="left" bgcolor="#ff6a00">Price / Unit</td>
                            <td bgcolor="#ff6a00">Quantity</td>
                            <td bgcolor="#ff6a00">Add</td>
                        </tr>

                        <?php
                        foreach($foods as $items){
                            ?>

                            <form action="<?= base_url('Add_cart/food_cart/'.$items->id);?>" method="post">
                                <tr class="listdesign">
                                    <td align="left"><?= $items->prod_name; ?></td>
                                    <td align="left">Tk ৳<?= $items->prod_price; ?>&nbsp;/&nbsp;2 Kg</td>
                                    <td align="center">
                                        <select name="qty">
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
                                    <td align="center">
                                        <button class="btn btn-primary">Add to cart</button>
                                    </td>
                                </tr>
                            </form>

                        <?php } ?>
                        </tbody>
                    </table>
                    <br clear="all"/>
                    <p align="center">
                        <a href="<?= base_url('Add_cart/show_cart');?>">
                            <button class="btn btn-danger">Show your Busket</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>