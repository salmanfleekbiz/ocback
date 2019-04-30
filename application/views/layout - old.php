<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sell Used Phones | OC Supply Wholesale</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/smt-bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	<script src="<?= base_url(); ?>assets/vendor/js/jquery.min.js"></script>
  </head>
  <body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <div class="bs-component">
      <nav class="navbar navbar-default" >
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Main-Menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="<?= base_url(); ?>assets/images/logo.png" class="img-responsive" alt="logo"></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="Main-Menu">
            <ul class="nav navbar-nav">
              <li><a href="javascript:void(0);">Home</a></li>
              <li><a href="javascript:void(0);">About</a></li>
              <li class="active"><a href="javascript:void(0);">Sell Your Device</a></li>
              <li><a href="javascript:void(0);">FAQ</a></li>
              <li><a href="javascript:void(0);">Contact Us</a></li>
			  <?php
				$cart_count=$this->cart->total_items();
			  ?>
			  
              <li><a id="cart_icon" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> (<?=$cart_count;?> Items) <i class="fa fa-shopping-cart"></i></a>
			  <?php
				if($cart_count > 0){
					?>
              <ul class="dropdown-menu dropdown-cart" role="menu">
                <li class="mini_cart_devices_title"><h1 >Your Devices</h1></li>
				<?php
				   foreach ($this->cart->contents() as $item){
				 ?>
				  <li class="mini_cart">
					<div class="mini_price_cart">$<?= $item['price']; ?>
					  <a href="javascript:;" onclick='updateitem("<?= $item['rowid']; ?>",0);'><i class="fa fa-times"></i></a>
                    </div>
                    <div class="cart_img" >
                      <img class="cart_img" id="cart_img0" src="https://buybackboss.com/wp-content/uploads/2015/06/model_icon.png">
                    </div>
                    <div class="mini_cart_desc">
                      <ul style="margin:20px 0 0;">
                        <li class="model_name"> <?= $item['name']; ?></li>
                        <li><?= $item['provider']; ?></li>
                        <li><?= $item['storage']; ?></li>
                        <li><?= $item['condition']; ?></li>
                      </ul>
					  <input type="number" data-row="<?= $item['rowid']; ?>" value="<?= $item['qty']; ?>"> 
                    </div>
                  </li>
				   <?php } ?>
                    <li class="mini_cart_bottom">
                      <a class="text-center mini_cart_add_cart"  href="<?= base_url(); ?>">Add Another Device</a>
                      <a class="text-center mini_cart_checkout"  href="<?= base_url(); ?>order/checkout">Checkout</a></li>
                    </ul>
				<?php } ?>
                  </li>
                  <li class="last">
                <a href="javascript:void(0);"><i class="fab fa-twitter-square"></i></a>
                <a href="javascript:void(0);"><i class="fab fa-facebook-square"></i></a>
                <a href="javascript:void(0);"><i class="fab fa-instagram"></i></a>
              </li>
              
            </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
          </nav>
        </div>
        
        <!-- // being banner -->
		<?php  $this->load->view($view,$viewData); ?>
        <!-- // end banner -->
        
        
        <footer>
          <div class="container">
            <div class="row text-center"><img src="<?= base_url(); ?>assets/images/footer-logo.png" class="img-responsive" alt="">
              <ul class="list-inline">
                <li> <a href="javascript:void(0);"><img src="<?= base_url(); ?>assets/images/icon-facebook.png" alt=""></a></li>
                <li><a href="javascript:void(0);"><img src="<?= base_url(); ?>assets/images/icon-instagram-footer.png" alt=""></a></li>
                <li><a href="javascript:void(0);"><img src="<?= base_url(); ?>assets/images/icon-envelope-footer.png" alt=""></a></li>
                <li><a href="javascript:void(0);"><img src="<?= base_url(); ?>assets/images/icon-twitter.png" alt=""></a></li>
              </ul>
              <p>&copy; OC Supply Wholesale</p>
            </div>
            </div>
          </footer>
          
          
          <script src="<?= base_url(); ?>assets/vendor/js/bootstrap.min.js"></script>
          <script src="<?= base_url(); ?>assets/vendor/js/modernizr-3.6.0.min.js"></script>
          <script src="<?= base_url(); ?>assets/vendor/js/plugins.js"></script>
          <script src="<?= base_url(); ?>assets/vendor/js/main.js"></script>
          <script>
			$("[type='number']").bind('keyup mouseup', function () {
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
			</script>
        </body>
      </html>