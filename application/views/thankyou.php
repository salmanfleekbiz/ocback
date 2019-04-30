<div class="clear"></div>
<div class="latest-faq-title">
   <!-- Latest blog title start here -->
   <h2>Thank You</h2>
   <div class="back-btn">
      <!-- Back btn start here -->
      <p><a href="<?= base_url(); ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Back to Home</a></p>
   </div>
   <!-- Back btn end here -->
</div>
<!-- Latest blog title end here -->  
</div> <!-- main header end here -->
<div class="clear"></div>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="tabbable-panel">
            <?= $content?>
		 </div>
	  </div>
   </div>
</div>
<script>

function toggleIcon(e) {
$(e.target)
.prev('.panel-heading')
.find(".more-less")
.toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);

</script>    
        