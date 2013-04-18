<?php
/**
 * Template Name: ART sidebar page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); 
$mytitle_vari;
$mytitle_vari = get_the_title();
$sideswitch;
?>

		<div id="primary">
			<div id="content" role="main">
            	<div class="sixbar"></div>
                <div class="twocolumn toptwentymargin">
    
                    <?php the_post(); ?>
                    <?php the_content(); ?>
                    <div class="sixbar"></div>
                    <div id="current_ex"><br />
                    <img src="/wp-content/themes/franklinstreetworks/images/franklin-images/art/current-exh.png" style="margin-bottom:13px;" />
    				<?php
						$args = array(
							'posts_per_page' => 1,
							'cat'      => 13,
							'post_status' => 'publish' ,
							'post__not_in' => get_option( 'sticky_posts' )
						);
						$upcoming = query_posts( $args );
						foreach($upcoming as $post) : setup_postdata($post); 
							global $more;
							$more = 0;?>
                            <div class="readmespace">
                                    <div class="calevent" id="<?php echo $post->post_name;?>">
										<?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
										<?php page_excerpt_by($post->ID, "pNOp"); ?>
										<?php the_content('READ MORE'); ?>
                                        <div class="clrflt"></div>
                                 	</div>
                            </div>
							<?php endforeach; ?>
                     </div>
                     <div class="sixbar"></div>
                     <div id="upcoming_ex"><br />
                    <img src="/wp-content/themes/franklinstreetworks/images/franklin-images/art/upcoming-exh.png" style="margin-bottom:13px;" />
    				<?php
						$args = array(
							'cat'      => 1,
							'post_status' => 'publish' ,
							'post__not_in' => get_option( 'sticky_posts' )
						);
						$upcoming = query_posts( $args );
						foreach($upcoming as $post) : setup_postdata($post); 
							global $more;
							$more = 0;?>
                            <div class="readmespace">
                                    <div class="calevent" id="<?php echo $post->post_name;?>">
										<h1><?php the_title(); ?></h1>
										<?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
										<?php page_excerpt_by($post->ID, "pNOp"); ?>
										<?php the_content('READ MORE'); ?>
                                        <div class="clrflt"></div>
                                 	</div>
                            </div>
							<div class="sixbar"></div>
							<?php endforeach; ?>
                     </div>
                     <div id="upcoming_ex"><br />
                     <a href="/blog/" ><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/art/past-exh.png" /> </a>
                     </div>
   				</div>
                <div class="rightsidebar toptwentyninemargin" >
                
					<?php dynamic_sidebar( 'art' ); ?>
				</div>
                <div class="clrflt"></div>
                
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>