<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();
global $post;
$post_id = get_the_ID();
$title_page = get_the_title($post_id);
 ?>
<main role="main">

<?php
// Start the loop.
while ( have_posts() ) : the_post();
 $image_id=get_post_meta(106,"_thumbnail_id",true);
$thumb = wp_get_attachment_image_src($image_id, 'full' );
$url = $thumb['0'];

$banner_image=get_field('banner_image',$post->ID); 
  

?>
  <section class="internal-banner wow fadeIn">
    <div class="banner-image" style="background-image:url(<?php if($banner_image=='') { echo $url; } else { echo $banner_image; }  ?>);">
      <div class="container">
        <div class="banner-capt"> 
          <h2><?php the_title(); ?></h2>
            <input type="hidden" id="titlee" value="<?php the_title(); ?>" />
        </div>
      </div>
    </div>
  </section>



    

<section class="gallery-content-section wow fadeIn">
    <div class="container">
        <div class="slider">
        <div id="slider" class="flexslider">
          <ul class="slides">
            <?php  $one1 = get_post_meta(get_the_ID(),'gallery',true); 
                $arr1=get_numerics($one1);
                $index = 1;
                foreach($arr1 as $val1) {
                    $small_image_url1 = wp_get_attachment_image_src($val1, 'full');
                     $image_alt = get_post_meta( $val1, '_wp_attachment_image_alt', true);
                ?>
            <li><img src="<?php echo $small_image_url1[0]; ?>" alt="<?php echo $image_alt; ?>"/></li>
             <?php $index++; } ?>
          </ul>
        </div>
        
        <div id="carousel" class="flexslider">
          <ul class="slides">
             <?php
                 $index = 0;
                foreach($arr1 as $val1) {
                    $small_image_url1 = wp_get_attachment_image_src($val1, 'full');
                     $image_alt = get_post_meta( $val1, '_wp_attachment_image_alt', true);
                ?>
           <li><img src="<?php echo $small_image_url1[0]; ?>" alt="<?php echo $image_alt; ?>"/></li>
             <?php $index++; } ?>
  	      </ul>
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
            
            <div class="contact-frm">
            <h3>Contact Us</h3>
                <div class="frm">
                <?php echo do_shortcode('[contact-form-7 id="134" title="Gallery Contact Form"]'); ?>
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
        <h2>Testimonials</h2>
                    <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
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
        if(jQuery("input[name='text-350']").val()=="")
        {
          jQuery("input[name='text-350']").val(title);
        }
    }
    
</script>
<?php get_footer(); ?>
