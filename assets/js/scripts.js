	$(document).ready(function() {
		$('.jselect2').select2({
		  placeholder: 'Select an option'
		});
		$('#order-datatable-buttons').DataTable( {
			"order": [[ 1, "desc" ]]
		});
	});
	
	$( "#settingsform" ).on( "submit", function(event){
		event.preventDefault();
		var val=$( this ).serialize() ;
		$.ajax({
		  type: "POST",
		  data: val,
		  url: 'updatesettings',
		  success: function (data) {
			if(data == 1){
			  $('#settingsmsg').html('<p><b style="color: green;">Settings Successfully Updated </b></p>');
			}
			else{
			  $('#settingsmsg').html('<b style="color: error;">Error Submitting your request. Please Try Again. </b>');
			}
		  },
		  error: function (xhr, textStatus, errorThrown) 
		  {
			console.log(xhr.responseText);
		  }
		});
	}); 
	
	$( "#profileform" ).on( "submit", function(event){
		event.preventDefault();
		var val=$( this ).serialize() ;
		$.ajax({
		  type: "POST",
		  data: val,
		  url: 'updateprofile',
		  success: function (data) {
			if(data == 1){
			  $('#profilemsg').html('<p><b style="color: green;">Profile Successfully Updated </b></p>');
			}
			else{
			  $('#profilemsg').html('<b style="color: error;">Error Submitting your request. Please Try Again. </b>');
			}
		  },
		  error: function (xhr, textStatus, errorThrown) 
		  {
			console.log(xhr.responseText);
		  }
		});
	}); 
	  
	$("#Addform").submit(function(e) { 
		e.preventDefault(); // avoid to execute the actual submit of the form.
		if ($('#Addform').valid()) {
			var action =$('#Addform').attr('action');
			var value =new FormData(this);
			$.ajax({
				url:action,
				type:'POST',
				data:value,
				processData: false,
                contentType: false,
				success:function(result){
					if(result==0){
						$("#msg").html('<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Error. Please Try Again!</b></div>');
						$("#msg").show();
						setTimeout(function(){$("#msg").hide(); }, 1000);

					}
					else if(result==1){	
						$("#msg").html('<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Record Inserted!</b></div>');
						$("#msg").show();
						setTimeout(function(){location.reload(); }, 1000);
					}
					else if(result==2){	
						$("#msg").html('<div class="alert alert-warning alert-dismissable"><i class="fa fa-warning"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Record Already Exists!</b></div>');
						$("#msg").show();
						setTimeout(function(){$("#msg").hide(); }, 1000);
					}
				},
				error: function (xhr, textStatus, errorThrown){
					alert(xhr.responseText);
				}
			});
		}

	});
		
	// $(".btn-edit").click(function(){
	$(document).on("click",".btn-edit",function() {
		$("#id").val($(this).data("id"));
		$("#title").val($(this).data("title"));
	});
	
	$(".checkUncheckAll").click(function () {
		$(".chkIds").prop("checked", $(this).prop("checked"));			
	});

	$("#Editform").submit(function(e){
	  e.preventDefault(); // avoid to execute the actual submit of the form.
	  if ($('#Editform').valid()) {
		var action =$('#Editform').attr('action');
		var value =new FormData(this);
		  $.ajax({
			url:action,
			type:'POST',
			data:value,
			processData: false,
			contentType: false,
			success:function(result){
				if(result==0){
					$("#msge").html('<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Error. Please Try Again!</b></div>');
					$("#msg").show();
					setTimeout(function(){$("#msge").hide(); }, 2000);

				}
				else if(result==1){	
					$("#msge").html('<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Record Updated!</b></div>');
					$("#msg").show();
					setTimeout(function(){location.reload(); }, 2000);
				}
				else if(result==2){	
					$("#msge").html('<div class="alert alert-warning alert-dismissable"><i class="fa fa-warning"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Record Already Exists!</b></div>');
					$("#msg").show();
					setTimeout(function(){$("#msge").hide(); }, 2000);
				}
				else if(result==3){	
					$("#msge").html('<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b> Record Updated! Error Uploading Image</b></div>');
					$("#msg").show();
					setTimeout(function(){$("#msge").hide(); }, 2000);
				}
			},
			error: function (xhr, textStatus, errorThrown){
				alert(xhr.responseText);
			}
		});

	  }
	});
	
	function togglestatus(id,cont){
		$.ajax({
			url : baseurl+'admin/'+cont+"/toggleStatus",
			type: "POST",
			data :{id: id} ,
			success: function(data, textStatus, jqXHR){
			   if(data){
				   $('#msg').html('<p class="alert alert-success" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Status Successfully Updated</p>');
				}
			},
			error: function (xhr, textStatus, errorThrown){
				alert(xhr.responseText)
			}
		});
    }
	
	function doDelete(id){
		if(id != 'undefined'){
			$("#chk-"+id).prop( "checked", true );
		}
		if($(".chkIds").is(":checked")){
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover it!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				swal("Record Deleted!", {
				  icon: "success",
				});
				$("#tblform").submit();
			  } else {
				$("#chk-"+id).prop( "checked", false );
			  }
			});
		}
		else
			swal("Please select a record to delete");
	}