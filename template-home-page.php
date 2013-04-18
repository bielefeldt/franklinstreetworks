<?php
/**
 * Template Name: Home page
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
	if ($post->ID == 2) { ?>
    <div id="container">
		<div id="example">
			<div id="slides">
				<div class="slides_container">
					<?php page_by(7, "NOp"); ?>
                </div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>     
<?	} ?>
    <div class="sixbar"></div>
    <div class="twentyfive borderright" style="padding-left:0;">
		<?php dynamic_sidebar( 'visit' ); ?>
    </div>
    <div class="twentyfive borderright" style="">
		<?php dynamic_sidebar( 'cal' ); ?>
    </div>
    <div class="twentyfive borderright" style="">
		<?php dynamic_sidebar( 'cafe' ); ?>
    </div>
    <div class="twentyfive" style="float:right; padding-right:0;">
		<?php dynamic_sidebar( 'getinvolved' ); ?>
    </div>
    <div class="sixbar"></div>
		<div id="primary">
			<div id="content" role="main">
            <?php page_by(2, "p"); ?>
         	<div class="sixbar"></div>
            <div class="mostrec">
                <div class="mosttitle">MOST RECENT</div>
                <div class="mostposts">
                	
					<?php my_recent(3, 4); ?>
                    
                </div>
                <?php // getsocial('twitter', '', '10px 10px 0 10px'); 
					getsocial('picasa', '', '10px 10px 0 10px'); 
					getsocial('youtube', 'small', '10px 0px 0'); 
					getsocial('facebook', '', '10px 10px 0 10px'); 
					getsocial('twitter', '', '10px 10px 0 0px');
					getsocial('vimeo', '', '10px 10px 0 0px');
					getsocial('tumblr', '', '10px 10px 0 0px');
					// getsocial('itunes', '', '10px 10px 0 10px'); ?>
            </div>
            <div class="split488">
				<div class="hometube"><?php page_by(30, "NOp"); ?>
                <br /><?php page_excerpt_by(30, "NOp"); getsocial('youtube', '', '0 0 -5px 0'); ?></div>
                <div class="subscribe"><?php page_by(14, "p"); ?></div>
            </div>
            <div class="sixbar nomargin"></div>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>