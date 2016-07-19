<?php
/**
* Plugin Name: Bootstrap Carousel
* Version: 0.1
* Author: Dominic Canare <dom@makeict.org>
* License: GPL2
* Description: Adds shortcodes for generating simple image sliders. use [bootstrap_carousel] and [bootstrap_carousel_slide]
*/

function str_replace_nth($search, $replace, $subject, $n=1){
	$pos = 0;
	for($i=0; $i<$n; $i++){
		$pos = strpos($subject, $search, $pos);
		if($pos === false){
			return $subject;
		}else{
			$pos++;
		}
	}
	return substr_replace($subject, $replace, $pos-1, strlen($search));
}

function bootstrap_carousel($atts, $content){
	$atts = shortcode_atts(array('indicators'=>false, 'controls'=>false, 'random'=>true), $atts);
	
	$slides = do_shortcode($content);
	$slideCount = substr_count($slides, '<div class="item">');
	
	
	$slides = str_replace_nth('<div class="item">', '<div class="item active">', $slides, random_int(1, $slideCount));
	$slides = str_replace('<br />', '', $slides);
	$output = '
		<div class="carousel slide" data-ride="carousel">';
	if($atts['indicators']){
		$output .= '
			<ol class="carousel-indicators">';
		$slideCount = substr_count($slides, '<div class="item');
		for($i=0; $i<$slideCount; $i++){
			$output .= '
				<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="'. ($i == 0 ? 'active': '').'"></li>';
		}
		$output .= '
			</ol>';
	}
	$output .= '
			<div class="carousel-inner" role="listbox">
				' . $slides . '
			</div>';
	if($atts['controls']){
		$output .= '
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div><br/>';
	}
	return $output;
}

function bootstrap_carousel_slide($atts, $content){
	$atts = shortcode_atts(array('caption'=>''), $atts);
	$output = '
		<div class="item">
			' . do_shortcode($content) . '
			<div class="carousel-caption">'. $atts['caption'] . '</div>
		</div>';
		
	return $output;
}

add_shortcode('bootstrap_carousel', 'bootstrap_carousel');
add_shortcode('bootstrap_carousel_slide', 'bootstrap_carousel_slide');
