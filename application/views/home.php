<style>
.slider-thumb {
    top: 0px;
	margin-left: -105px;
}
.slider-thumb img {
    width: 115%;
}
.main-header.blog {
    background-image: none;
    background-color: gray;
}
</style>
<div class="clear"></div>
<div class="main-slider">
   <!--  main slider start here -->
   <div class="container">
      <div class="row">

<section id="demos">
       <div class=""> <!-- Own carosuel start here -->

         
         <div class="item">
         <div class="slider-one">
            <!-- Slider one start here -->
            <div class="col-md-6">
               <div class="slider-text">
                  <!-- slider text start here -->
                  <h1>Sell Your Device</h1>
                  <h2>Get Paid!</h2>
                  <h3>Sell Cell Phone, Tablets & More</h3>
                  <a href="<?= base_url(); ?>sell/#banner">Get Your Offer</a>
               </div>
               <!-- slider text end here -->
            </div>
            <div class="col-md-6">
               <div class="slider-thumb">
                  <!-- Slider thumb start here -->
                  <img src="<?= base_url(); ?>assets/front/images/img1.png" alt="" />
               </div>
               <!-- Slider thumb end here -->
            </div>
         </div>
         </div>
         
         </div> <!-- Owl carosuel end here -->
         </div> <!-- Section id end here -->
         
         <!-- Slider one end here -->
      </div>
   </div>
</div>
<!--  main slider end here -->
</div>
<!-- main header end here -->
<div class="clear"></div>
<div class="process-row">
   <!-- Process row start here -->
   <div class="container">
      <div class="row">
         <div class="process-steps">
            <!-- Process steps start here -->
            <div class="col-md-3">
               <div class="process-text">
                  <h4>how it
                     works
                  </h4>
                  <p>(3 Easy Steps)</p>
               </div>
            </div>
            <div class="col-md-3">
               <div class="step01-col">
                  <div class="step01-thumb">
                     <img src="<?= base_url(); ?>assets/front/images/step01.png" alt="" />
                  </div>
                  <div class="step-text">
                     <p>Select Device</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="step01-col">
                  <div class="step01-thumb">
                     <img src="<?= base_url(); ?>assets/front/images/step02.png" alt="" />
                  </div>
                  <div class="step-text">
                     <p>Ship or Drop Off locally</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="step01-col last-step">
                  <div class="step01-thumb">
                     <img src="<?= base_url(); ?>assets/front/images/step03.png" alt="" />
                  </div>
                  <div class="step-text">
                     <p>Get Paid</p>
                  </div>
               </div>
            </div>
         </div>
         <!-- Process steps end here -->
      </div>
   </div>
</div>
<!-- Process row end here -->
<div class="clear"></div>
<div class="testimonials-row">
   <!-- testimoials row start here -->
   <div class="testimonials-title">
      <!-- testimonials title start here -->
      <h2>Customer Reviews</h2>
     
   </div>
   <!-- testimonials title end here -->
   <div class="testi-cols-inner">
      <!-- Testi cols inner start here -->
      <div class="container">
         <div class="row">
            
               
                  <div id="google-reviews" class="col-md-12"></div>

<link rel="stylesheet" href="https://cdn.rawgit.com/stevenmonson/googleReviews/master/google-places.css">
<script src="https://cdn.jsdelivr.net/gh/stevenmonson/googleReviews@6e8f0d794393ec657dab69eb1421f3a60add23ef/google-places.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC-p6Hvk_NPu7XXgS8j5qxn9ENivQq1Lv4&signed_in=true&libraries=places"></script>
`<script>
jQuery(document).ready(function( $ ) {
   $("#google-reviews").googlePlaces({
        placeId: 'ChIJsciG4RLV3IARSjtD81ptNsM' //Find placeID @: https://developers.google.com/places/place-id
      , render: ['reviews']
      , min_rating: 4
      , max_rows:4
   });
});
</script>
               
            
          
         </div>
      </div>
   </div>
   <!-- Testimonials cols inner start here -->
</div>
<!-- testimoials row end here -->
<div class="clear"></div>
<div class="blog-row">
   <!-- blog row start here -->
   <div class="blog-title">
      <!-- Blog title start here -->
      <h6>Check Out Our Blogs</h6>
      <p>Hear the latest news on tech & more</p>
   </div>
   <!-- Blog title end here -->
   <div class="blog-inner-posts">
      <!-- Blog inner posts start here -->
      <div class="container">
         <div class="row">
		 <?php
			foreach($home_blogs as $hblog){ ?>
            <div class="col-md-4">
               <div class="blog-col-1">
                  <div class="blog-thumb">
					<?php
						$blog_image=($hblog['image'] != "" ? $hblog['image'] : 'dummy.png');
					?>
                     <img src="<?= base_url().'assets/uploads/blogs/'.$blog_image; ?>" alt="<?= $hblog['title']; ?>" />
                  </div>
				  <div class="blog-content">
                     <strong><a href="<?= base_url().$hblog['slug']; ?>" target="_blank"><?= $hblog['title']; ?></a></strong>
                     <p>By <?= Site_Title; ?> on <?= date('jS M Y',strtotime($hblog['created_at'])); ?></p>
                  </div>
               </div>
            </div>
			<?php } ?>
         </div>
         <!-- Blog inner posts end here -->
      </div>
      <!-- blog row end here -->
   </div>
</div>
<div class="clear"></div>
<div class="offer-row">
   <!-- Offer row start here -->
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="offer-text">
               <p>Sell Your Cell Phone, Tablets & More</p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="offer-btn">
               <a href="<?= base_url(); ?>sell/#banner">Get Offer</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Offer row end here -->
<!--
<script>

jQuery(document).ready(function($) {
  $('.owl-carousel').owlCarousel({
	items: 1,
	lazyLoad: true,
	lazyLoadEager: 1,
	loop: true,
	margin: 10,
	autoHeight: true
  });
});
</script> -->





