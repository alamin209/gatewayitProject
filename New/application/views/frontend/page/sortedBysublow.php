div class="innerproductarea" id="example">

<?php
foreach($low as $product){
    ?>
    <div class="actualProduct">
        <div class="productpic">
            <a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">
                <img src="<?= base_url($product->image);?>" alt="<?= $product->prod_name; ?>" border="0" title="<?= $product->prod_name; ?>" />
            </a>
        </div>
        <br clear="all"/>
        <div class="productshortdis">
            <h2 style="font-size:18px;min-height:80px;">
                <a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">
                    <?= $product->prod_name; ?>
                </a>
            </h2>
            <div class="price"><span style="font-size:18px;"> Tk ৳<?= $product->prod_price; ?> <div class="txtSale"></div></span></div>
            <?php echo substr(strip_tags($product->prod_desc,'<p><em><a><br/><b><strong>'),0,100); ?>
            &hellip;<a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">Details</a> <br /><span class="CatBoxStock" style="color:red;"></span>
        </div>
        <div class="clear"></div>
        <br clear="all"/>
    </div>
<?php } ?>
<br clear="all"/>
</div>