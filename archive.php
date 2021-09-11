<?php 

/**
 * Archive file is used for showing category, tags and related author posts.
 * php version 7.4.10
 *
 * @category Archive
 * @package  Sunset-Theme
 * @author   Vraj Rana <vrcoder1998@gmail.com>
 * @license  GNU General Public License v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://github.com/Cyber-Vrcoder
 */

get_header();

?>

    <div id="primary" class="content-area">
        
        <main class="site-main" id="main" role="main">

            <header class="archive-header text-center">
                <?php the_archive_title('<h1 class="page-title">', '</h1>') ?>
            </header>

            <?php if (is_paged()) : ?>
            <div class="container text-center container-load-previous">
                <a class="btn-sunset-load sunset-load-more" data-prev=1 data-archive="<?php echo sunsetGrabCurrentUrl(); ?>" data-page="<?php echo sunsetCheckPaged(1) ?>" data-url="<?php echo admin_url('admin-ajax.php');?>">
                    <span class="sunset-icon sunset-loading"></span>
                    <span class="text">Load Previous</span>
                </a>                
            </div><!-- .container -->
            <?php endif; ?>

            <div class="container sunset-posts-container">
                <?php
                if (have_posts()) :
        
                    echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] . '">';
                    
                    while(have_posts()): the_post();

                        get_template_part('template-parts/content', get_post_format());

                    endwhile;

                    echo '</div>';
                
                endif;
                ?>
            </div><!--.container-->
            
            <div class="container text-center">
                <a class="btn-sunset-load sunset-load-more" data-page="<?php echo sunsetCheckPaged(1); ?>" data-archive="<?php echo sunsetGrabCurrentUrl(); ?>" data-url="<?php echo admin_url('admin-ajax.php');?>">
                    <span class="sunset-icon sunset-loading"></span>
                    <span class="text">Load More</span>
                </a>                
            </div><!-- .container -->
        </main>

    </div><!-- #primary -->

<?php get_footer(); ?>