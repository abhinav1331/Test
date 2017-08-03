<?php
/*
* Template Name: Gallery Page
*/
get_header();
?>
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
                <div class="banner-image" style="background-image:url(<?php if ( $url != " " ) {echo $url;} else { echo "http://placehold.it/1920x618&amp;text=No image found "; } ?>);">
                    <div class="container">
                        <div class="banner-capt">
                            <h2><?php the_title(); ?></h2> </div>
                    </div>
                </div>
            </section>
            <?php 
        endwhile; wp_reset_query();
    /*************************Home Page Loop Ends*************************************/
    ?>
                <section class="gallery-display-section">
                    <div class="container">
                        <div class="row">
                            <?php 
        $i=1;
        query_posts( array ( 'post_type' => 'galleries','showposts'=>'-1','order'=>'DESC') ); ?>
                                <?php while ( have_posts() ) : the_post();
            /*------------------------Attachment by url by addribute size------------------------------------------*/
            $image_id=get_post_meta($post->ID,"_thumbnail_id",true);
            $thumb = wp_get_attachment_image_src($image_id, 'full' );
            $url = $thumb['0'];
            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
            /*------------------------Attachment by url by addribute size------------------------------------------*/
         ?>
                                    <div class="col-md-4 wow fadeIn">
                                        <div class="pro"> <a href="<?php the_permalink(); ?>" class="img-hold"><img src="<?php echo $url; ?>" alt="<?php echo $image_alt; ?>" /></a>
                                            <div class="pro-white-block">
                                                <div class="project-details">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <p><strong><span><?php the_field("budget",$post->ID); ?></span></strong></p>
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                </section>
                <?php get_footer(); ?>