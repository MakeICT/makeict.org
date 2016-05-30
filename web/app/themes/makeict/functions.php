<?php

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

class MakeICT_menu_walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
    }
    
    function end_lvl( &$output, $depth = 0, $args = array() ) {
	}
 
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if($depth == 0){
			$output .= "<li class=\"dropdown\">\n";
			$output .= '	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $item->title . '<span class="caret"></span></a>'. "\n";
			$output .= "	<ul class=\"dropdown-menu\">\n";
		}else{
			$output .= "		<li><a href=\"/" . $item->url . "\">" . $item->title . "</a></li>\n";
		}
    }
    
	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if($depth == 0){
			$output .= "	</ul>\n";
			$output .= "</li>\n";
		}
   }    
}