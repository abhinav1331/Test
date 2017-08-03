<?php
/*
* Template Name: Home Page Template
*/
get_header();
global $post;
?>
<!---------------------------------------------------Home Page Section Start-------------------------------------------->

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
          <section class="home-banner fadeIn">
              
              
              
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <!--ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol-->

  <!-- Wrapper for slides -->
  <div class="carousel-inner rs-slide" role="listbox">
   <?php 
		$i=1;
		global $post;
		query_posts( array ( 'post_type' => 'slider','showposts'=>'5','order'=>'DESC') ); ?> 
		<?php while ( have_posts() ) : the_post(); 
		$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
            $thumb = wp_get_attachment_image_src($image_id, 'full' );
            $url = $thumb['0'];
		?>
    <div class="item <?php if($i == 1) { echo "active"; } ?>" style="background:url('<?php echo $url; ?>');">
      <!--img src="</?php echo $url; ?>" alt="Chania"-->
<div class="rs_slider-button"><a class="slider-button" target="_blank" href="<?php echo the_field('rs_button_link'); ?>"><?php echo the_field('rs_button_text'); ?></a></div>
    </div>
	<?php $i++; endwhile; wp_reset_query(); ?>

  </div>

  <!-- Left and right controls -->
  <!--a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a-->
</div>  
              
              
              
              
              
            <!--div class="banner-image" style="background-image:url(<//?//php if ( $url != "" ) {echo $url;} else { echo "http://placehold.it/1920x618&amp;text=No image found"; } ?//>);">
              <div class="container">
                <div class="banner-text">
                  
                </div>
              </div>
            </div-->
          </section>
    <?php 
        endwhile; wp_reset_query();
    /*************************Home Page Loop Ends*************************************/
    ?>
  

  <!-----------------------------------About Us Section---------------------------------->
  <?php
  $page_id = 11;
  $page_details = get_post( $page_id ); 
  ?>
  <section class="about-home wow fadeIn">
    <div class="container">
      <h2>BRINGING THE WOW FACTOR TO YOUR HOME ENTERTAINMENT</h2>
      <div class="row">
        <div class="col-lg-10 col-md-12 col-lg-offset-1">
            <?php the_field("home_page_content",$page_id); ?>
            <a href="<?php echo site_url(); ?>/about-us/">Read More</a>
        </div>
      </div>
    </div>
  </section>
  <!-----------------------------------About Us Section---------------------------------->


  <!-----------------------------------Services Section------------------------------------>  

<section class="service-home bg_fixed wow fadeIn" style="background:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/service-home.jpg)">
    <div class="container">
        <h2 class="">Services</h2>
        <div class="row">
            <?php
            $args = array( 'taxonomy' => 'service-category','hide_empty' => 0);
            $terms = get_terms('service-category', $args);
            if (count($terms) > 0) {
                foreach ($terms as $term) {
                    // $img_url = get_field("home_image",$term);
                    // $image_id=get_post_meta($term->term_id,"home_image",true);
                    $image_id = get_option( 'service-category_'.$term->term_id.'_home_image');
                    $thumb = wp_get_attachment_image_src($image_id, 'homePageServices' );
                    $url = $thumb['0'];
                    $img_url = $url;
                    if($img_url == "")
                    {
                        $srsc = "http://placehold.it/460x394&amp;text=No image found";
                    }
                    else
                    {
                        $srsc = $img_url;
                    }
            ?>
                    <div class="col-md-4 wow fadeIn serv-hom">
                        <img src="<?php echo $srsc; ?>" alt="Home Automation" />
                      <div class="serv-white-block">
                        <div class="emp-cat-inner">
                          <h3><a href="<?php echo get_term_link( $term ); ?>" class="mov-hov"><?php echo $term->name; ?></a></h3>
                          <p><?php echo $term->description; ?></p>
                        </div>
                      </div>
                    </div>
           <?php }
            }
            ?>
          </div>
        </div>
    </section>
<!---------------------------------Services Section Ends---------------------------------->
<section class="contact-section con-sec-home">
 <div class="container">
    <div class="row">
    <div class="v-mid">
        <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn">
            <div class="contact-content" >
                <h2>Leaders in Custom Home Theatre Perth</h2>
                <?php 
                /**********************************Home Page Content Implimentation***********************************/
                    $content_post = get_post(get_the_ID());
                    $content = $content_post->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                /**********************************Home Page Content Implimentation***********************************/
                ?>
                <a href="" class="mov-hov">See More</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 wow fadeIn">
            <div class="contact-frm">
            <h3>Contact Us</h3>
                <div class="frm">
               <?php echo do_shortcode('[contact-form-7 id="105" title="Home Page"]'); ?>
                </div>
            </div>
        </div>
        </div>
    </div>
 </div>
</section>    
    
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
<!---------------------------------------------------Home Page Section Ends-------------------------------------------->
<?php
get_footer();
?>