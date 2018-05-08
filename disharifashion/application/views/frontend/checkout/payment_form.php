<section id="pav-slideshow" class="pav-slideshow hidden-xs">
    <div class="container">
        <div class="row">
            <!-- Checkout -->
            <div class="col-lg-12 col-md-12">
                <div class="layerslider-wrapper hidden-xs">
                    <div class="bannercontainer banner-boxed" style="padding: 5px 0px;margin: 0px 0px;">
                        <div id="content" class="product-detail">
                            <div class="product-info">
                                <div class="row">           
                                    <div class="col-md-12">
										<div class="panel panel-primary" >
                                            <div class="panel-heading"> <i class="fa fa-star" aria-hidden="true"></i>
                                                Payment Method >>>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-vertical" action="<?= base_url('Checkout/Confirm_Order');?>" method="post">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Payment Method:</label>
                                                            <select name="payment" required="" class="form-control">
                                                                <option value="">Payment Method</option>
                                                                <option value="cash">---Cash On Delivery---</option>
                                                                <option value="bkash">---Bkash---</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div id="content">
                                                                <h3>
                                                                    Cart Details(<?php echo $this->cart->total_items(); ?>)
                                                                </h3>
                                                                <div class="checkout wrapper no-margin">

                                                                        <div class="cart-info table-responsive">
                                                                            <table class="table table-bordered table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td class="image">Image</td>
                                                                                        <td class="name">Product Name</td>
                                                                                        <td class="model">Code</td>
                                                                                        <td class="quantity">Quantity</td>
                                                                                        <td class="price">Unit Price</td>
                                                                                        <td class="total"> Sub-Total</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                        $contents = $this->cart->contents();
                                                                                        //print_r($contents);exit;
                                                                                        foreach ($contents as $value){
                                                                                        $id = $this->cart->total_items();
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td class="image" data-label="Image">
                                                                                            <a href="">
                                                                                                <img src="<?= base_url($value['image']);?>" alt="<?= $value['name'];?>" title="<?= $value['name'];?>" height="80px" width="50px" />
                                                                                            </a>
                                                                                        </td>
                                                                                        <td class="name" data-label="Product Name">
                                                                                            <a href=""><?= $value['name'];?></a>
                                                                                            <div class="cart-option"></div>
                                                                                        </td>
                                                                                            
                                                                                        <td class="model" data-label="Model"><?= $value['code'];?></td>
                                                                                        <td class="quantity" data-label="Quantity" >
                                                                                            
                                                                                            <input type="number" name="qty" value="<?php print $value['qty'];?>" disabled>
                                                                                                &nbsp;
                                                                                        </td>
                                                                                        <td class="price" data-label="Unit Price"  ><?= $value['price'];?> TK</td>
                                                                                        <td class="total" data-label="Total">
                                                                                            <?php
                                                                                                $TotalPrice = $value['price']*$value['qty'];
                                                                                                echo $TotalPrice.' Tk';
                                                                                            ?>
                                                                                        </td>

                                                                                        <input type="hidden" name="id" value="<?php print $value['id'];?>">
                                                                                    </tr>
                                                                                    <?php } ?>                  
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                  
                                                                    <div class="row">
                                                                        <div  class="col-lg-9 col-md-9">  
                                                                            <div class="buttons clearfix">        
                                                                            </div>
                                                                        </div>  
                                                                        
                                                                        <div class="col-lg-3 col-md-3">
                                                                            <div class="cart-total clearfix">
                                                                                <table id="total">
                                                                                    
                                                                                    <tr>
																						<td class="right"><b>Sub Total:</b>&nbsp;</td>
                                                                                        <td class="right pull-right">
                                                                                            <?php
                                                                                                $g_total = $this->cart->total();
                                                                                                $sdata=array();
                                                                                                $sdata['g_total']=$g_total;
                                                                                                $this->session->set_userdata($sdata);
                                                                                                echo $g_total.' tk';
                                                                                            ?>
                                                                                        </td>
																					</tr>
																					
																					<tr>
                                                                                        <td class="right"><b>Grand Total:</b>&nbsp;</td>
                                                                                        <td class="right pull-right">
                                                                                            <?php
                                                                                                $g_total = $this->cart->total();
                                                                                                $sdata=array();
                                                                                                $sdata['g_total']=$g_total;
                                                                                                $this->session->set_userdata($sdata);
                                                                                                echo $g_total.' tk';
                                                                                            ?>
                                                                                        </td>
                                                                                    </tr>

                                                                                </table>
                                                                            </div>
                                                                        </div>     
                                                                    </div>
                                                                </div>  
                                                            </div>  
                                                        </section> 
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4">
                                                            <button class="btn btn-primary" type="submit" name="submit">Place Your Order</button>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- panel-default -->

                                    </div><!-- col-md-8 -->
                        
                                </div><!-- row -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Checkout end -->        
        </div>  
    </div>
</section>