<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?=Site_Title;?></title>
		
		
<link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/fav.png"/>
		
		<!-- Old CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
		<!-- Bootstrap -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/reset.css" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/style.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
        <script src="<?= base_url(); ?>assets/front/js/jquery.min.js"></script>
		
		<!--<link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/owl.carousel.min.css">
        <script src="<?= base_url(); ?>assets/front/js/owl.carousel.js"></script>-->
	</head>
	<body>
<!--Loader-->
<div class="_centered_loader">
<div class="blob-1"></div>
<div class="blob-2"></div>
</div>
<!--Loader End here-->
		<div class="wrapper" id="backtotop">
			<!-- wrapper start here -->
			<div class="top-header-row">
				<!-- Top header row start here -->
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top-phone-left">
								<p><span>Phone:</span> <a href="tel:<?= Phone; ?>"><?= Phone; ?></a></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="top-icons-right">
								<ul>
									<a href="https://twitter.com/@buy_oc" target="_blank"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
									<a href="https://www.facebook.com/ocbuyback" target="_blank"><li><i class="fa fa-facebook-official" aria-hidden="true"></i></li></a>
									<a href="https://www.instagram.com/ocbuyback/" target="_blank"><li><i class="fa fa-instagram" aria-hidden="true"></i></li></a>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Top header row end here -->
			<div class="clear"></div>
			<div class="main-header blog">
				<!-- main header start here -->
				<div class="header">
					<!-- header start here -->
					<div class="container">
						<div class="row">
							<div class="col-md-4">
					    	<div class="navbar-header">
								<div class="logo">
									<!-- Logo start here -->
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

									<a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/front/images/logo.png" alt="" /></a>
								</div>
								<!-- Logo end here -->
								</div>
							</div>
							<div class="col-md-8">
							    <?php
									$cart_count=$this->cart->total_items();
								  ?>
							    <div id="navbar" class="navbar-collapse collapse navbar-right" aria-expanded="false" style="height: 1px;">
								<div class="nav">
									<!-- Nav start here -->
									<ul>
										<li><a href="<?= base_url(); ?>">Home</a></li>
										<li><a href="<?= base_url(); ?>how-it-works">How It Works</a></li>
										<li><a href="<?= base_url(); ?>faqs">FAQs</a></li>
										<li><a href="<?= base_url(); ?>blogs">Blogs</a></li>
										<li><a href="<?= base_url(); ?>contact-us">Contact Us</a></li>
										<li class="_btn_menu_dropdown"><a id="cart_icon" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> (<?=$cart_count;?> Items) <i class="fa fa-shopping-cart"></i></a>
			  <?php
				if($cart_count > 0){
					?>
              <ul class="dropdown-menu dropdown-cart" role="menu">
                <li class="mini_cart_devices_title"><h1 >Your Devices</h1></li>
				<?php
				   foreach ($this->cart->contents() as $item){
				 ?>
				 
				  <li class="mini_cart">
                    <div class="cart_img" >
                      <img src="<?=base_url();?>assets/uploads/models/<?= ($rec['image'] != "" ? $rec['image'] : "dummy.png"); ?>"  style="max-height:30px;" />
                    </div>
                    <div class="mini_cart_desc">
                        <div class="model_name"> <?= $item['name']; ?></div>
                      <ul>
                        <li><?= $item['provider']; ?></li>
                        <li><?= $item['storage']; ?></li>
                        <li><?= $item['condition']; ?></li>
                      </ul>
					  <input type="number" data-row="<?= $item['rowid']; ?>" value="<?= $item['qty']; ?>"> 
                    </div>
                   	<div class="mini_price_cart">$<?= $item['price']; ?>
					  <a href="javascript:;" onclick='updateitem("<?= $item['rowid']; ?>",0);'><i class="fa fa-times"></i></a>
                    </div>
                    
                    
                  </li>
                  
                  
				   <?php } ?>
                    <li class="mini_cart_bottom">
                      <a class="text-center mini_cart_add_cart"  href="<?= base_url(); ?>sell/#banner">Add Another Device</a>
                      <a class="text-center mini_cart_checkout"  href="<?= base_url(); ?>order/checkout">Checkout</a></li>
                    </ul>
				<?php } ?>
                  </li>
										<li><a  id="btn-scroll" href="<?= base_url(); ?>sell/#banner">Request a Quote</a></li>
										
									</ul>
								</div> 
								</div>
								<!-- Nav end here -->
								
								
								
								
								
							</div>
						</div>
					</div>
				</div>
				<!-- header end here -->
				
			<?php  $this->load->view($view,$viewData); ?>
			<!-- // End Content -->
			<div class="clear"></div>
			<div class="main-footer">
				<!--  main footer start here-->
				<div class="footer">
					<!-- Footer start here -->
					<div class="container">
						<div class="row">
							<div class="foo-logo">
								<!-- Footer logo start here -->
								<a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/front/images/foo-logo.png" alt="" /></a>
							</div>
							<!-- Footer logo end here -->
							<div class="foo-row-1">
								<!-- Footer row 1 start here -->
								<div class="col-md-3 col-xs-6 footer_1">
									<div class="foo-menu-1">
										<strong>CUSTOMER SERVICE</strong>
										<div class="foo-phone">
											<p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?= Phone; ?>"><?= Phone; ?></a></p>
										</div>
										<div class="foo-email">
											<a href="mailto:<?= Site_Email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?= Site_Email; ?></a>
										</div>
										<div class="support-menu">
											<a href="<?= base_url(); ?>faqs"><i class="fa fa-question-circle" aria-hidden="true"></i>Support & FAQs</a>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-xs-6 footer_1">
									<div class="foo-menu-1">
										<strong>MENU</strong>
										<ul>
										<!--	<li><a href="<?= base_url(); ?>about-us">About us</a></li> -->
											<li><a href="<?= base_url(); ?>how-it-works">How it works</a></li>
										<li><a href="<?= base_url(); ?>track-your-order">Track your order</a></li> 
											<li><a href="<?= base_url(); ?>blogs">Blogs</a></li>
											<li><a href="<?= base_url(); ?>contact-us">Contact us</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 col-xs-6 footer_1">
									<div class="foo-menu-1">
										<strong>Hours of Operation</strong>
										<ul>
											<li><a>Monday to Friday - 9AM to 5PM (PT)</a></li>
											<li><a>Saturday - 10AM to 1PM</a></li>
											<li><a>Sunday - Closed</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 col-xs-6 footer_1">
									<div class="foo-menu-1">
										<div class="foo-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.8010174916585!2d-117.91137930060967!3d33.92052047133037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd512e186c8b1%3A0xc3366d5af3433b4a!2sOCBuyBack!5e0!3m2!1sen!2sus!4v1541637053149" width="270" height="130" frameborder="0" style="border:0" allowfullscreen></iframe>
							<strong><?= Address; ?></strong>
         								</div>
									</div>
								</div>
							</div>
							<!-- Footer row 1 end here -->
							<div class="foo-row-1">
								<!-- Footer row 1 start here -->
								<div class="col-md-3 col-xs-6">
									<div class="foo-menu-1">
										<ul>
											<li><a href="<?= base_url(); ?>sell/iphone/#banner">Sell your iPhone</a></li>
											<li><a href="<?= base_url(); ?>sell/ipad/#banner">Sell your iPad</a></li>
											<li><a href="<?= base_url(); ?>sell/ipod/#banner">Sell your iPod</a></li>
											<li><a href="<?= base_url(); ?>sell/apple-watch/#banner">Sell your Apple Watch</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="foo-menu-1">
										<ul>
											<li><a href="<?= base_url(); ?>sell/samsung-phone/galaxy-note-9/#banner">Sell Samsung Galaxy Note 9</a></li>
											<li><a href="<?= base_url(); ?>sell/samsung-phone/galaxy-s9-plus/#banner">Sell Samsung Galaxy S9+</a></li>
											<li><a href="<?= base_url(); ?>sell/samsung-phone/galaxy-s9/#banner">Sell Samsung Galaxy S9</a></li>
											<li><a href="<?= base_url(); ?>sell/samsung-phone/galaxy-note-8/#banner">Sell Samsung Galaxy Note 8 </a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="foo-menu-1">
										<ul>
											<li><a href="<?= base_url(); ?>sell/google-phone/pixel-3-xl/#banner">Sell Google Pixel 3 XL</a></li>
											<li><a href="<?= base_url(); ?>sell/google-phone/pixel-3/#banner">Sell Google Pixel 3</a></li>
											<li><a href="<?= base_url(); ?>sell/google-phone/pixel-2-xl/#banner">Sell Google Pixel 2 XL</a></li>
											<li><a href="<?= base_url(); ?>sell/google-phone/pixel-2/#banner">Sell Google Pixel 2</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="foo-menu-1">
										<ul>
											<li><a href="<?= base_url(); ?>sell/apple-tv/#banner">Sell Apple TV</a></li>
											<li><a href="<?= base_url(); ?>sell/apple-tv/apple-tv-3rd-generation/#banner">Sell Apple tv 3rd generation </a></li>
											<li><a href="<?= base_url(); ?>sell/apple-tv/apple-tv-4th-generation/#banner">Sell Apple tv 4th generation</a></li>
											<li><a href="<?= base_url(); ?>sell/apple-tv/apple-tv-4k/#banner">Sell Apple Tv 4K</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- Footer row 1 end here -->
						</div>
					</div>
					<div class="footer-btm-row">
						<!-- Footer btm row start here  -->
						<div class="container">
							<div class="row">
								<div class="col-md-3">
									<div class="copy-rights">
										<p>© OCBuyBack</p>
									</div>
								</div>
								<div class="col-md-9">
									<div class="btm-footer-inner">
										<div class="foo-nav">
											<ul>
												<li><a href="<?= base_url(); ?>terms-and-conditions">TERMS OF SERVICE</a></li>
												<li><a href="<?= base_url(); ?>privacy-policy">PRIVACY POLICY</a></li>
											</ul>
										</div>
										<div class="foo-social-icons">
											<ul>
										<a href="https://twitter.com/@buy_oc" target="_blank"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
									<a href="https://www.facebook.com/ocbuyback" target="_blank"><li><i class="fa fa-facebook-official" aria-hidden="true"></i></li></a>
									<a href="https://www.instagram.com/ocbuyback/" target="_blank"><li><i class="fa fa-instagram" aria-hidden="true"></i></li></a>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Footer btm row end here  -->
				</div>
				<!-- Footer end here -->
				<a href="#backtotop" class="backto"><i class="fa fa-arrow-up"></i></a>
			</div>
			<!--  main footer end here-->
		</div>
		<!-- wrapper end here -->


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

		<script src="<?= base_url(); ?>assets/front/js/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/jquery.validate.js"></script>
		<script src="<?= base_url(); ?>assets/front/js/plugins.js"></script>
		<script src="<?= base_url(); ?>assets/front/js/main.js"></script>
		<script>
		$("[type='number']").bind('keyup change', function () {
		   var id=$(this).data('row');
		   var qty=$(this).val();
		   if(qty > 0){
			updateitem(id,qty);
		   }
		});
		function updateitem(id,qty){
			$.ajax({
			  type: "POST",
			  data: {"rowid":id,"qty":qty},
			  url: '<?= base_url(); ?>order/update-item',
			  success: function (data) {
				if(data==1){
					location.reload();
				}
			  },
			  error: function (xhr, textStatus, errorThrown){
				alert(xhr.responseText);
			  }
			});
		}
		$(document).scroll(function() {
		  var y = $(this).scrollTop();
		  if (y >200) {
			$('.backto').fadeIn();
		  } else {
			$('.backto').fadeOut();
		  }
		});
		if (window.location.hash) {
		setTimeout(function() {
			$('html, body').scrollTop(0).show();
			$('html, body').animate({
				scrollTop: $(window.location.hash).offset().top
				}, 2000)
		}, 0);

		}
		else {
			$('html, body').show();
		}

		
		$(document).ready(function(){
			$('._centered_loader').fadeOut();
		});
		$('._btn_menu_dropdown').click(function(){ 
			$('._btn_menu_dropdown ul').fadeToggle(); 
		})

		jQuery('.content:contains(p)').closest('.content').addClass('sponz');


			
		</script>
	
		
	
	</body>
</html>

