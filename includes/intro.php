<?php 
include_once('m/rsses.php');
include_once( ABSPATH . WPINC . '/feed.php' );
$rsses = rsses_current($name_rss);


?>

<div id="rss">
	<div><?php 
	$color = $rsses['color_rss'];
	$count = $rsses['count_rss'];
	$rss=simplexml_load_file($rsses['url_rss']); 
	$i=0;

	foreach ($rss->channel->item as $key=>$item) {

			echo '<div class="pineal-rss-block"><a href="'.$item->link.'"><img src="' . $item->enclosure['url']. '" class="feed-thumb pineal-rss-img"  /></a>';

		$date = explode(' ', $item->pubDate);

		$date = explode('-', $date[0]);

		/*foreach($date as $k=>$v){
    		$date[$k] = explode('-', $v);
		}*/

		echo '<div class="pineal-rss-link"><a href="'.$item->link.'" style="color:'. $color .'" target="_blank">'. $item->title .'<br><span class="pineal-rss-date">'.' '. $date[2] .'.'. $date[1] .'.'. $date[0].'</span></a></div></div>';
		if (++$i == $count) break;
	}
	

	?>
	
	</div>

	<div style="clear:both"></div>

</div>








