<style>
.info-checkout p{
        text-transform: none !important;
    }
</style>
</style>
<div class="clear"></div>

<div class="latest-sell-title">
   <!-- Latest blog title start here -->
   <h2>Order Confirmation</h2>
   <p>Take a minute to review the information below and make any necessary changes.</p>
   <div class="back-btn">
      <!-- Back btn start here -->
      <p><a href="<?= base_url(); ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Back to Home</a></p>
   </div>
   <!-- Back btn end here -->
</div>
<div class="clear"></div>
</div>



<div id="banner">
          <div class="jumbotron checkout-page">

<!-- // being content Area -->
<section id="main-content" class="checkout checkout-one">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <table class="table table-bordered responsive-card-table unstriped">
               <thead>
                  <tr>
                     <th>Provider</th>
                     <th>Device</th>
                     <th>Condition</th>
                     <th>Offer</th>
                     <th>Quantity</th>
                     <th>Subtotal</th>
                     <th>Remove</th>
                  </tr>
               </thead>
               <tbody>
			     <?php
				 $trade_type=(isset($cdet['trade_type']) ? $cdet['trade_type'] : "");
				   foreach ($this->cart->contents() as $item){
				 ?>
                  <tr>
                     <td data-label="Provider"><?= $item['provider']; ?></td>
                     <td data-label="Device"><?= $item['name'].' '.$item['storage']; ?></td>
                     <td data-label="Condition"><?= $item['condition']; ?></td>
                     <td data-label="Offer">$<?= $item['price']; ?></td>
                     <td data-label="Quantity"><input type="number" min="1" class="form-control" data-row="<?= $item['rowid']; ?>" value="<?= $item['qty']; ?>"></td>
                     <td data-label="Subtotal">$<?= $item['subtotal']; ?></td>
                     <td data-label="Remove"  class="small-width" data-title="Remove : ">
                        <a href="javascript:;" onclick='updateitem("<?= $item['rowid']; ?>",0);'><i class="fa fa-times"></i></a>
                     </td>
                  </tr>
				 <?php
					}
					?>
               </tbody>
            </table>
            <div class="item-text">
			<p><b><i>*Item must be deactivated from you account and/or paid off from any carrier installment agreement (for cellular items only)</i></b></p>
         </div>
         </div>
      </div>
	
	  <div class="row">
			<div class="col-md-6">
			  <a href="<?= base_url(); ?>sell/#banner" class="btn btn-primary">
				Add Another Device
			  </a>
		   </div>
		   <div class="col-md-6">
		     <div class="order-total">
			<h2>Order Total: <span id="total">$<?= $this->cart->format_number($this->cart->total()); ?></span></h2>
		   </div>
		   </div>
	  </div>
	  
      <div class="row info-checkout">
         <div class="col-md-4 col-sm-6 col-xs-12">
		   <div class="col-xs-2">
			  <i class="fas fa-portrait" style="font-size: 32px;"></i>
		   </div>
			 <h4><b>Contact Information</b> 
				<a href="<?= base_url(); ?>order/contact"><i class="fa fa-edit"></i></a>
			 </h4>
			 <p>
				<?= $cdet['first_name'].' '.$cdet['last_name']; ?><br/>
				<?= $pdet['email'];?> <?= ($trade_type == "prepaid_label" ? '<i style="font-size: 12px;">(Your prepaid shipping label will be emailed to this email immediately after checkout.)</i>' : ''); ?><br/>
				<?= $cdet['phone']; ?><br/>
			 </p>
         </div>
         <div class="col-md-4 col-sm-6 col-xs-12">
		   <div class="col-xs-2">
			  <i class="fas fa-shipping-fast" style="font-size: 32px;"></i>
		   </div>
			 <h4><b>Shipping Information</b>  
				<a href="<?= base_url(); ?>order/contact"><i class="fa fa-edit"></i></a>
			 </h4>
			<?php
			  if($trade_type == "local_dropoff"){
				echo '<p>Trade Type: Local Drop Off.<br/>
				Date: '.(isset($cdet['date']) ? date('jS M Y', strtotime($cdet['date'])) : "").'<br/>
				Time: '.(isset($cdet['time']) ? $cdet['time'] : "").'</p>'; 
			  }
			  else{
				echo '<p>
				'.(!empty($cdet['unit']) ? $cdet['unit'].', ' : "").'
				'.(isset($cdet['street']) ? $cdet['street'].', ' : "").'
				'.(isset($cdet['zip_code']) ? $cdet['zip_code'].', ' : "").'
				'.(isset($cdet['city']) ? $cdet['city'].', ' : "").'
				'.(isset($cdet['state']) ? $cdet['state'].', ' : "").'
				'.(isset($cdet['country']) ? $cdet['country'].'. ' : "").'<br/>
				</p>';
				if($trade_type == "prepaid_label"){
					echo '<p>Prepaid Label.</p>'; 
				}
				else if($trade_type == "shipping_kit"){
					echo '<p>Shipping Kit with Prepaid Label.</p>'; 
				}
			  }
			?>
         </div>
      
         <div class="col-md-4 col-sm-6 col-xs-12">
		   <div class="col-xs-2">
		   </div>
			 <h4><b>Payment Method</b> 
				<a href="<?= base_url(); ?>order/payment"><i class="fa fa-edit"></i></a>
			 </h4>
			 <p>
			  <?php
				if($pdet['pay_type']==1){
					echo 'Payment Method: Paypal<br/>';
					echo 'Paypal Email: '.(!empty($pdet['paypal_email']) ? $pdet['paypal_email'] : $pdet['email']);
				}
				else if($pdet['pay_type']==2){
					echo 'Payment Method: Check<br/>';
					echo 'Check Type: '.($pdet['check_type'] == "e_check" ? 'E-Check - Receive check via E-Mail, You print out.' : 'Mailed Check - Receive your check in the mail 3-5 business days after your order is processed.');
				}
				else if($pdet['pay_type']==3){
					echo 'Payment Method: Cash<br/>';
				}
				?>
			 </p>
         </div>
      </div>
	  
      <div class="row">
         <div class="col-md-12  text-center">
            <a class="con-order" href="confirm-order" class="btn btn-orange">Complete Order</a>
         </div>
      </div>
   </div>
</section>

</div>
</div>
<!-- // end content Area -->
