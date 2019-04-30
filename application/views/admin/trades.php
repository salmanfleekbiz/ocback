<div class="">
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div id="msg"></div>
         <div class="x_title">
            <h2><?= $title; ?> |<small>List</small></h2>
            <?php  if(count($records) > 0 ) { ?>
            <!--<button type="button" class="btn btn-danger margin pull-right" onClick="doDelete()" style="margin-right:auto" >Delete</button>-->
            <?php } ?>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            <div id="msg"><?php  if($this->session->flashdata('message')){
               echo $this->session->flashdata('message');
               }  
                ?>
            </div>
            <form method="post" id="ordertbl" action="<?= base_url();?>admin/Categories/DeleteRecord">
               <table id="order-datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                     <tr>
                        <th align="center"><input type="checkbox" name="chkAll" class="checkUncheckAll" ></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Trade Type</th>
                        <th>Payment</th>
                        <th>Shipping Label</th>
                        <th>Shipping Kit Label</th>
                        <th>Order Total</th>
						<th>Status</th>
                        <th>Tools</th>
                        <!--<th>Date Added</th>-->
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        foreach($records AS $rec){
                         ?>
                     <tr>
                        <td align="center">
                           <input class="chkIds" type="checkbox" name="ids[]" id="chk-<?= $rec['id'] ?>" value="<?= $rec['id'] ?>"  />
                        </td>
                        <td>
						<span style="font-size:0"><?= $rec['created_at']; ?></span>
						<a style="color: #72b6f1; font-weight: 700;" href="javascript:;" onclick="get_details(<?= $rec['id']; ?>)"><?= $rec['order_code']; ?></a><br>
                           <b style="font-size: 11px;"><?= date('jS M Y h:i:s A', strtotime($rec['created_at'])); ?></b>
                        </td>
                        <td><?= $rec['first_name'].' '.$rec['last_name']; ?></td>
                        <td><?= $rec['email']; ?></td>
                        <td><?= $rec['phone']; ?></td>
                        <td><?= $rec['trade_details']; ?></td>
                        <td><?php if($rec['pay_type'] == 1)  echo 'Paypal';
							else if($rec['pay_type'] == 2)  echo 'Check';
							else if($rec['pay_type'] == 3)  echo 'Cash'; ?></td>
                        <td><?php if($rec['trade_details'] =='Shipping Kit with Prepaid Label' || $rec['trade_details'] =='Prepaid Label'){ ?><a href="<?=$rec['label_url']?>" target="_blank">view</a> <?php } else{ echo 'N/A';} ?></td>
                        
						<td><?php if($rec['trade_details'] =='Shipping Kit with Prepaid Label'){ ?><a href="<?=$rec['kit_label_url']?>" target="_blank">view</a> <?php } else{ echo 'N/A';} ?></td>
                        
						<td>$<?= $rec['amount']; ?></td>
                        <?php 
						// if($title=='Current Trade Ins' || $title=='Action Items - Needs Shipping Kit'){ ?>
						<td>
						
						   <select class="form-control" id="o_st<?= $rec['id'] ?>" onchange='change_order_status(<?= $rec['id']; ?>)' >
						   <?php if(!isset($pstatus) || $pstatus !=1){ ?>
                              <option <?= ($rec['status'] == "" ? 'selected' : ''); ?> value="">Pending</option>
                              <option <?= ($rec['status'] == "received" ? 'selected' : ''); ?> value="received">Received</option>
						   <?php } ?>
                              <option <?= ($rec['status'] == "paid" ? 'selected' : ''); ?> value="paid">Paid</option>
                              <option <?= ($rec['status'] == "recycled" ? 'selected' : ''); ?> value="recycled">Recycled</option>
                              <option <?= ($rec['status'] == "returned" ? 'selected' : ''); ?> value="returned">Returned</option>
                              <option <?= ($rec['status'] == "cancelled" ? 'selected' : ''); ?> value="cancelled">Cancelled</option>
                              <?php
                                 if($rec['trade_details']=='Shipping Kit with Prepaid Label'){
                                 	echo '<option '.($rec['status'] == "shipping_kit_sent" ? 'selected' : '').' value="shipping_kit_sent">Shipping Kit Sent</option>';
                                 } ?>
                           </select>
                        
						<?php
						
						  // if(($rec['status'] == "" && $rec['trade_details']=='Shipping Kit with Prepaid Label') ){
							// echo '<a class="btn btn-default" onclick=\'change_order_status('.$rec['id'].',"shipping_kit_sent")\'><i class="fa fa-check"></i> Shipping Kit Sent</a>';
						  // }
						  // if(($rec['status'] == "" && $rec['trade_details']!='Shipping Kit with Prepaid Label') || $rec['status'] == "shipping_kit_sent"){
							// echo '<a class="btn btn-default" onclick=\'change_order_status('.$rec['id'].',"received")\'><i class="fa fa-check"></i> Received</a>';
						  // }
						  // if($rec['status'] == "received" && $rec['action'] != 3 && $rec['action'] != 4 && $rec['status'] != "paid"){
							// echo '<a class="btn btn-default" onclick=\'change_order_status('.$rec['id'].',"paid")\'><i class="fa fa-check"></i> Paid</a>';
						  // }
						  
						?>
                        </td>
						<?php  
						// }
						
						?>
						<td><a style="color: #72b6f1; font-weight: 700;" href="javascript:;" onclick="get_history('<?= $rec['order_code']?>')" ><i class="fa fa-history"></i> History</a><br><a style="color: #72b6f1; font-weight: 700;" href="javascript:;" onclick="edit_order(<?= $rec['id']?>)" ><i class="fa fa-edit"></i> Edit</a></td>
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>
   <!-- Detail modal -->
   <div class="modal fade bs-example-modal-lg" id="ModalOdet" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel"><?= $title; ?> |<small>View Details</small></h4>
            </div>
            <div class="modal-body" id="detail_view">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Detail modal --> 
   <!-- Edit modal -->
   <div class="modal fade bs-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
        <div class="modal-header">
          <h5 class="card-title"><span class="gray-title-text orderdetails"></span></h5>
        </div>
        <div class="modal-body" style="padding-top:0; padding-bottom:0;">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header clearfix">
                      </div>
                      <div class="card-body">
                          <form action="<?=base_url()?>admin/trades/orderupdate" method="POST">
                              <div class="row" style="margin-top:25px;">
                                <div class="col-md-5 pr-1"> 
								<input type="hidden" name="orderid" id="orderid">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input required="" name="first_name" type="text" class="form-control" placeholder="First Name" id="fname" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    </div>
                                  </div>
                                  <div class="col-md-5 pr-1">
                                      <div class="form-group">
                                          <label>Last Name</label>
                                          <input required="" name="last_name" type="text" class="form-control" placeholder="Last Name"  id="lname">
                                      </div>
                                    </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pr-1">
                                      <div class="form-group">
                                          <label>Email</label>
                                          <input required="" name="email" type="email" class="form-control" placeholder="Email" id="email">
                                      </div>
                                  </div>
                                  <div class="col-md-6 pl-1">
                                      <div class="form-group">
                                          <label>Phone</label>
                                          <input required="" name="phone" id="phone" type="tel" class="form-control" placeholder="123-456-7890" value="">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Shipping Method</label>
                                    <input required="" name="trade_details" type="text" class="form-control" placeholder="Enter Shipping Method" id="trade_details">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Payment Method</label>
                                    <select id="payment_method" required="" class="form-control" name="pay_type">
                                      <option value="">Select a payment method</option>
                                        <option value="1">Paypal</option>
                                        <option value="2">Check</option>
                                        <option value="3">Cash</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input id="address" required="" name="address" type="text" class="form-control" placeholder="1234 Left Street" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input id="address_2" name="address_2"  type="text" class="form-control" placeholder="Apt #, Suite #, etc." value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input id="city" required="" name="city" type="text" class="form-control" placeholder="City" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input id="state" required="" name="state" type="text" class="form-control" placeholder="City" value="">
											</div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input id="zip" required="" name="zip" type="text" class="form-control" placeholder="ZIP Code" value="">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-main-color not-rounded pull-right">Save changes</button>
                                <button type="button" class="btn btn-secondary not-rounded pull-right" data-dismiss="modal" style="margin-right:12px;">Close</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      </div>
   </div>
   <!-- Detail modal --> 
   <!-- History modal -->
   <div class="modal fade bs-example-modal-lg" id="ModalHistory" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel"><span class="orderdetails"></span></h4>
            </div>
            <div class="modal-body" id="history_view">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Detail modal --> 
   <!-- Requote modal -->
   <div class="modal fade bs-example-modal-lg" id="ModalRequote" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel"><span class="orderdetails"></span></h4>
            </div>
            <form action="<?= base_url() ?>admin/Trades/requestsubmit" method="POST" >
               <div class="modal-body" >
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>REASON</label>
                           <select class="form-control" name="requote_reason" id="reasondrop">
                              <option>Select a reason</option>
                              <option value="Wrong Condition">Wrong Condition</option>
                              <option value="Device Missing">Device Missing</option>
                              <option value="Other">Other</option>
                           </select>
                        </div>
                     </div>
                     <input type="hidden" name="order_detail_id" id="orderdetailid" >
                  </div>
                  <div class="row" id="otheroptionshow" style="display: none;">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>NEW PRICE</label>
                           <input type="text" name="new_price" placeholder="NEW PRICE (ex. 170)" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="row" id="wrongoptionshow" style="display: none;">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>CONDITION RECEIVED</label>
                           <select class="form-control" name="req_condition" id="con_rec">
                              <option value="">Please select a condition</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row" id="reasonsshow" style="display: none;">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>REASON DESCRIPTION</label>
                           <textarea class="form-control" name="requote_details" rows="5"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-default pull-right">Requote Now / Send Offer Email</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- Requote modal -->
   </div>
   <!-- Seller modal -->
   <div class="modal fade bs-example-modal-lg" id="ModalSeller" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel"><span class="orderdetails"></span></h4>
            </div>
            <form action="<?= base_url() ?>admin/Trades/requestsubmit" method="POST">
               <div class="modal-body" >
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>ISSUE</label>
                           <select class="form-control" name="issue" id="issuedrop">
                              <option value="">Select an issue</option>
                              <option  value="1">Google Locked</option>
                              <option  value="2">iCloud Locked</option>
                              <option  value="3">ESN Financed</option>
                           </select>
                        </div>
                        <input type="hidden" name="order_detail_id" id="order_detail_id" > 
                        <input type="hidden" name="action" value="seller" > 
                     </div>
                  </div>
                  <div class="row" id="esnoptionshow" style="display: none;">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>ESN</label>
                           <input type="text" name="esn" placeholder="Device ESN" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-default pull-right">Send action email</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- Seller modal -->
</div>
<script>
   var this_cond;
   var cond_arr = <?= json_encode($conditions); ?>;
   
   $("#reasondrop").on('change',function(){
    var getValue=$(this).val();
    if(getValue=='Other'){
      $('#otheroptionshow').show();
      $('#reasonsshow').show();
      $('#wrongoptionshow').hide();
    }
    else if(getValue=='Wrong Condition'){
   $.each(cond_arr,function(key, value){
    if(value.title != this_cond){
   $("#con_rec").append('<option value=' + value.id + '>' + value.title + '</option>');
    }
   });
       $('#otheroptionshow').hide();
       $('#wrongoptionshow').show();
        $('#reasonsshow').show();
   
    }
    else{
      $('#wrongoptionshow').hide();
        $('#otheroptionshow').hide();
        $('#reasonsshow').hide();
    }
   }); 
   $("#issuedrop").on('change',function(){
    var getValue=$(this).val();
    if(getValue=='ESN Financed'){
      $('#esnoptionshow').show();
    }
    else{
      $('#esnoptionshow').hide();
    }
   });
   
   function get_details(id){
   	$.ajax({
   		url:"<?= base_url(); ?>admin/trades/get_order",
   		type:'POST',
   		data:{'id':id},
   		success:function(result){
   			$("#detail_view").html(result);
   			$("#ModalOdet").modal("show");
   		},
   		error: function (xhr, textStatus, errorThrown){
   			console.log(xhr.responseText);
   		}
   	});
   }
   function get_history(slug){
	   
   	$.ajax({
   		url:"<?= base_url(); ?>admin/trades/get_history",
   		type:'POST',
   		data:{'id':slug},
   		success:function(result){
   			$("#history_view").html(result);
			$(".orderdetails").html('Order #'+slug+' / <strong>History</strong>');
			$("#ModalHistory").modal("show");
   			
   		},
   		error: function (xhr, textStatus, errorThrown){
   			console.log(xhr.responseText);
   		}
   	});
   }
   function edit_order(id){
   	$.ajax({
   		url:"<?= base_url(); ?>admin/trades/get_order_to_edit",
   		type:'POST',
   		data:{'id':id},
   		success:function(result){
			var dataSave = $.parseJSON(result);
			$(".orderdetails").html('Order #'+dataSave.order_code+' For '+dataSave.first_name+' '+dataSave.last_name+' / <strong>Edit</strong>');
			$('#orderid').val(dataSave.id);
			$('#fname').val(dataSave.first_name);
			$('#lname').val(dataSave.last_name);
			$('#email').val(dataSave.email);
			$('#phone').val(dataSave.phone);
			var address = dataSave.address.split(',');
			$('#address').val(address[0]);
			$('#address_2').val(address[1]);
			$('#state').val(address[2]);
			$('#city').val(dataSave.city);
			$('#zip').val(dataSave.zip);
			$('#payment_method').val(dataSave.pay_type);
			$('#trade_details').val(dataSave.trade_details);
			$("#ModalEdit").modal("show");
			
			
   			
   		},
   		error: function (xhr, textStatus, errorThrown){
   			console.log(xhr.responseText);
   		}
   	}); 
   }
   // function change_order_status(id,status){
		// swal({
			// title: "Are you sure, You Want to Perform this action?",
			// icon: "warning",
			// buttons: true,
		// })
		// .then((changeStatus) => {
			// if (changeStatus){
				// $.ajax({
					// url:"<?= base_url(); ?>admin/trades/ch_status",
					// type:'POST',
					// data:{'id':id,'status':status},
					// success:function(result){
						// swal("Status Changed!", {icon: "success"});
						// setTimeout(location.reload(), 1000);
					// },
					// error: function (xhr, textStatus, errorThrown){
						// console.log(xhr.responseText);
					// }
				// });
			  // }
		// });
	// } 
	
	   function change_order_status(id){
   var status=$("#o_st"+id).val();
   	$.ajax({
   		url:"<?= base_url(); ?>admin/trades/ch_status",
   		type:'POST',
   		data:{'id':id,'status':status},
   		success:function(result){
   			$("#msg").html('<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Status Updated!</b></div>');
   $("#msg").show();
   // setTimeout(function(){$("#msg").hide(); }, 1000);
   setTimeout(location.reload(), 1000);
   		},
   		error: function (xhr, textStatus, errorThrown){
   			console.log(xhr.responseText);
   		}
   	});
   }
	
   function change_order_action(action,id){
         if(action=='requote'){
                    $.ajax({
                     url:"<?= base_url(); ?>admin/trades/get_order_details",
                     type:'POST',
                     data:{'id':id,'action':action},
                     success:function(result){
                        var dataSave = $.parseJSON(result);
   			
                        $("#orderdetailid").val(dataSave.id);
                        $(".orderdetails").html('Order #'+dataSave.order_code+' / '+dataSave.device+'_'+dataSave.provider+'_'+dataSave.storage+'_'+dataSave.condition+' / <strong>Requote</strong>');
   			this_cond=dataSave.condition;
                    
                     },
                     error: function (xhr, textStatus, errorThrown){
                        console.log(xhr.responseText);
                        }
                     });
   
               $("#ModalRequote").modal("show");
         }
         else if(action=='seller'){
   
                 $.ajax({
                     url:"<?= base_url(); ?>admin/trades/get_order_details",
                     type:'POST',
                     data:{'id':id,'action':action},
                     success:function(result){
                        var dataSave = $.parseJSON(result);
                        $("#order_detail_id").val(dataSave.id);
                        $(".orderdetails").html('Order #'+dataSave.order_code+' / '+dataSave.device+'_'+dataSave.provider+'_'+dataSave.storage+'_'+dataSave.condition+' / <strong>Action Required</strong>');
                    
                     },
                     error: function (xhr, textStatus, errorThrown){
                        console.log(xhr.responseText);
                        }
                     });
          $("#ModalSeller").modal("show");
   
         } 
         else{
               $.ajax({
               url:"<?= base_url(); ?>admin/trades/Ch_action",
               type:'POST',
               data:{'id':id,'action':action},
               success:function(result){
                  $("#msg").html('<div class="alert alert-warning alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>Request Sent ! Please check your mail.</b></div>');
          
               setTimeout(function(){$("#msg").hide(); }, 1000);
               setTimeout(location.reload(), 1000);
               },
               error: function (xhr, textStatus, errorThrown){
                  console.log(xhr.responseText);
               }
            });
         }
   
   }
   
   
</script>