<?php
/*
* Template Name: About Us Page Template
*/
get_header();
global $post;
?>
<!---------------------------------------About Us Page -------------------------------------->
<main role="main">
	 <?php
    /*************************About Page Loop Starts*************************************/
        while ( have_posts() ) : the_post();
            /*------------------------Attachment by url by addribute size------------------------------------------*/
            $image_id=get_post_meta($post->ID,"_thumbnail_id",true);
            $thumb = wp_get_attachment_image_src($image_id, 'full' );
            $url = $thumb['0'];
            /*------------------------Attachment by url by addribute size------------------------------------------*/
         ?>
  <section class="internal-banner wow fadeIn">
    <div class="banner-image" style="background-image:url('<?php if ( $url != "" ) {echo $url;} else { echo "http://placehold.it/1920x618&amp;text=No image found"; } ?>');">
      <div class="container">
        <div class="banner-capt">
          <h2>GET TO KNOW US A LITTLE</h2>
<div class="about-home about-buttons">
<a href="/process/">OUR UNIQUE PROCESS</a>
<a href="/skilled-team/">OUR AWESOME TEAM</a>
</div>
        </div>
      </div>
    </div>
  </section>
    <?php 
        endwhile; wp_reset_query();
    /*************************About Page Loop Ends*************************************/
    ?>
  
<!---------------------------About Us Loop Starts------------------------------------>
	<?php 
	$i=1;
	query_posts( array ( 'post_type' => 'about','showposts'=>'-1','order'=>'ASC') ); ?> 
	<?php while ( have_posts() ) : the_post();
		 /*------------------------Attachment by url by addribute size------------------------------------------*/
		$image_id=get_post_meta($post->ID,"_thumbnail_id",true);
		$thumb = wp_get_attachment_image_src($image_id, 'full' );
		$url = $thumb['0'];
		/*------------------------Attachment by url by addribute size------------------------------------------*/
	 ?>
		<section class="about-section <?php if($i % 2 == 0){ echo 'even'; } else { echo 'odd'; } ?> wow fadeIn" style="background-image:url('<?php if ( $url != "" ) {echo $url;} else { echo "http://placehold.it/961x507&amp;text=No image found"; } ?>');">
			<div class="container">
				<?php
				if($i % 2 == 0)
				{
					?>
						
       <div class="col-lg-6 col-md-6 wow fadeIn"></div>
					<?php
				}
				?>
				<div class="col-lg-6 col-md-6  wow fadeIn">
					<?php the_content(); ?>
				</div>
				<?php
				if($i % 2 != 0)
				{
					?>
						<div class="col-lg-6 col-md-6 wow fadeIn"></div>
					<?php
				}
				?>
			</div>
		</section>
	<?php
	$i++; endwhile; wp_reset_query();
	?>    
<!---------------------------About Us Loop Ends------------------------------------>

<section class="about_page_wesp"><div class="container-fluid">
	<div class="row">
		<div class="col-sm-6"><div class="ab_images">
			<?php $ab_image = get_field('about_page_image_1');
				$ab_image1 = get_field('about_page_image_2'); ?>
			<img src="<?php echo $ab_image['url']; ?>"/>
			<img src="<?php echo $ab_image1['url']; ?>"/>
		</div></div>
		<div class="col-sm-6"><div class="ab_contents">
			<h3><?php echo get_field('about_page_extra_heading'); ?></h3>
			<?php echo get_field('about_page_extra_content'); ?>
		</div></div>
	</div>

</div></section>



<!---------------------------------------About Us Page -------------------------------------->
<?php
get_footer();
?>