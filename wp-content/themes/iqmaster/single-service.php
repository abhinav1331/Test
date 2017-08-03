<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
global $post;?>
<main role="main">

<?php
// Start the loop.
while ( have_posts() ) : the_post();
?> 
<input type="hidden" id="titlee" value="<?php the_title(); ?>" />
  <section class="internal-banner wow fadeIn">
    <div class="banner-image" style="background-image:url(<?php the_field("background_image",get_the_ID()); ?>);">
      <div class="container">
        <div class="banner-capt">
          <!--<h2><?php the_title(); ?></h2>-->
          <h2><?php echo the_field('banner_content'); ?></h2>
        </div>
      </div>
    </div>
  </section>
  

<section class="contact-section">
 <div class="container">
    <div class="row">    
        <div class="col-lg-6 col-md-6  wow fadeIn">
            <div class="contact-content" >
                <?php the_content(); ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 wow fadeIn">
				<?php 
				/*
				$benefit=get_field('benifits',$post->ID);
				if ($benefit !="") {
                ?>
                <div class="benefits">
                   <?php the_field("benifits",get_the_ID()); ?>
                </div>
                <?php
                }
				*/
                ?>
            <div class="benefits">
                   <?php get_sidebar('benefits'); ?>
                </div>
            <div class="contact-frm">
            <h3>Contact Us</h3>
                <div class="frm">
               <?php //echo do_shortcode('[contact-form-7 id="136" title="Untitled"]'); ?>
               <?php echo do_shortcode('[contact-form-7 id="309" title="Services form"]'); ?>
                </div>
            </div>
        </div>
    </div>
 </div>
</section>
   <?php endwhile; wp_reset_query(); ?> 

<section class="testimonial-home bg_fixed  wow fadeIn" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/testim-bg.jpg)">
  <div class="container">
    <div class="row">
        
                    <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <h2>Testimonials</h2>
                        <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">

                                <!-- Quote 1 -->
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

<script type="text/javascript">
    // window.setInterval(function(){
    //     explode();
    // }, 1000);
    jQuery(document).ready(function(){
        window.setInterval(explode1, 3000);
    });
    function explode1()
    {
        var title=jQuery('#titlee').val();
        if(jQuery("input[name='text-351']").val()=="")
        {
          jQuery("input[name='text-351']").val(title);
        }
    }
    
</script>
<?php get_footer(); ?>
