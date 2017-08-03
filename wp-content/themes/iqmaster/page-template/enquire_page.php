<?php
/*
* Template Name: Contact Us Page Template
*/
get_header();
global $Post;
$post_id = get_the_ID();
?>
<style>
#owl-demo{
	display:none !important;
}
</style>
<main role="main">
  <?php
    /*************************Home Page Loop Starts*************************************/
        while ( have_posts() ) : the_post();
            /*------------------------Attachment by url by addribute size------------------------------------------*/
            $image_id=get_post_meta($post->ID,"_thumbnail_id",true);
            $thumb = wp_get_attachment_image_src($image_id, 'full' );
            $url = $thumb['0'];
            /*------------------------Attachment by url by addribute size------------------------------------------*/
         ?>
          <section class="internal-banner fadeIn">
            <div class="banner-image" style="background-image:url(<?php if ( $url != "" ) {echo $url;} else { echo "http://placehold.it/1920x618&amp;text=No image found"; } ?>);">
             <div class="container">
                <div class="banner-capt">
                 <h2>Enquire Now</h2> 
                </div>
              </div>
              </div>
            </div>
          </section>
    <?php 
        endwhile; wp_reset_query();
    /*************************Home Page Loop Ends*************************************/
    ?>
<section class="contact-detail-section">
 <div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4  wow fadeIn">
            <div class="circle-holder">
                <div class="circle-icon-holder" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/faq-banner-bg.jpg);">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/phone-contact.png" alt=""/>
                </div>
                <div class="circle-content">
                    <h3>Phone Number</h3>
                    <a href="tel:<?php the_field("phone_number" , $post_id); ?>"><?php the_field("phone_number" , $post_id); ?></a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-4 wow fadeIn">
        <div class="circle-holder">
                <div class="circle-icon-holder" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/faq-banner-bg.jpg);">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mail-conatct.png" alt=""/>
                </div>
                <div class="circle-content">
                    <h3>Email</h3>
                    <a href="mailto:<?php the_field("email_address" , $post_id); ?>"><?php the_field("email_address" , $post_id); ?></a>
                </div>
            </div>    
        </div>
        
        <div class="col-lg-4 col-md-4 wow fadeIn">
            <div class="circle-holder">
                <div class="circle-icon-holder" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/faq-banner-bg.jpg);">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/address-contact.png" alt=""/>
                </div>
                <div class="circle-content">
                    <h3>Address</h3>
                    <span><?php the_field("address" , $post_id); ?></span>
                </div>
            </div>
        </div>
        </div>
    </div>
 </div>
</section>
<section class="contact-form-section wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                <h2>Get In Touch</h2>
                <div class="c-frm">
                	<?php echo do_shortcode('[contact-form-7 id="95" title="Contact form 1"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>    
<section class="testimonial-home bg_fixed  wow fadeIn" style="background:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/testim-bg.jpg)">
  <div class="container">
    <div class="row">
        <h2>Testimonials</h2>
                    <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">

                                <!-- Quote 1 -->
                                <?php 
                                $i=1;
                                query_posts( array ( 'post_type' => 'testimonial','showposts'=>'5','order'=>'DESC') ); ?> 
                                <?php while ( have_posts() ) : the_post(); ?>
                                <div class="item <?php if($i==1){echo 'active';} ?>">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">

                                                <?php the_content(); ?>
                                                <div class="author"><?php the_title(); ?><br>
                                                    <small><?php the_field("designation",get_the_ID()); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <?php $i++; endwhile; wp_reset_query(); ?>
                            </div>
                            
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators">
                                 <?php 
                                $i=0;
                                query_posts( array ( 'post_type' => 'testimonial','showposts'=>'5','order'=>'DESC') ); ?> 
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <li data-target="#quote-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo 'active';} ?>"></li>
                                <?php
                                $i++; endwhile; wp_reset_query(); ?>
                            </ol>

                            <!-- Carousel Buttons Next/Prev -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
  </div>
</section> 

<?php
get_footer();
?>