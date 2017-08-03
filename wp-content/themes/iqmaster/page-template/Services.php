<?php

/*

* Template Name: Services Page Template

*/

get_header();

?>

<main role="main">

 <?php

    /*************************Service Page Loop Starts*************************************/

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

          <h2><?php the_title(); ?></h2>

        </div>

      </div>

    </div>

  </section>

    <?php 

        endwhile; wp_reset_query();

    /*************************Service Page Loop Ends*************************************/

    ?>

  



<section class="services-section">

 <div class="container">

    <div class="row">

    	 <?php

            $args = array( 'taxonomy' => 'service-category','hide_empty' => 0);

            $terms = get_terms('service-category', $args);

            if (count($terms) > 0) {

                foreach ($terms as $term) {

                    $image_id = get_option( 'service-category_'.$term->term_id.'_home_image');

                    $thumb = wp_get_attachment_image_src($image_id, 'homePageServices' );

                    $url = $thumb['0'];

                    $img_url = $url;

                    if($img_url == "")

                    {

                        $srsc = "http://placehold.it/583x317&amp;text=No image found";

                    }

                    else

                    {

                        $srsc = $img_url;

                    }

                    $image_id = pippin_get_image_id(get_field("services_image",$term));

                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

            ?>

		        <div class="service-hold">

		            <div class="col-lg-5 col-md-5 service-title">

		            	<a href="<?php echo get_term_link( $term ); ?>" style="background-image:url('<?php echo $srsc; ?>');">

                            <span class="shad"></span>

			            	<span>

			            		<img src="<?php echo get_field("services_image",$term); ?>" alt="<?php echo $image_alt; ?>"/>

			            		<?php echo $term->name; ?>

			            	</span>

			            </a>

			        </div>

		            <div class="col-lg-7 col-md-7 service-content">

		                <p><?php echo get_field("heading",$term); ?></p>

		                <p><?php echo get_field("services_content",$term); ?></p>

		                <a href="<?php echo get_term_link( $term ); ?>">See More</a>

		            </div>

		        </div>

           <?php }

            }

            ?>

        

    </div>

 </div>

</section>

<?php

get_footer();

?>