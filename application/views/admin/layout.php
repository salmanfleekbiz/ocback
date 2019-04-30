<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=Admin_Title?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- Switchery -->
    <link href="<?= base_url(); ?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
    <link href="<?= base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?= base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/build/css/dynamic.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	
	<style type="text/css">
  .error{
	color: #E74C3C;
    font-weight: 100;
  }

</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url(); ?>" class="site_title" target="_blank">
				<img src="<?= base_url(); ?>assets/images/logo.png" style="max-width: 100%;" />
			  </a>
            </div>
            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
				  <li><a href="<?= base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>	
				  <li><a><i class="fa fa-edit"></i>CMS <span class="fa fa-chevron-down"></span></a>
					  <ul class="nav child_menu">
						<li><a href="<?= base_url(); ?>admin/posts">Blogs/Pages</a></li>
						<li><a href="<?= base_url(); ?>admin/faqs">Faqs</a></li>
						<li><a href="<?= base_url(); ?>admin/contact-queries">Contact/Queries</a></li>
					  </ul>
				  </li>
				  <li><a><i class="fa fa-dollar"></i>Pricing<span class="fa fa-chevron-down"></span></a>
					  <ul class="nav child_menu">
						  <?php
						  $side_cat=$viewData['side_cat'];
						  unset($viewData['side_cat']);
						  foreach($side_cat AS $scat){
							echo '<li><a href="'.base_url().'admin/pricing?category='.$scat['id'].'">'.$scat['title'].'</a></li>';
						  }
						?>
					  </ul>
				  </li>
				  <li><a href="<?= base_url(); ?>admin/promocode"><i class="fa fa-tag"></i> <span>Promo code</span></a></li>
				</ul>
				<h3>Trade-ins</h3>
                <ul class="nav side-menu">
					<li><a href="<?= base_url(); ?>admin/current-trade-ins"><i class="fa fa-refresh"></i> <span>Current Trade-ins</span></a></li>
					<li><a><i class="fa fa-clipboard"></i>Action Items <span class="fa fa-chevron-down"></span></a>
					  <ul class="nav child_menu">
						<li><a href="<?= base_url(); ?>admin/trade-ins/needs-shipping-kit">Needs Shipping Kit</a></li>
						<li><a href="<?= base_url(); ?>admin/trade-ins/received-needs-inspection">Received-Needs Inspection</a></li>
						<li><a href="<?= base_url(); ?>admin/trade-ins/requote-pending">Requote Pending</a></li>
						<li><a href="<?= base_url(); ?>admin/trade-ins/seller-action-pending">Seller Action Pending</a></li>
						<li><a href="<?= base_url(); ?>admin/trade-ins/requote-completed">Requote Completed</a></li>
						<li><a href="<?= base_url(); ?>admin/trade-ins/seller-action-completed">Seller Action Completed</a></li>
						<li><a href="<?= base_url(); ?>admin/trade-ins/requote-rejected">Requote Rejected</a></li>
						<li><a href="<?= base_url(); ?>admin/trade-ins/needs-payment">Needs Payment</a></li>
					  </ul>
					</li>
					
					<li><a href="<?= base_url(); ?>admin/past-trades"><i class="fa fa-check-square-o"></i> <span>Past Trade-ins</span></a></li>
                </ul>
				<h3>Settings - Catalog</h3>
                <ul class="nav side-menu">
					<li><a><i class="fa fa-tablet"></i>Models <span class="fa fa-chevron-down"></span></a>
					  <ul class="nav child_menu">
						<?php
						  foreach($side_cat AS $scat){
							echo '<li><a href="'.base_url().'admin/models?category='.$scat['id'].'">'.$scat['title'].'</a></li>';
						  }
						?>
					  </ul>
					</li>
					<li><a href="<?= base_url(); ?>admin/categories"><i class="fa fa-sitemap"></i> <span>Categories</span></a></li>
					<li><a href="<?= base_url(); ?>admin/condition"><i class="fa fa-question-circle"></i> <span>Condition</span></a></li>
					<li><a href="<?= base_url(); ?>admin/providers"><i class="fa fa-users"></i> <span>Providers</span></a></li>
					<li><a href="<?= base_url(); ?>admin/storage"><i class="fa fa-database"></i> <span>Storage</span></a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
               <div class="nav toggle">
                <a data-toggle="modal" data-target="#conModal"  ><i class="fa fa-gears"></i></a>
              </div>
               

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a data-toggle="modal" data-target="#proModal"> Update Profile</a></li>
                    <li><a href="<?= base_url('admin/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
				<li>
				<a onclick="sync_xml()" class="btn btn-default" style="padding: 3px 10px;margin-top: 7px;"><i class="fa fa-refresh"></i> Sync Product Feed</a>
				</li>
			  </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
         <!-----------------Settings Modal ------------------>
    <form role="form" id="settingsform" method="post" enctype="multipart/form-data" name="frmPage">
    <div class="modal fade" id="conModal"  tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="panel-title" id="myModalLabel">Update Website Settings</h3>
         </div>
         
         <div class="modal-body">
           <div id="settingsmsg"></div>
          <div class="form-group col-md-6">
           <label>Site Name:</label>
           <input type="text" name="Title" value="<?=Site_Title?>" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
           <label>Admin Site Name:</label>
           <input type="text" name="ATitle" value="<?=Admin_Title?>" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
           <label>Site Email:</label>
           <input type="text" name="Email" value="<?=Site_Email?>" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
           <label>Phone No:</label>
           <input type="text" name="Phone" value="<?=Phone?>" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
           <label>Address:</label>
           <input type="text" name="Address" value="<?=Address?>" class="form-control" required>
          </div>
          <div class="form-group col-md-6">
           <label>Website:</label>
           <input type="text"   name="Website" value="<?=Website?>" class="form-control" required />
          </div> 

          <div class="form-group col-md-12">
           <label>SMTP Host:</label>
           <input type="text" name="SMTP_Host" value="<?=SMTP_Host?>" class="form-control" >
          </div>
          <div class="form-group col-md-6">
           <label>SMTP Email:</label>
           <input type="text" name="SMTP_Email" value="<?=SMTP_Email?>" class="form-control" >
          </div>
          <div class="form-group col-md-6">
           <label>SMTP Password:</label>
           <input type="password" name="SMTP_Pass" value="" class="form-control">
           <p> leave empty if don't want to change </p>
          </div>
          <div class="form-group col-md-6">
           <label>SMTP Port:</label>
           <input type="number" step="any" min="0" name="SMTP_Port" value="<?=SMTP_Port?>" class="form-control">
          </div>
            <div class="form-group col-md-6">
           <label>Timezone:</label>
           <input type="text"   name="Timezone" value="<?=Timezone?>" class="form-control" required />
          </div> 
          <div class="form-group col-md-6">
           <label>Facebook Tracking Pixel ID:</label>
           <input type="text" name="FacebookID" value="<?=FacebookID?>" class="form-control">
          </div>
            <div class="form-group col-md-6">
           <label>Google Analytics ID String:</label>
           <input type="text" name="GoogleID" value="<?=GoogleID?>" class="form-control" required />
          </div> 
          <div class="clearfix"></div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
          <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i>   Update</button>
         </div>
      </div>
     </div>
    </div>
   </form>
   <!----------------------/Settings Modal ----------------------->
   
         <!-----------------Profile Modal ------------------>
    <form role="form" id="profileform" method="post" >
    <div class="modal fade" id="proModal"  tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="panel-title" id="myModalLabel">Update Profile Settings</h3>
         </div>
         
         <div class="modal-body">
           <div id="profilemsg"></div>
          <div class="form-group col-md-6">
           <label>User Name:</label>
           <input type="text" name="user_name" value="<?= $_SESSION['admin_user_name']; ?>" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
           <label>Admin Email:</label>
           <input type="text" name="user_email" value="<?= $_SESSION['admin_email']; ?>" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
           <label>Admin Password:</label>
           <input type="password" name="user_password" value="" class="form-control">
           <p> leave empty if don't want to change </p>
          </div>
          <div class="clearfix"></div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
          <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i>   Update</button>
         </div>
      </div>
     </div>
    </div>
   </form>
   <!----------------------/Settings Modal ----------------------->

        <!-- page content -->
        <div class="right_col" role="main">
			<?php  $this->load->view($view,$viewData); ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered by OCBuyBack</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
	<script src="<?= base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
	<!-- Switchery -->
    <script src="<?= base_url(); ?>assets/vendors/switchery/dist/switchery.min.js"></script>
	<!-- jquery.inputmask -->
    <script src="<?= base_url(); ?>assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
	<script src="https://sweetalert.js.org/assets/sweetalert/sweetalert.min.js"></script>
	<script> var baseurl="<?= base_url();?>";</script>
    <!-- Custom Theme Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="<?= base_url(); ?>assets/build/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
	<script>
		function sync_xml(){
			$.ajax({
			url:"<?= base_url();?>gen_feed.php",
			success:function(res){
			  if(res==1){
				swal("Success!", "Your product feed has been synchronized.", "success");
			  }
			  else{
				swal("Error", "There was an error synchronizing the product feed ", "error");
			  }
			},
			error: function (xhr, textStatus, errorThrown){
				console.log(xhr.responseText);
			}
		});
		}
	</script>
  </body>
</html>