<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">
				<div class="sixbar"></div>
                <div class="twocolumn toptwentymargin">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>
				
				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						// get_template_part( 'content', get_post_format() );
					?>
                    <div class="sixbar"></div>
					<div class="readmespace">
                        <div class="postedby"><span class="greytext">posted by <?php the_author(); ?> on <?php the_date(); ?> at <?php the_time(); ?></span></div>
						<h1><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
                        <div class="calevent" id="<?php echo $post->post_name;?>"><?php echo get_the_post_thumbnail($page->ID, 'large'); ?><?php the_content('READ MORE'); ?><div class="clrflt"></div></div>
                        <div class="permalink" style="">| &nbsp;&nbsp;&nbsp;<a href="<?php the_permalink(); ?>">PERMALINK</a></div>
                    </div>
				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="calevent">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .caleventt -->
				</article><!-- #post-0 -->

			<?php endif; ?>
</div>
                <div class="rightsidebar toptwentyninemargin" >
					<?php dynamic_sidebar("blog"); ?>
				</div>
                <div class="clrflt"></div>
			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>