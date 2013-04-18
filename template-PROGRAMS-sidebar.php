<?php
/**
 * Template Name: Programs page
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
$custom_field = get_post_meta($post->ID, "sort_order", 1);
$custom_field = strtolower($custom_field);
if (strlen(strstr($custom_field, "asc")) > 0) {
	$sort_by = "ASC";
}
else if (strlen(strstr($custom_field, "desc")) > 0) {
	$sort_by = "DESC";
}

?>

		<div id="primary">
			<div id="content" role="main">
            	<div class="sixbar"></div><br />
                <?php the_post(); ?>
                    <?php the_content(); ?>
                     <div class="sixbar"></div>
                <div class="foutyeightleft">
                    <div id="current_ex"><br />
                        <img src="/wp-content/themes/franklinstreetworks/images/franklin-images/programs/upcoming.png" />
                        <?php
                            
                            $args = array(
                                'posts_per_page' => 10,
                                'cat'      => 8,
								'orderby' => 'date',
								'order' => $sort_by,
                                'post__not_in' => get_option( 'sticky_posts' )
                            );
                            $programs = query_posts( $args );
                            
                            foreach($programs as $post) : setup_postdata($post); 
                                global $more;
                                $more = 0;?>
                                <div class="sixbar" id="nothefirst"></div>
                                <div class="readmespace">
                                        <div class="postedby"><span class="greytext"><?php page_excerpt_by($post->ID, "pNOp"); ?></span></div>
                                        <h1><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
                                        
                                        <div class="calevent" id="<?php echo $post->post_name;?>"><?php the_content('READ MORE'); ?><div class="clrflt"></div></div>
                                        
                                        <?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
                                        <div class="clrflt"></div>
                                </div>
							<?php endforeach; ?>
                     </div>
                </div>
                <div class="foutyeightright">
                <div id="current_ex"><br />
                        <img src="/wp-content/themes/franklinstreetworks/images/franklin-images/programs/ongoing.png" />
                     <?php page_by(262, $NOp); ?>
                     </div>
   				</div>
                
                <div class="clrflt"></div>
                <script>
				$("#nothefirst:first").css("display", "none");
				</script>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>