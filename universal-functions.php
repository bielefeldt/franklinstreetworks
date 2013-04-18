<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<?php 
//get admin links
global $twitter;
global $picasa;
global $youtube;
global $facebook;
global $itunes;
global $vimeo;
	global $tumblr;
// get calendar dates
global $mymonth;
global $myyear;
global $current_year;
global $current_month;
//set current month and year		
$current_year = date('Y');
$current_month = date('m');
//ceck if calendar page and get session values
if (is_page( 'Calendar' )) { 
	$today = getdate();
	if (!isset($_GET['passyear'])) {
		$mymonth = $current_month;
		$myyear = $current_year;
	}
	else if (isset($_GET['passyear'])) {
		$myyear = $_GET['passyear'];
		if (!isset($_GET['Mymonth'])) {
			$mymonth = 13;
		}
		else { $mymonth = $_GET['Mymonth']; }
	}
}
// set social links
$twitter = get_usermeta(1, twitter);
$picasa = get_usermeta(1, picasa);
$youtube = get_usermeta(1, youtube);
$facebook = get_usermeta(1, facebook);
$itunes = get_usermeta(1, itunes);
$vimeo = get_usermeta(1, vimeo);
$tumblr = get_usermeta(1, tumblr);
// get sosial link by type, set size and margin
function getsocial($soctype, $size, $margin) {
	global $twitter;
	global $picasa;
	global $youtube;
	global $facebook;
	global $itunes;
	global $vimeo;
	global $tumblr;
	switch($soctype) {
		case "twitter":
			echo "<a href=\"".$twitter."\" title=\"My twitter link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/twitter.png\" alt=\"twitter image link\" style=\"margin:".$margin."\" /></a>";
			break;
		case "picasa":
			echo "<a href=\"".$picasa."\" title=\"My picasa link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/picasa.png\" alt=\"picasa image link\" style=\"margin:".$margin."\" /></a>";
			break;
		case "youtube":
			switch($size) {
				case "small":
					echo "<a href=\"".$youtube."\" title=\"My youtube link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/youtube-small.png\" alt=\"youtube image link\" style=\"margin:".$margin."\" /></a>";
					break;
				default:
					echo "<a href=\"".$youtube."\" title=\"My youtube link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/youtube-49wx29h.png\" alt=\"youtube image link\" style=\"margin:".$margin."\" /></a>";
					break;
			}
			break;
		case "facebook":
			echo "<a href=\"".$facebook."\" title=\"My facebook link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/facebook.png\" alt=\"facebook image link\" style=\"margin:".$margin."\" /></a>";
			break;
		case "itunes":
			echo "<a href=\"".$itunes."\" title=\"My itunes link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/itunes.png\" alt=\"itunes image link\" style=\"margin:".$margin."\" /></a>";
			break;
		case "vimeo":
			echo "<a href=\"".$vimeo."\" title=\"My itunes link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/vimeo.png\" alt=\"vimeo image link\" style=\"margin:".$margin."\" /></a>";
			break;
		case "tumblr":
			echo "<a href=\"".$tumblr."\" title=\"My itunes link\"  target=\"_blank\"><img src=\"/wp-content/themes/franklinstreetworks/images/franklin-images/social/tumblr.png\" alt=\"tumblr image link\" style=\"margin:".$margin."\" /></a>";
			break;
		default:
			echo "bad social value";
	}
}
// if home
if ($post->ID == 2) { ?>
	<link rel="stylesheet" href="/wp-content/themes/franklinstreetworks/Slides/examples/Standard/css/global.css">
	
	
	<script src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
	<script src="/wp-content/themes/franklinstreetworks/Slides/source/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>
<?	} 
// get page content by id set if no paragraphs
function page_by($theID, $pNOp) {
	$my_postid = $theID;//This is page id or post id
	$content_post = get_post($my_postid);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	if ($pNOp == "NOp") { $content = str_replace(array("<p>","</p>"), " ", $content); }
	echo $content;
} 
// get page excerpt by id set if no paragraphs
function page_excerpt_by($theID, $pNOp) {
	$my_postid = $theID;//This is page id or post id
	$content_post = get_post($my_postid);
	$content = $content_post->post_excerpt;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	if ($pNOp == "NOp") { $content = str_replace(array("<p>","</p>"), " ", $content); }
	echo $content;
}
// get recent for home
function my_recent($category, $number) {
	global $post;
			$args = array( 'numberposts' => $number, 'category' => $category, 'orderby' => 'post_date', 'order' => 'DESC', );
			$lastposts = get_posts( $args );
			foreach($lastposts as $post) : setup_postdata($post); ?>
            	<p>
                    <a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a><br />
                    <span class="greytext">posted by <?php the_author(); ?> on <?php the_date(); ?> at <?php the_time(); ?></span>
                </p>
			<?php endforeach; ?>
<? }
// get title month and date cor calendar page 
function titledtg() {
					global $mymonth;
					global $myyear;
					global $current_year;
					global $current_month;
					
					$titleyear = $myyear;
					$titlemonth = $mymonth;
					
					if ($titlemonth == 13) {
						$titlemonth = '';
					}
					if ($titleyear == 2010) {
						$titleyear = '';
					}
					switch ($titlemonth) {
						case 1:
							$monthclass = "january";
							break;
						case 2:
							$monthclass = "february";
							break;
						case 3:
							$monthclass = "march";
							break;
						case 4:
							$monthclass = "april";
							break;
						case 5:
							$monthclass = "may";
							break;
						case 6:
							$monthclass = "june";
							break;
						case 7:
							$monthclass = "july";
							break;
						case 8:
							$monthclass = "august";
							break;
						case 9:
							$monthclass = "sept";
							break;
						case 10:
							$monthclass = "october";
							break;
						case 11:
							$monthclass = "november";
							break;
						case 12:
							$monthclass = "december";
							break;
							
					}
					switch ($titleyear) {
						case 2011:
							$yearclass = "eleven";
							break;
						case 2012:
							$yearclass = "twelve";
							break;
						case 2013:
							$yearclass = "thirteen";
							break;
						case 14:
							$yearclass = "fourteen";
							break;
						case 2015:
							$yearclass = "fifteen";
							break;
						case 16:
							$yearclass = "sisteen";
							break;							
					}
					
					echo '<div id="date"><span class="'.$monthclass.'"></span><span class="twenty'.$yearclass.'"></span></div>';
					
}
// query posts for calendar page by gategory month and year	
function my_cal($category, $theyear, $themonth) {
					global $current_year;
					global $current_month;
					global $post;
					
					
					if ($theyear < 2011 && $themonth > 12) {
						$lastposts = query_posts( "cat=$category&year=$current_year&order=DESC" );
						foreach($lastposts as $post) : setup_postdata($post); 
							global $more;
							$more = 0;
							$stuck = 0;
                            if (is_sticky() && $stuck == 0) { $stuck = 1; ?>
                            <div class="sixbar"></div>
                            <div class="readmespace">
                                	<div class="postedby"><span class="greytext"><?php the_date(); ?> at <?php the_time(); ?></span></div>
									<h1><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
                                    <div class="calevent" id="<?php echo $post->post_name;?>"><?php echo get_the_post_thumbnail($page->ID, 'large'); ?><?php the_content('READ MORE'); ?><div class="clrflt"></div></div>
                                    <div class="permalink" style="bottom:0px;">| &nbsp;&nbsp;&nbsp;<a href="<?php the_permalink(); ?>">PERMALINK</a></div>
                            </div>
                            <?php } ?>
							<?php endforeach;
					}
					else if ( $theyear > 2010 && $themonth > 12) {
						$lastposts = query_posts( "cat=$category&year=$theyear&order=DESC" );
					}
					if ($theyear < 2011 && $themonth < 13) {
						$lastposts = query_posts( "cat=$category&year=$current_year&monthnum=$themonth&order=DESC" );
					}
					else if ( $theyear > 2010 && $themonth <= 12) {
						$lastposts = query_posts( "cat=$category&year=$theyear&monthnum=$themonth&order=DESC" );
					}		
							
							foreach($lastposts as $post) : setup_postdata($post);
								global $more;
								$more = 0; 
                            if (!is_sticky()) { ?>
                            <div class="sixbar"></div>
                            <div class="readmespace">
                                	<div class="postedby"><span class="greytext"><?php the_date(); ?> at <?php the_time(); ?></span></div>
									<h1><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h1>
                                    <div class="calevent" id="<?php echo $post->post_name;?>"><?php echo get_the_post_thumbnail($page->ID, 'large'); ?><?php the_content('READ MORE'); ?><div class="clrflt"></div></div>
                                    <div class="permalink" style="bottom:0px;">| &nbsp;&nbsp;&nbsp;<a href="<?php the_permalink(); ?>">PERMALINK</a></div>
                            </div>
                            <?php } ?>
							<?php endforeach;
} 
function calendarNAV() {
	global $mymonth;
	global $myyear;
	global $current_year;
	global $current_month;
	?>
	<div class="years"><script> // console.log('<?php // echo "myyear- ".$myyear." - mymonth: ".$mymonth."-- current_year- ".$current_year." - current_month: ".$current_month; ?>'); </script>
						<?php 
							function show_month($cur, $pass) {
								global $current_month;
								if ($curr == $pass) {
									echo $current_month;
								} elseif ($curr != $pass) {
									echo '13';
								}
							}
						?>
                        <a href="/calendar/?passyear=2011&Mymonth=<?php show_month($current_year, 2011); ?>" class="yrele yearpad <?php if ($myyear <= 2011) echo " activeyear11 activeyear"; ?>"></a>
                        <a href="/calendar/?passyear=2012&Mymonth=<?php show_month($current_year, 2012); ?>" class="yrtwel yearpad <?php if ($myyear == 2012) echo " activeyear12 activeyear"; ?>"></a>
                        <?php 
							if ($current_year >= 2012) { ?>
                        		<a href="/calendar/?passyear=2013&Mymonth=<?php show_month($current_year, 2013); ?>" class="yrthirt yearpad <?php if ($myyear == 2013) echo " activeyear13 activeyear"; ?>"></a>
                        <?php } elseif ($current_year >= 2013) { ?>
                        	<a href="/calendar/?passyear=2014&Mymonth=<?php show_month($current_year, 2014); ?>" class="yrfourt yearpad <?php if ($myyear == 2014) echo " activeyear14 activeyear"; ?>"></a>
                        <?php } elseif ($current_year >= 2014) { ?>
							<a href="/calendar/?passyear=2015&Mymonth=<?php show_month($current_year, 2015); ?>" class="yrfift yearpad <?php if ($myyear == 2015) echo " activeyear15 activeyear"; ?>"></a>
                        <?php } ?> 
                        <script type="text/javascript">$('a.activeyear').attr('href', 'javascript:void(0)');</script>  
                    </div>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=01" id="01" class="one monthpad<?php if ($mymonth == 1) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/jan.png" alt="January" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=02" class="two monthpad<?php if ($mymonth == 2) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/feb.png" alt="February" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=03" class="three monthpad<?php if ($mymonth == 3) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/mar.png" alt="March" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=04" class="four monthpad<?php if ($mymonth == 4) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/apr.png" alt="April" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=05" class="five monthpad<?php if ($mymonth == 5) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/may.png" alt="May" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=06" class="six monthpad<?php if ($mymonth == 6) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/jun.png" alt="June" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=07" class="seven monthpad<?php if ($mymonth == 7) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/jul.png" alt="July" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=08" class="eight monthpad<?php if ($mymonth == 8) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/aug.png" alt="August" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=09" class="nine monthpad<?php if ($mymonth == 9) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/sept.png" alt="September" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=10" class="ten monthpad<?php if ($mymonth == 10) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/oct.png" alt="October" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=11" class="eleven monthpad<?php if ($mymonth == 11) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/nov.png" alt="November" /></a>
                    <a href="/calendar/?passyear=<?php echo $myyear; ?>&Mymonth=12" class="twelve monthpad<?php if ($mymonth == 12) echo " active"; ?>"><img src="/wp-content/themes/franklinstreetworks/images/franklin-images/calendar/white/dec.png" alt="December" /></a>
                    <div class="clrflt"></div>
                    <?php titledtg(); ?>
                    <? 
} 
?>