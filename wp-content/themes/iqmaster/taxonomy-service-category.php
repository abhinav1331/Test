<?php
session_start();
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
$current_url = $_SERVER['REQUEST_URI'];
$current_url_array = explode("service-category/",$current_url);
$current_url_array11 = explode("/",$current_url_array[1]);
$current_url_array11[0];
$current_slug = $current_url_array[count($current_url_array)-2];
// $category = get_category_by_slug('contemporary-external-doors');
$category = get_term_by( 'slug', $current_url_array11[0], 'service-category');
$name = $category->name;
$tag_id  = $category->term_id;

$banner_image=get_field('banner_image', 'service-category_'.$tag_id);
$banner_cont=get_field('banner_content', 'service-category_'.$tag_id);
$banner_para_content=get_field('banner_paragraph_content', 'service-category_'.$tag_id);
?>
<main role="main">
	
	<section class="internal-banner wow fadeIn cls_overlay">
    <div class="banner-image" style="background-image:url(<?php if($banner_image!='') { echo $banner_image; } else { the_field("category_banner_id",43); } ?>);"> 
      <div class="container">
        <div class="banner-capt">
          <h2><?php 
			if($banner_cont!='')
			{
				echo $banner_cont;
			}
			else
			{		
			echo $name; } ?></h2>
			<?php 
			if($banner_para_content!='')
			{
			?>
				<p><?php echo $banner_para_content;?></p>
			<?php	
			}
			?>
        </div>
      </div>
    </div>
  </section>
	

  
<section class="service-internal-section">
 <div class="container">
	<ul class="automate">
	<?php 
	$i=1;
	query_posts( array ( 'post_type' => 'service', 'service-category' => $current_url_array11[0] , 'showposts'=>'-1','order'=>'ASC') ); ?> 
	<?php while ( have_posts() ) : the_post(); 
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
</main>
<?php
get_footer(); ?>