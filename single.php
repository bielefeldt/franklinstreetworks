<?php
/**
 * The Template for displaying all single posts.
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
				<?php while ( have_posts() ) : the_post(); ?>
                
                <nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->
				<div class="sixbar"></div>
                <div class="twocolumn toptwentymargin">
					 <div class="readmespace" id="single">
                    <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
                    <div class="clrflt"></div>
                        <div class="postedby"><span class="greytext"><?php the_date(); ?> at <?php the_time(); ?></span></div>
						<h1><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
                        
                        <div class="calevent" id="<?php echo $post->post_name;?>"><?php the_content('READ MORE'); ?><div class="clrflt"></div></div>
                        
                        <div class="permalink" style="left:0px;"><a href="<?php the_permalink(); ?>">PERMALINK</a></div>
                    </div>
                    <?php comments_template( '', true ); ?>
                </div>
				<?php endwhile; // end of the loop. ?>
                <div class="rightsidebar toptwentyninemargin" >
					<?php dynamic_sidebar("blog"); ?>
				</div>
                <div class="clrflt"></div>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>