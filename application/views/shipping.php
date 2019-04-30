<!-- // being content Area -->
<div class="clear"></div>
<div class="latest-sell-title">
   <!-- Latest blog title start here -->
   <h2><?= $post['title']; ?></h2>
   <p><?= $post['description']; ?></p>
   <div class="back-btn">
      <!-- Back btn start here -->
      <p><a href="<?= base_url(); ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Back to Home</a></p>
   </div>
   <!-- Back btn end here -->
</div>
<div class="clear"></div>
</div>
<div id="banner">
   <div class="jumbotron blog-detail">
      <div class="container">
         <div class="row text-center">
            <div class="col-md-12 text-center shipping-label">
               <?php
                  if($address_error==1){
                  	echo '<span style="color: #333;font-size: 16px">There was an error generating your prepaid label. Please bring your item to our location for inspection and payment:</span><br/><span style="font-size: 44px">'.Address.'</span><br><span style="color: #333;font-size: 16px">We have emailed your order details to you as well!</span><br><br/><span style="color: #333;font-size: 16px">For problem regarding shipping process, please contact our support, email us at '.Site_Email.'</span>';
                  }
                  else if(isset($shipment_label) && !empty($shipment_label)){ 
                  ?>
				   <span style="font-size: 44px">Don't forget your free shipping label!</span><br><br>
				   <span style="font-size: 18px">Click the button below to print your label</span><br><br>
				   <span>
				   <a onclick="printDiv('printMe')" class="btn btn-primary" target="_blank" href="javascript:;"><i class="fa fa-arrow-right"></i> Print Shipping Label <i class="fa fa-arrow-left"></i></a>
				   </span>
				   <a href="<?= $shipment_label; ?>" target="_blank">
				   <img src="<?= $shipment_label; ?>" style="width:50% !important" />
				   </a>
				   <div id='printMe' style="display:none">
					  <img src="<?= $shipment_label; ?>" style="width:85% !important;" />
				   </div>
				   <br>
				   <span style="color: #333;font-size: 16px">We have emailed your label and order details to you as well!</span><br><br>
				   <span style="color: #333;font-size: 16px">If you have any trouble with the shipping process, email us at <?= Site_Email; ?>.</span>
               <?php }
                  else if(isset($shipment_label) && empty($shipment_label)){ 
                  ?>
				   <span style="color: #333;font-size: 16px">Thank you, your order was received! Your shipping kit is on its way and should arrive within a few days.</span><br/>
				   <span style="color: #333;font-size: 16px">We have emailed your order details to you as well!</span><br><br>
				   <span style="color: #333;font-size: 16px">If you have any trouble with the process, email us at <?= Site_Email; ?>.</span>
               <?php }
                  else{
                  ?>
				   <span style="color: #333;font-size: 16px">Thank you, your order was received. Please bring your device/s to our local drop off location at:</span><br/><span style="font-size: 44px"><?= Address;?></span><br>
				   <span style="color: #333;font-size: 16px">We have emailed your order details to you as well!</span><br><br>
				   <span style="color: #333;font-size: 16px">If you have any trouble with the process, email us at <?= Site_Email; ?>.</span>
               <?php }
                  ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!--<iframe src="https://sellcell.reliatrk.com/p.ashx?a=19&e=37&t= //$transaction_id; ?>&p= //$basket_total; ?>" height="1" width="1"frameborder="0"></iframe>-->
<!-- // end content Area -->
<script>
   function printDiv(divName){
   	var printContents = document.getElementById(divName).innerHTML;
   	var originalContents = document.body.innerHTML;
   	document.body.innerHTML = printContents;
   	window.print();
   	document.body.innerHTML = originalContents;
   }
</script>