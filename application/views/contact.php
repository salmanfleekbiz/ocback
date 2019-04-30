<div class="clear"></div>

<div class="latest-sell-title">
   <!-- Latest blog title start here -->
   <h2>Trade In Method</h2>
   <p>Select how you want to trade in your device</p>
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
			<form id="pay_form" action="<?=base_url();?>order/payment" method="POST">
			  <div class="col-sm-6">
			    <div class="form-group">
					<input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?= (isset($cdet['first_name']) ? $cdet['first_name'] : ""); ?>" >
			    </div>
			  </div>
			  <div class="col-sm-6">
			    <div class="form-group">
					<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?= (isset($cdet['last_name']) ? $cdet['last_name'] : ""); ?>" >
			    </div>
			  </div>
			  <div class="col-sm-12">
			    <div class="form-group">
					<?php
						$trade_type=(isset($cdet['trade_type']) ? $cdet['trade_type'] : "");
						$time=(isset($cdet['time']) ? $cdet['time'] : "");
					?>
					<select class="form-control" name="trade_type" id="trade_type" >
						<option <?= ($trade_type == "" ? "selected" : ""); ?> value="">Select how to ship us your item</option>
						<option <?= ($trade_type == "local_dropoff" ? "selected" : ""); ?> value="local_dropoff">Local Drop Off - (<?= Address; ?>)</option>
						<option  <?= ($trade_type == "prepaid_label" ? "selected" : ""); ?> value="prepaid_label">Prepaid Label - Print Label Now and Use Your Own Box For Faster Payout</option>
						<option  <?= ($trade_type == "shipping_kit" ? "selected" : ""); ?> value="shipping_kit">Shipping Kit with Prepaid Label - We Send You a Box, Slowest Turn Around Process</option>
					</select>
			    </div>
			  </div>
			  <div class="col-sm-12" id="local_tradein" style="padding: 0px;<?= ($trade_type != "local_dropoff" ? 'display:none' : ''); ?>;" >
			    <div class="col-sm-6">
				  <div class="form-group">
					<input type="text" class="form-control" id="datepicker" name="date" placeholder="Select Date" value="<?= (isset($cdet['date']) ? $cdet['date'] : ""); ?>">
					<span id="date_error" class="error"></span>
				  </div>
				</div>
				<div class="col-sm-6">
				  <div class="form-group">
					<select name="time" id="time" class="form-control">
						<option <?= ($time == "" ? "selected" : ""); ?> value="">Select Time</option>
						<option <?= ($time == "9:00 AM" ? "selected" : ""); ?> value="9:00 AM">9:00 AM</option>
						<option <?= ($time == "10:00 AM" ? "selected" : ""); ?> value="10:00 AM">10:00 AM</option>
						<option <?= ($time == "11:00 AM" ? "selected" : ""); ?> value="11:00 AM">11:00 AM</option>
						<option <?= ($time == "12:00 PM" ? "selected" : ""); ?> value="12:00 PM">12:00 PM</option>
						<option <?= ($time == "01:00 PM" ? "selected" : ""); ?> value="01:00 PM">01:00 PM</option>
						<option <?= ($time == "02:00 PM" ? "selected" : ""); ?> value="02:00 PM">02:00 PM</option>
						<option <?= ($time == "03:00 PM" ? "selected" : ""); ?> value="03:00 PM">03:00 PM</option>
						<option <?= ($time == "04:00 PM" ? "selected" : ""); ?> value="04:00 PM">04:00 PM</option>
						<option <?= ($time == "05:00 PM" ? "selected" : ""); ?> value="05:00 PM">05:00 PM</option>
					</select>
					<span id="time_error" class="error"></span>
				  </div>
				</div>
			  </div>
			  <div class="col-sm-12" id="ship_tradein" style="padding: 0px;<?php if($trade_type == "local_dropoff"|| $trade_type == "") echo 'display:none'; ?>">
			    <!--<div class="col-sm-12">
				  <div class="form-group" id="locationField">
					<input id="autocomplete" placeholder="Enter Your Address" onFocus="geolocate()" type="text" name="address" value="<?= (isset($cdet['address']) ? $cdet['address'] : ""); ?>" class="form-control" ></input>
				  </div>
			    </div>-->
			    <div id="address">
				  <div class="col-sm-4">
					<div class="form-group">
					  <input type="text" class="field form-control" id="street_number" name="unit" placeholder="Unit, Suite or Apt Number" value="<?= (isset($cdet['unit']) ? $cdet['unit'] : ""); ?>" >
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="field form-control" name="street" id="route" placeholder="Street Address" value="<?= (isset($cdet['street']) ? $cdet['street'] : ""); ?>" >
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="field form-control" id="locality" name="city" value="<?= (isset($cdet['city']) ? $cdet['city'] : ""); ?>" placeholder="City" >
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="field form-control" id="administrative_area_level_1" name="state" value="<?= (isset($cdet['state']) ? $cdet['state'] : ""); ?>"  placeholder="State" >
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="field form-control" id="postal_code" name="zip_code" value="<?= (isset($cdet['zip_code']) ? $cdet['zip_code'] : ""); ?>" placeholder="Zip Code" >
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="field form-control" id="country" name="country" placeholder="Country" value="<?= (isset($cdet['country']) ? $cdet['country'] : "United States"); ?>" readonly>
					</div>
				  </div>
			    </div>
			  </div>
			  <div class="col-sm-12">
			  <div class="col-sm-6" style="padding-left: 0px;">
				<div class="form-group">
					<input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number 111-111-1111" value="<?= (isset($cdet['phone']) ? $cdet['phone'] : ""); ?>" pattern="[0-9]{3}[-][0-9]{3}[-][0-9]{4}" maxlength="12">
				</div></div>
			  </div>
			  <div class="col-sm-12">
			    <div class="form-group text-right">
					<button type="submit" class="btn btn-primary" >Continue</button>
				</div>
			  </div>
			</form>
		</div>
	</div>
  </div>
