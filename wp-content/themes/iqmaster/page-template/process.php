<?php
/*
* Template Name: Process Page Template
*/
get_header();
global $post;
?>

<!--=====================================================================================================================

     START   CONTENT     HERE
     
     ++++++++++++++++++++++++++++++++++==========================-->
     
<section class="internal-banner wow fadeIn">

	<?php
	/*Getting  Process Banner Image */
		$Banner_image=get_post_meta($post->ID,"banner_image",true);
		$Banner = wp_get_attachment_image_src($Banner_image, 'processbanner');	
	
		if(!empty($Banner))
		{
	?>
			<div class="banner-image" style="background-image:url('<?php echo $Banner[0]?>')">
	<?php 
		}
		else
		{
	?>		
			<div class="banner-image" style="background-image:url('http://placehold.it/1920x485&amp;text=No image found')">
	<?php	
		}
	?>

    <div class="container">
      <div class="banner-capt">
        <h2><?php the_field('banner_text',$post->ID);?></h2

      </div>


    </div>
  </div>
</section>
<section class="vertical-timeline">
  <div class="container" >
    <div class="start-point"></div>
    <div id="cd-timeline" class="cd-container">
	<?php 
	
	query_posts( array ( 'post_type' => 'proces','showposts'=>'-1','order'=>'DESC') ); 
    
	while ( have_posts() ) : the_post();
	?> 
      <div class="cd-timeline-block">
<div class="rs-image-block">
<?php if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );?>
             <img src="<?php echo $image[0]; ?>"/>
              <?php
              } else { ?>
              
              <?php } ?>
</div>


        <div class="cd-timeline-img"><i class="blue-circle"></i></div>
        <!-- cd-timeline-img -->
        
        <div class="cd-timeline-content">
         <?php /*?> <div class="timline-img-div">
            <h2><!--DO NOTE REMOVE--></h2>
			
			<?php if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );?>
             <img src="<?php echo $image[0]; ?>"/>
              <?php
              } else { ?>
              <img src="http://placehold.it/292x268&amp;text=No image found" alt="<?php the_title(); ?>" class="img-responsive" />
              <?php } ?>
			
		  </div><?php */?>
			
			
          <div class="timeline-content">
            <h4><?php the_title(); ?></h4>
			 <?php the_content(); ?>
           </div>
          <!--<a href="#0" class="cd-read-more">Read more</a>-->
          
        </div>
        <!-- cd-timeline-content -->
      </div>
      <!-- cd-timeline-block -->
      
	   <?php endwhile; wp_reset_query(); ?>

    </div>
    <!--cd-timeline-->
    <div class="start-point"></div>
  </div>
</section>

<!--=====================================================================================================================

     END   CONTENT     HERE
     
     ++++++++++++++++++++++++++++++++++==========================-->


<section class="testimonial-home bg_fixed  wow fadeIn" style="background:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/testim-bg.jpg)">
  <div class="container">
    <div class="row">
        
                    <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <h2>Testimonials</h2>
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


<?php get_footer();?>