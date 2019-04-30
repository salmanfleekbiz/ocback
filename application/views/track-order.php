<div class="clear"></div>

<div class="latest-sell-title">
   <!-- Latest blog title start here -->
   <h2>Track Your Order</h2>
   <p>Check on the Progress of Your Order</p>
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

<!-- // being content Area -->
<section id="main-content" class="checkout">
  <div class="container">
	<!--<div class="row">
	  <h3>Shipping Information</h3>
	  <h5>Provide the address for your free shipping label and payment.</h5>
	</div>-->
	<div class="row">
		<div class="col-md-12 content">
			<form id="track_form">
			  <div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-6" style="margin-bottom: 15px;">
					<input type="text" class="form-control" id="keywords" placeholder="Enter Email or Order #" value="" >
					<span class="error"></span>
			    </div>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary" style="height: 47px; padding: 0;">TRACK</button>
			    </div>
			  </div>
			</form>
			<div class="clearfix"></div>
			<div id="searched-orders"></div>
		</div>
	</div>
  </div>
</section>

</div>
</div>

<script>

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
  

$("#track_form").submit(function(e) {
	e.preventDefault();	
	var keyword=$("#keywords").val();
	if(keyword == ""){
		$(".error").text('This Field is Required');
	}
	else{
		$("#searched-orders").slideUp();
		$(".error").text('');
		$.ajax({
		  type: "POST",
		  data: {"keywords":keyword},
		  url: '<?= base_url(); ?>track-your-order/search',
		  dataType: 'JSON',
		  success: function (data) {
			$("#searched-orders").html(data);
			$("#searched-orders").slideDown();
		  },
		  error: function (xhr, textStatus, errorThrown){
			alert(xhr.responseText);
		  }
		});
	}
	
});
</script>
