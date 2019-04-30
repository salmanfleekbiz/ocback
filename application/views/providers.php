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

<div id="banner">
<div class="jumbotron">
<!-- // being page Header -->
        <div id="page-header">
          <div class="container">
            <div class="row">
              <div class="page-header">
                <ul class="list-inline brand-tabs">
                  <li>Sell <?= $cat_title; ?></li>
                  <li class="completed"><a href="<?= base_url().'sell/'.$cat_slug.'\#banner'; ?>">
                    <span class="number">01 </span><span class="text"><?= (isset($mod_title) ? $mod_title : 'Model'); ?></span>
                  </a></li>
                  <li class="active"><a href=""><span class="number">02 </span><span class="text">Provider</span></a></li>
                  <li><a href="javascript:;"><span class="number">03 </span><span class="text">Storage</span></a></li>
                  <li><a href="javascript:;"><span class="number">04 </span><span class="text">Condition</span></a></li>
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
              <h3>Choose Your Provider</h3>
            </div>
            <div class="row">
              <ul class="list-inline model-list provider-list ul-providers">
				 <?php
					foreach($providers AS $pro){
						if(!empty($pro['logo'])){
							echo '<li class="col-md-3 col-sm-6 col-xs-12 li-providers _li_providers">
							  <a href="'.$pro['slug'].'\#banner" class="btn btn-primary btn-lg btn-block">
							  <img src="'.base_url().'assets/uploads/providers/'.$pro['logo'].'" class="img-responsive normal" alt="'.$pro['slug'].'">
							  <img src="'.base_url().'assets/uploads/providers/'.$pro['logo'].'" class="img-responsive normal-hover" alt="'.$pro['slug'].'">
							  </a>
							</li>';
						}
						else{
							echo '<li class="col-md-3 col-sm-6 col-xs-12">
							  <a href="'.$pro['slug'].'\#banner" class="btn btn-primary btn-lg btn-block">'.strtoupper($pro['title']).'</a>
							</li>';
						}
					}
				  ?>
              </ul>
            </div>
          </div>
        </section>
        </div>
        </div>
        <!-- // end content Area -->