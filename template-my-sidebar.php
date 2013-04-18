<?php
/**
 * Template Name: Universal sidebar page widgets are title based
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
                
                <?php the_post(); 
				if ($mytitle_vari == "Media") { ?>
                	<img src="/wp-content/themes/franklinstreetworks/images/franklin-images/media/video.png" style="float:left; margin:-2px 7px 0px 0px;"  />
                    <?
					 page_excerpt_by(30, "NOp"); 
					 getsocial('youtube', '', '0 0 -5px 0');
					 echo "<br /><br />";
					 page_by(30, "NOp"); ?>
                     <div class="sixbar"></div><br />
                     <img src="/wp-content/themes/franklinstreetworks/images/franklin-images/media/photos.png" style="float:left; margin:0px 7px 0px 0px;"  />
                     <?
					 page_excerpt_by(290, "NOp"); 
					 getsocial('picasa', '', '0px 10px -8px 10px'); 
					 echo "<br /><br />"; ?>
                     <div class="picasa">
                     <?
					 page_by(290, "NOp");  ?>
                     </div>
                     <div class="sixbar"></div><br />
                     <?
				}
					the_content(); ?>

    			<?php if ($mytitle_vari == "Blog") {
							blog_page();
						}
					  else if ($mytitle_vari != "Blog") {
						  
						} ?>
   				</div>
                <div class="rightsidebar toptwentyninemargin" >
                <?php switch($mytitle_vari) {
					case 'About':
						$sideswitch = "about"; ?>
                        <!--<aside id="text-7" class="widget widget_text">-->
                        <?
						//page_by(385, "NOp"); ?><!-- <br style="clear:both;" />
                        </aside>-->
                        <?
						break;
					case 'Exhibition Archive':
						$sideswitch = "exh_arch";
						break;
					case 'Blog':
						$sideswitch = "blog";
						break;
					case 'Get Involved':
						$sideswitch = "media";
                        echo "<img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/media/online-communities.png\"  />";
						break;
					case 'Open Circuit':
						$sideswitch = "media";
                        echo "<img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/media/online-communities.png\"  />";
						break;
					case 'Media':
						$sideswitch = "media";
                        echo "<img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/media/online-communities.png\"  />";
						break;
					case 'Cafe':
						$sideswitch = "cafe_page"; 
                        echo "<img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/cafe/fsw-cafe.png\"  />";
                        
						break;
					default:
						$sideswitch = "sidebar-1";
						break;
				} ?>
					<?php dynamic_sidebar( $sideswitch ); 
					if ($mytitle_vari == "Media" || $mytitle_vari == "Get Involved" || $mytitle_vari == "Open Circuit") {
						getsocial('picasa', '', '10px 10px 0 0px'); echo "<br />";
						getsocial('youtube', 'small', '10px 10px 0 0px'); echo "<br />";
						getsocial('facebook', '', '10px 10px 0 0px'); echo "<br />";
						getsocial('twitter', '', '10px 10px 0 0px'); echo "<br />";
						getsocial('vimeo', '', '10px 10px 0 0px'); echo "<br />";
						getsocial('tumblr', '', '10px 10px 0 0px');
					}?>
				</div>
                <div class="clrflt"></div>
                
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>