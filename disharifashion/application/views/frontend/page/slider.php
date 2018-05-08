
<div class="container">
  <div class="main">
    <div class="row">
      <div class="col-md-12 content_left"> 
        <!-- start slider -->
        <div id="fwslider">
          <div class="slider_container">
            <!-- Slide image -->
            <?php
              foreach ($result as $value) {
            ?>
              <div class="slide"><img src="<?= base_url($value->image);?>" class="img-responsive" alt=""/></div>
            <?php } ?>
            
            <!--/slide -->
          </div>
          <div class="timers"></div>
          <div class="slidePrev"><span></span></div>
          <div class="slideNext"><span></span></div>
        </div>
        <!-- end  slider --> 
      </div>
    </div>
  </div>
</div>