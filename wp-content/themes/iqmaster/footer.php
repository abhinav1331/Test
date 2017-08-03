<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$id_sec = get_the_ID();
$id = get_queried_object()->term_id;
?>
<?php
if($id_sec != 43 && $id_sec != 103 && $id != 5 && $id != 6 && $id != 7 && !is_404())
{
  ?>
    <section>
      <div id="owl-demo">
        <?php  
        $one1 = get_post_meta(5,'gallery_section',true); 
        $arr1=get_numerics($one1);
        $index = 1;
        foreach($arr1 as $val1) {
          $small_image_url1 = wp_get_attachment_image_src($val1, 'full');
          $image_alt = get_post_meta( $val1, '_wp_attachment_image_alt', true); ?>
              <div class="item"><img src="<?php echo $small_image_url1[0]; ?>" alt="<?php echo $image_alt; ?>"></div>
        <?php  }  ?>
      </div>
    </section>
  <?php
}
?>    

</main>
 <footer class="footer  wow fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="footer-top">
          <div class="row">
            <div class="col-lg-4 col-md-3">
            <div class="fst-foot">
            <a href="<?php echo site_url(); ?>" class="foot-logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/foot-logo.png" alt="IQ Smarter" /> <span></span></a>
            <h3>Stay In Touch</h3>
            <div class="footform">
                <form>
                    <input type="email" placeholder="Email">
                    <input type="button" class="btn" value="Sign Up">                    
                </form>
            </div>    
            <h3>Connect With Us</h3>
              <ul class="social">
                <li><a href="<?php the_field('facebook',90); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <!--     <li><a href="<?php the_field('twitter',90); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="<?php the_field('linkedin',90); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> -->
                <li><a href="<?php the_field('google_plus',90); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              </ul>
            </div>    
            </div>
            <div class="col-lg-3 col-md-3">
              <h3>Where We are</h3>
              <ul>
                <li>
                  <?php the_field('maps',90); ?>
                </li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
              <h3>Quick Links</h3>
              <ul>
                <?php
                    $defaults = array(
                      'theme_location'  => '',
                      'menu'            => 'footer_nav',
                      'container'       => 'footer_nav',
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => 'menu',
                      'menu_id'         => '9',
                      'echo'            => true,
                      'fallback_cb'     => 'wp_page_menu',
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '%3$s',
                      'depth'           => 0,
                      'walker'          => ''
                    );

                    wp_nav_menu( $defaults );

                ?>   
              </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <h3>Contact us</h3>
              <ul class="address-foot">
                  <li class="phn"><i class="fa fa-mobile" aria-hidden="true"></i> Phone Number<br><a href="tel:<?php the_field('phone_number',90); ?>"><?php the_field('phone_number',90); ?></a></li>
                  <li class="mail"><i>@</i>Email<br><a href="mailto:<?php the_field('email_address',90); ?>"><?php the_field('email_address',90); ?></a>
                  <li class="addr"><i class="fa fa-location-arrow" aria-hidden="true"></i>Address<br> <?php the_field('address',90); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="copyright-pk">
        <div class="container">
          <p>Copyright <?php echo date('Y'); ?> IQ Smarter Home, All Rights Reserved, Website and SEO by <a href="http://tradesignaus.com.au/" target="_blank">Tradesign</a>.</p>
        </div> 
    </div> 
</footer> 
  
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<?php wp_footer(); ?>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/modernizr.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/4.0.1/placeholders.min.js"></script> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.BlackAndWhite/0.3.6/jquery.BlackAndWhite.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.3.8/SmoothScroll.min.js"></script>-->
<script>
    wow = new WOW(
    {
    boxClass:     'wow',     
    animateClass: 'animated', 
    offset:       100,     
    mobile:       true,      
    live:         true       
    }
    )
    wow.init();

	// jQuery('.owl-carousel').owlCarousel({
 //    loop:true,
 //    margin:0,
	// autoHeight:true,
 //    nav:false,
	// dots:true,
	// autoplay:true,
	// autoplayTimeout:5000,
	// autoplayHoverPause:true,
 //    responsive:{
 //        0:{
 //            items:1
 //        },
 //        600:{
 //            items:1
 //        },
 //        1000:{
 //            items:1
 //        }
 //    }
	// });
	
	jQuery('#banner-slider').carousel({
	interval: 5000
	})
	
	jQuery('.bwWrapper').BlackAndWhite({
        hoverEffect : true,
        onImageReady:function(img) {
        }
    });
	
	
	jQuery(window).on('scroll', function() {
		var st = jQuery(this).scrollTop();
		jQuery('.banner-image').css({ 'opacity' : (1 - st/850) });
	});
	//Stop dropdown from closing on click inside
	jQuery('ul.dropdown-menu').on('click', function(event){event.stopPropagation();});
</script>
    <script>
jQuery( '.mov-hov' ).append( '<span></span>' );
</script>
    
    
<script type="text/javascript">
       if (navigator.userAgent.match(/Trident\/7\./)) { // if IE
          jQuery('body').on("mousewheel", function () {
               // remove default behavior
               event.preventDefault();

               //scroll without smoothing
               var wheelDelta = event.wheelDelta;
               var currentScrollPosition = window.pageYOffset;
               window.scrollTo(0, currentScrollPosition - wheelDelta);
           });
       }
   </script>  
   <script>
     

    jQuery(document).ready(function() {
     
      var owl = jQuery("#owl-demo");
     
      owl.owlCarousel({
          loop:true,
          items : 5,
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,2],
          itemsMobile : false,
		  autoplay:true,
		  autoplayTimeout:1000,
		  autoplayHoverPause:true
      });
      
      // Custom Navigation Events
      /* jQuery(".next").click(function(){
        owl.trigger('owl.next');
      })
      jQuery(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      jQuery(".play").click(function(){
        owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
      })
      jQuery(".stop").click(function(){
        owl.trigger('owl.stop');
      }) */
     
      //jQuery("body>div:eq(1)").remove();
	  
	  
	  setTimeout(explode, 2000);
	  
    });

	function explode()
	{
		jQuery('body>div:first').next('div').remove();
	}
   </script>
   <script type="text/javascript">
      jQuery('.alphaonly').bind('keypress',function(event){ 
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
            event.preventDefault(); 
        }
      });
   </script>

<!-- FlexSlider -->
  <script defer src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    // jQuery(function(){
    //   SyntaxHighlighter.all();
    // });
    jQuery(window).load(function(){
      jQuery('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 250,
        itemMargin: 20,
        asNavFor: '#slider'
      });

      jQuery('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });
  </script>


<!--script>
  jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() >= 10) {
        jQuery('html').addClass('manage-head');
        jQuery('.header').addClass('fixd');
        jQuery('.responsive-menu-button').addClass('fix-it');
    } else {
        jQuery('html').removeClass('manage-head');
        jQuery('.header').removeClass('fixd');
        jQuery('.responsive-menu-button').removeClass('fix-it');
        
    }
});
</script-->

<script>
  jQuery(document).ready(function () {
        jQuery('html').addClass('manage-head');
        jQuery('.header').addClass('fixd');   
});

 (function ($) {
     $(window).on("load", function () {


         $(".scroll_custom").mCustomScrollbar({
             autoHideScrollbar: true,
             theme: "rounded"
         });

     });
 })(jQuery);
</script>


    
    

</div>    
</body>
</html>
