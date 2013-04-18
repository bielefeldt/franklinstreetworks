<?php
/**
 * Template Name: Calendar page
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

//retrieve session data

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
            	<div class="sixbar"></div>
                <div class="twocolumn">
                    
                    <?php the_post(); 
                     page_by(83, "NOp");
                    ?>               
                    
                    <?php calendarNAV(); ?>
                    
                    <?php my_cal(6, $myyear, $mymonth); ?>
                    <script>
					
					</script>
                </div>
                <div class="rightsidebar" style="padding-top:64px;" >
					<?php dynamic_sidebar( 'calendar' ); ?>
				</div>
                <div class="clrflt"></div>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>