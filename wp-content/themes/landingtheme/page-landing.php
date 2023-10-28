<?php

/**

 * Template Name: Home

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

global $wpdb;
$fimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 

//print_r($footer_link_section);
?>

<?php get_header(); ?>

<!-- START: Hero section -->
    <section class="hero-banner">
        <div class="container-h">
        <div id="homeslider">
         <?php $args  =  array('post_type'=>'slides','orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page'=>-1);
                  $slides = new WP_Query( $args );
                  if ( $slides->have_posts() ):
				  $i=1;
                  while ( $slides->have_posts() ) : $slides->the_post();
				  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			        $mobile_image = get_field('mobile_image');
                  ?>
        
        <div class="sliderow">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                    <img src="<?php echo $featured_img_url; ?>" class="hero-img" alt="<?php the_title(); ?>">
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="banner-content">
                        <h1 class="hera-h1 home-h1"><?php the_title(); ?></h1>
                        <div class="banner-para"><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
        </div>
      <?php $i++; endwhile;?>
    </div>
        <?php endif; wp_reset_postdata();?>
            
        </div>
    </section>
    <!-- END: Hero section -->

<script>
        $(document).ready(function () {
            $('#homeslider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
				dots: true,
				speed: 100,
  				fade: true,
				autoplay: true,
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 1
                        }
                    },

                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 540,
                        settings: {
                            slidesToShow: 1
                        }
                    }

                ]
            });


        });
    </script>
<?php get_footer(); ?>