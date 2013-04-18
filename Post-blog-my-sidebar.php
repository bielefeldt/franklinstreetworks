<?php
/**
 * Template Name Posts: blog page
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
                    <div class="readmespace">
                    <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
                    <div class="clrflt"></div>
                        <div class="postedby"><span class="greytext"><?php the_date(); ?> at <?php the_time(); ?></span></div>
						<h1><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
                        
                        <div class="calevent" id="<?php echo $post->post_name;?>"><?php the_content('READ MORE'); ?><div class="clrflt"></div></div>
                        
                        <div class="permalink" style="left:0px;"><a href="<?php the_permalink(); ?>">PERMALINK</a></div>
                    </div>
                </div>
                <div class="rightsidebar toptwentyninemargin" >
					<?php dynamic_sidebar("blog"); ?>
				</div>
                <div class="clrflt"></div>
                
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>