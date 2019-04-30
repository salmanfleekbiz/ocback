<div class="clear"></div>

<div class="latest-sell-title">
   <!-- Latest blog title start here -->
   <h2>Sell your <?= $cdata['title']; ?></h2>
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
<div class="jumbotron condition-page">
	<!-- // being page Header -->
        <div id="page-header">
          <div class="container">
            <div class="row">
              <div class="page-header">
                <ul class="list-inline brand-tabs">
                  <li>Sell <?= $cdata['title']; ?></li>
                  <li class="completed"><a href="<?= base_url().'sell/'.$cdata['slug'].'\#banner'; ?>">
                    <span class="number">01 </span><span class="text"><?= (isset($mdata['title']) ? $mdata['title'] : 'Model'); ?></span>
                  </a></li>
                  <li class="completed"><a href="<?= base_url().'sell/'.$cdata['slug'].'/'.$mdata['slug'].'\#banner'; ?>">
                    <span class="number">02 </span><span class="text"><?= (isset($pdata['title']) ? $pdata['title'] : 'Provider'); ?></span>
                  </a></li>
                  <li class="completed"><a href="<?= base_url().'sell/'.$cdata['slug'].'/'.$mdata['slug'].'/'.$pdata['slug'].'\#banner'; ?>">
                    <span class="number">03 </span><span class="text"><?= (isset($data['title']) ? $data['title'] : 'Storage'); ?></span>
                  </a></li>
                  <li class="active"><a href=""><span class="number">04 </span><span class="text">Condition</span></a></li>
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
              <h3>Choose Your Condition</h3>
            </div>
            <div class="row">
              <ul class="list-inline model-list ul-condition">
				 <?php
					foreach($condition AS $con){
						echo '<li class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2 li-condition">
						  <a href="javascript:;" onclick="get_cond_des('.$con['id'].')" class="btn btn-primary btn-lg btn-block">'.$con['title'].'</a>
						</li>';
					}
				  ?>
              </ul>
            </div>
            <div class="row" >
              <div class="col-md-offset-1 col-md-11">
                <div id="desc" style="display:none;">
				  <div id="con-des"></div>
                </div>
              </div>
            </div>
            <div class="row" id="pricing"  style="display:none;">
              <div class="col-md-offset-1 col-md-5">
			  
                <div class="totalPrice">
                  Your Offer is: <span>$<span id="s_price">00.00</span></span>
					
				</div> 
				<input type="hidden" id="sprice" >
				<input type="hidden" id="totalprice" >
				<div class="totalPrice totalPrice_dicount">
                  <p>Promo Code:<span id="promodetails"></span></p>
				  <span id="promomsg"></span>
				  <input type="text" class="col-md-9" id="promo">
					
                    <a  href="javascript:void(0);" onclick="PromoApply()" class="btn btn-primary btn-checkout ">Submit</a>
                </div>
              </div>
              <div class="col-md-5">
                <div class="row">
                  <div class="col-sm-offset-2 col-sm-3 col-xs-4 ">
                    <label class="quantit-label">
                      Quantity
                    </label>
                  </div>
                  <div class="col-sm-2  col-xs-2">
                  <span id="quantity-group">
                    <input type="number" id="quntity" min="01" max="999" value="01" >
                    <button type="button" class="quantity-right-plus btn btn-link btn-sm btn-number" data-type="plus" data-field="">
                                            
                    </button>
                     <button type="button" class="quantity-left-minus btn btn-link btn-sm btn-number"  data-type="minus" data-field="">
                    </button>
                    </span>           
                  </div>
                  <div class="col-sm-5  col-xs-6">
					<input type="hidden" name="pid" id="pid" value="" />
                    <a  href="javascript:void(0);" onclick="add_to_cart(1)" class="btn btn-primary btn-checkout btn-block">Checkout</a>
                  </div>
                </div>
                <div class="row">
            <a href="javascript:;" onclick="add_to_cart(2)" class="add-to-cart ">Add to Cart and Add Another Device</a>
                </div>
				
              </div>
            </div>
          </div>
        </section>
        <!-- // end content Area -->
        </div>
        </div>
		
	<script>
		function get_cond_des(coid){
			$.ajax({
				url:"<?= base_url();?>get/conditon_details",
				type:'POST',
				dataType:'JSON',
				data:{'id':coid},
				success:function(result){
					get_pricing(coid);
					$('#con-des').html(result.description);
					$('#desc').slideDown();
					$("html, body").animate({ scrollTop: $('#desc').offset().top }, 1000);
				},
				error: function (xhr, textStatus, errorThrown){
					alert(xhr.responseText);
				}
			});
		}
		function get_pricing(coid){
			$.ajax({
				url:"<?= base_url();?>get/pricing",
				type:'POST',
				dataType:'JSON',
				data:{'mod_id':<?= $mdata['id']; ?>,'pro_id':<?= $pdata['id']; ?>,'sto_id':<?= $data['id']; ?>,'con_id':coid},
				success:function(res){
					$("#s_price").text(res.pricing);
					$("#sprice").val(res.pricing);
					$("#pid").val(res.pid);
					$('#pricing').slideDown();
				},
				error: function (xhr, textStatus, errorThrown){
					alert(xhr.responseText);
				}
			});
		}
		function add_to_cart(chk){
			var pid=$('#pid').val();
			var s_price=$('#totalprice').val();
			if(s_price ==''){
				var s_price=$('#s_price').text();
			}
			var qty=$('#quntity').val();
			$.ajax({
				url:"<?= base_url();?>cart/add",
				type:'POST',
				dataType:'JSON',
				data:{'pid':pid,'qty':qty,'s_price':s_price},
				success:function(res){
				  if(chk==1){
					window.location.replace("<?= base_url();?>order/checkout");
				  }
				  else{
					window.location.replace("<?= base_url();?>sell/#banner");
				  }
				},
				error: function (xhr, textStatus, errorThrown){
					console.log(xhr.responseText);
				}
			});
		}
		function PromoApply(){
			var code=$('#promo').val();
			$.ajax({
				  url : "<?= base_url();?>sell/checkpromo",
				  type: "POST",
				  data: {code: code} ,
				  success: function (data) {
					   
						if(data==1){
							$('#promodetails').html('');
							 $('#s_price').html($('#sprice').val());
						  $('#promomsg').html('<p style="color:red;">Limit Exceeded ! Try Another Code.</p>');
					  }
					else if(data == 2){
						$('#promodetails').html('');
					  $('#promomsg').html('<p style="color:red;">Invalid Code ! Try Another Code</p>');
					  $('#s_price').html($('#sprice').val());
					}
					
					else{
					  $('#promomsg').html('<p style="color:green;">Code Successfully Applied</p>');
						var promo=JSON.parse(data);
						var sub=parseInt($('#sprice').val());
						var subtotal = parseInt(promo.price);
						
						var subtotal = sub + subtotal;
						$('#totalprice').val(subtotal);
						$('#s_price').html('<strike>'+sub+'.00</strike>  $'+subtotal+'.00');
						// $('#promodetails').html(' '+promo.code+' '+promo.price+'%');
						$('#promodetails').html(' '+promo.code+' $'+promo.price+'.00');
					  
					}
				  },
				  error: function (xhr, textStatus, errorThrown) 
				  {
					console.log(xhr.responseText);
				  }
				});
		
	
	
}
	</script>