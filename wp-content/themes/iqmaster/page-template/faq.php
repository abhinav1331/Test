<?php
/*
* Template Name: Faq Page Template
*/
get_header();
$count_pages = wp_count_posts( 'faqs' )->publish;
$half_post = $count_pages/2;
$round_val = round($half_post);
?>
<script>
function check_in(id)
{
	jQuery('.asd').removeClass('in');
	if(jQuery('#collapse'+id).hasClass('in'))
	{
		jQuery('.collapse'+id).removeClass('in');
		
	} 
	else
	{
		jQuery('.collapse'+id).addClass('in');
	}		
}
</script>
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
            <div class="banner-image" style="background-image:url(<?php if ( $url != "" ) {echo $url;} else { echo "http://placehold.it/1920x618&amp;text=No image found"; } ?>);">
             <div class="container">
                <div class="banner-capt">
                 <h2>Faq</h2> 
                </div>
              </div>
            </div>
          </section>
    <?php 
        endwhile; wp_reset_query();
    /*************************Home Page Loop Ends*************************************/
    ?>
  
<section class="faq-section">
 <div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6  wow fadeIn">
            <div class="faq-holder" >
                
            <div class="panel-group" id="accordion">
               
                	  <?php 
                        $i=1;
                        query_posts( array ( 'post_type' => 'faqs','showposts'=>'-1','order'=>'ASC') ); ?> 
                        <?php while ( have_posts() ) : the_post(); ?>
                         <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="<?php if($i > $round_val) {echo "#accordion1" ;} else { echo "#accordion";} ?>" href="#collapse<?php echo $i; ?>" <?php if($i==1){?> aria-expanded="true" <?php } ?> class="<?php if($i==1){echo 'in'; } ?> asd collapse<?php echo $i; ?>" onclick="check_in('<?php echo $i; ?>');"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php if($i==1){echo 'in'; } ?>">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php 
				
				if($i==$round_val)
                {
                	?>
							</div>    
						</div>
					</div>
					<div class="col-lg-6 col-md-6 wow fadeIn">
						<div class="faq-holder">

							 <div class="panel-group" id="accordion1">
                	<?php
                }
				
                $i++; 
				endwhile; 
				wp_reset_query(); ?>
        </div>
    </div>
 </div>
</section>  
<?php
get_footer();
?>