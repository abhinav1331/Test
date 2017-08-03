<?php
	/**
		* The template for displaying Archive pages
		*
		* Used to display archive-type pages if nothing more specific matches a query.
		* For example, puts together date-based pages if no date.php file exists.
		*
		* If you'd like to further customize these archive views, you may create a
		* new template file for each specific one. For example, Twenty Fourteen
		* already has tag.php for Tag archives, category.php for Category archives,
		* and author.php for Author archives.
		*
		* @link http://codex.wordpress.org/Template_Hierarchy
		*
		* @package WordPress
		* @subpackage Twenty_Fourteen
		* @since Twenty Fourteen 1.0
	*/
	
	get_header();
	global $post;
	
	
$terms = wp_get_post_terms( $post->ID, 'service-category' ); 

$term_id=$terms['0']->term_id;

?>

<div class="banner_inner">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="inner_content">
				
					<?php echo $banner_description=get_field('banner_description','service-category_'.$term_id);?>
					
					<div class="button_banner">
						<a class="custom_btn" href="<?php the_permalink(106);?>">
							View Gallery
						</a>
						<a class="custom_btn" href="<?php the_permalink(90);?>">
							Enquire Now
						</a>
					</div>
					
				</div>
				
			</div>
			
			<div class="col-sm-6">
				<div class="youtube_temp">
					<?php the_field('banner_video_link','service-category_'.$term_id);?>
				</div>
				<div class="gallery_banner">
					<img src="http://iqsmarterhome.com.au/wp-content/themes/iqmaster/images/g1.jpg" alt="image">
					<img src="http://iqsmarterhome.com.au/wp-content/themes/iqmaster/images/g2.jpg" alt="image">
					<img src="http://iqsmarterhome.com.au/wp-content/themes/iqmaster/images/g3.jpg" alt="image">
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<section class="testimonial-home bg_fixed  wow fadeIn inner_testinomial" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/test.jpg)">
	
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
										
										<div class="author">
											<?php the_title(); ?><br>
											
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

<div class="our_process">
	<div class="container">
		<h2>Our Process</h2>
		<div class="row">
		
		<?php 
		$j=0;
		if( have_rows('our_process_section','service-category_'.$term_id) ):

			while ( have_rows('our_process_section','service-category_'.$term_id) ) : the_row();
			//getting all field from repeater
		  
				$our_process_image = get_sub_field('our_process_image','service-category_'.$term_id);
			
				$our_process_description = get_sub_field('our_process_description','service-category_'.$term_id);
		?>
				<div class="col-process">
					<div class="col_pro_innr">
						<div class="img_process">
							<img src="<?php echo $our_process_image[url];?>" alt="<?php echo 'process-'.$j;?>" />
						</div>
						<div class="img_cntnt">
							<div class="scroll_custom">
							<?php echo $our_process_description;?>
						</div>
						</div>
					</div>
				</div>
		 <?php 
		 $j++;
		 endwhile;
		 wp_reset_query();
		 endif;
		 ?> 
		
		</div> 
		
	</div>
	
</div>

<section class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-md-7 wow fadeIn">
				<div class="contact-content">
					<div class="inner_content">
						<h2><?php echo $new_section_heading=get_field('new_section_heading','service-category_'.$term_id);?></h2>
					</div>
					<?php echo $new_content_description=get_field('new_content_description','service-category_'.$term_id);?>
				</div>
			</div>
			<div class="col-md-5 wow fadeIn slideInRight">
				<div class="benefits">
					<p><?php echo $sidebar_content=get_field('sidebar_content','service-category_'.$term_id);?></p>
				</div>

				<div class="contact-frm">
						<h3>Contact Us</h3>
						<div class="frm">
							<?php echo do_shortcode('[contact-form-7 id="582" title="New HomeTheator"]'); ?>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="service-internal-section service_new_internal">
	<!-- <h2>Our Services</h2> -->
	<div class="container"><div class="inner_content">
		<h2>IQ Smarter Home build complete home cinema solutions, however, if you already have a home cinema or are an enthusiast, we also offer these specific services to those that don't need the full solution. </h2>
	</div></div>
	<div class="container">
		<ul class="automate">
			<?php 
				$i=1;
			$my_query = new WP_Query( array ( 'post_type' => 'service','post__not_in' => array(55,56,57,58,59,60,84,85),'service-category' => $current_url_array11[0] , 'showposts'=>'-1','order'=>'ASC') ); ?>
			<?php while ( $my_query->have_posts() ) : $my_query->the_post(); 
				/*------------------------Attachment by url by addribute size------------------------------------------*/
				$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
				$thumb = wp_get_attachment_image_src($image_id, 'full' );
				$url = $thumb['0'];
				$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
				/*------------------------Attachment by url by addribute size------------------------------------------*/
			?>
			<li class="wow fadeIn">
				<a href="<?php the_permalink(); ?>" class="circle-holder">
					<div class="circle-icon-holder" style="background-image:url(<?php the_field("background_image",get_the_ID()); ?>);">
						<span class="shade"></span>
						<img src="<?php echo $url; ?>" alt="<?php echo $image_alt; ?>"/>
					</div>
					<div class="circle-content">
						<h3><?php the_title(); ?></h3>
					</div>
				</a>
			</li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
	</div>
</section>
<script>
	jQuery(document).ready(function(){
		jQuery("input[name='file-713']").hide();
		jQuery("input[name='no_file_choose']").attr("readonly", "true");
	});
</script>


<?php get_footer();?>
