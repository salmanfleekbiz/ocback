<div class="clear"></div>

<div class="latest-sell-title">
   <!-- Latest blog title start here -->
   <h2>Sell your <?= $cat_title; ?></h2>
   <p>Get the highest price for your device</p>
   <div class="back-btn">
      <!-- Back btn start here -->
      <p><a href="<?= base_url(); ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Back to Home</a></p>
   </div>
   <!-- Back btn end here -->
</div>
<div class="clear"></div>
</div>

<div id="banner" class="_phone_model">
<div class="jumbotron">
		<!-- // being page Header -->
        <div id="page-header">
          <div class="container">
            <div class="row">
              <div class="page-header">
                <ul class="list-inline brand-tabs">
                  <li>Sell <?= $cat_title; ?></li>
                  <li class="active"><a href="javascript:void(0);">
                    <span class="number">01 </span><span class="text">Model</span>
                  </a></li>
                  <li><a href="javascript:void();"><span class="number">02 </span><span class="text">Provider</span></a></li>
                  <li><a href="javascript:void();"><span class="number">03 </span><span class="text">Storage</span></a></li>
                  <li><a href="javascript:void();"><span class="number">04 </span><span class="text">Condition</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- // end Header -->
        
        <!-- // being content Area -->
        <section id="main-content">
          <div class="container">
            <div class="row">
              <h3>Choose Your Model</h3>
            </div>
            <div class="row">
              <ul class="list-inline model-list ul-models">
				 <?php
					foreach($models AS $mod){
						echo '<li class="col-md-3 col-sm-6 col-xs-12 li-models" >
						  <a href="'.$mod['slug'].'\#banner"><img src="'.base_url().'assets/uploads/models/'.($mod['image'] != "" ? $mod['image'] : "dummy.png").'"/></a>
						  <a href="'.$mod['slug'].'\#banner" class="btn btn-primary btn-lg btn-block">'.$mod['title'].'</a>
						</li>';
					}
				  ?>
              </ul>
            </div>
          </div>
        </section>
        <!-- // end content Area -->
        
</div>        
</div>        