</section>

</div>
</div>
<!-- // end content Area -->					
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDUCHzlUnF7YwDC_OfKHAuHNkJ_BzIjoA&libraries=places&callback=initAutocomplete" async defer></script>
<script>

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
  $('#phone').mask("###-###-####");
  
  $("#pay_form").validate({
	rules: {
	  first_name: "required",
	  last_name: "required",
	  trade_type: "required",
	  address: {
		  required: function(element) {
			return $("#trade_type").val() == 'prepaid_label' || $("#trade_type").val() == 'shipping_kit';
		  }
	  },
	  // unit: {
		  // required: function(element) {
			// return $("#trade_type").val() == 'prepaid_label' || $("#trade_type").val() == 'shipping_kit';
		  // }
	  // },
	  street: {
		  required: function(element) {
			return $("#trade_type").val() == 'prepaid_label' || $("#trade_type").val() == 'shipping_kit';
		  }
	  },
	  city: {
		  required: function(element) {
			return $("#trade_type").val() == 'prepaid_label' || $("#trade_type").val() == 'shipping_kit';
		  }
	  },
	  state: {
		  required: function(element) {
			return $("#trade_type").val() == 'prepaid_label' || $("#trade_type").val() == 'shipping_kit';
		  }
	  },
	  zip_code: {
		  required: function(element) {
			return $("#trade_type").val() == 'prepaid_label' || $("#trade_type").val() == 'shipping_kit';
		  }
	  },
	  country: {
		  required: function(element) {
			return $("#trade_type").val() == 'prepaid_label' || $("#trade_type").val() == 'shipping_kit';
		  }
	  },
	  date: {
		  required: function(element) {
			return $("#trade_type").val() == 'local_dropoff';
		  }
	  },
	  time: {
		  required: function(element) {
			return $("#trade_type").val() == 'local_dropoff';
		  }
	  },
	  phone: "required",
	
	}
  });
});

$(function() {
    $( "#datepicker" ).datepicker({
		minDate: new Date(),
		beforeShowDay: noSunday
	})
	.change(dateChanged)
    .on('changeDate', dateChanged);
	function noSunday(date){
		var day = date.getDay();
		return [(day > 0), ''];
	};
	function dateChanged() {
		if ($('#datepicker').val() != "") {
			var date= new Date($('#datepicker').val())
			var day = date.getDay();
			$('#time option').remove();
			if(day == 6){
				$("#time").append('<option value="">Select Time</option><option value="10:00 AM">10:00 AM</option><option value="11:00 AM">11:00 AM</option><option value="12:00 PM">12:00 PM</option><option value="01:00 PM">01:00 PM</option>');
			}
			else{
				$("#time").append('<option value="">Select Time</option><option value="9:00 AM">9:00 AM</option><option value="10:00 AM">10:00 AM</option><option value="11:00 AM">11:00 AM</option><option value="12:00 PM">12:00 PM</option><option value="01:00 PM">01:00 PM</option><option value="02:00 PM">02:00 PM</option><option value="03:00 PM">03:00 PM</option><option value="04:00 PM">04:00 PM</option><option value="05:00 PM">05:00 PM</option>');
			}
		}
	}
});

$("#pay_form").one('submit', function(e){
	if ($('#pay_form').valid() != 1) {
		e.preventDefault();
	}
	else if($("#trade_type").val() != 'local_dropoff' ){
		e.preventDefault();
		var addr= $(this).serialize();
		$.ajax({
			url:"<?= base_url();?>shipping/verify-address",
			type:'POST',
			dataType:'JSON',
			data:addr,
			success:function(res){
				if(res.success == false){
					alert("Invalid Address");
				}
				else{
					$('#pay_form').submit();
				}
			},
			error: function (xhr, textStatus, errorThrown){
				console.log(xhr.responseText);
			}
		});
	}
});

$('#trade_type').change(function() {
    if (this.value == '') {
		$("#ship_tradein").slideUp();
        $("#local_tradein").slideUp();
		$("#autocomplete").val("");
        $("#street_number").val("");
        $("#route").val("");
        $("#locality").val("");
        $("#administrative_area_level_1").val("");
        $("#postal_code").val("");
        $("#country").val("");
		$("#datepicker").val("");
        $("#time").val("");
	}
    if (this.value == 'local_dropoff') {
        $("#ship_tradein").slideUp();
        $("#local_tradein").slideDown();
		$("#autocomplete").val("");
        $("#street_number").val("");
        $("#route").val("");
        $("#locality").val("");
        $("#administrative_area_level_1").val("");
        $("#postal_code").val("");
        $("#country").val("");
    }
    else if (this.value == 'prepaid_label' || this.value == 'shipping_kit') {
        $("#local_tradein").slideUp();
        $("#ship_tradein").slideDown();
        $("#datepicker").val("");
        $("#time").val("");
        $("#country").val("United States");
    }
});


var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  postal_code: 'short_name',
  country: 'long_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */
    (document.getElementById('autocomplete')), {
      types: ['geocode']
    });

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm){
    document.getElementById(component).value = '';
	if(component != "country" && component != "locality" && component != "administrative_area_level_1"){
		document.getElementById(component).readOnly = false;
	}
  }
  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
	  if(addressType == "country" && val != "United States"){
		  alert("Invalid US Address");
		  $("#autocomplete").val("");
		  for (var component in componentForm){
			document.getElementById(component).value = '';
			document.getElementById(component).readOnly = true;
		  }
		   return false;
	  }
    }
  }

  
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

</script>

