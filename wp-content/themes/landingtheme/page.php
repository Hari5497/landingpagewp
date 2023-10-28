<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mysite
 */
$fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
$pdate=strftime("%d %B %Y",strtotime(get_the_date( 'm/d/Y' )));
$title_1= get_field('title_1');
$title_2= get_field('title_2');
$content= get_field('content');
$link_name= get_field('link_name');
$link= get_field('link');
//print_r($title_1);
$mobile_banner= get_field('mobile_banner');

?>
<?php get_header(); ?>
<?php //if($banr!=""){ ?>
<section class="innerbanner">
     <img src="<?php echo $banr; ?>" alt="" class="img-fluid">
         <div class="innerbanner-content">
         <div class="container">
         <div class="bnrtxt">
             <h1><?php the_title(); ?></h1>
             </div>
             </div>
         </div>
     </section>
<?php //} ?>     

<section id="content">
      <div class="container">
        <div class="row">

          <div class="span12">
            <?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

          </div>

        </div>


      </div>
    </section>

<?php get_footer(); ?>    
</body>
  
</html> 

