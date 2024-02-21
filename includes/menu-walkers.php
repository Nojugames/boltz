<?php
add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);
function add_arrow( $output, $item, $depth, $args ){

//Only add class to 'top level' items on the 'primary' menu.
	if('main-menu' == $args->theme_location && $depth === 0 && true == $args->show_button){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output  .= '<button class="toggle-sub-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 429.3l22.6-22.6 192-192L493.3 192 448 146.7l-22.6 22.6L256 338.7 86.6 169.4 64 146.7 18.7 192l22.6 22.6 192 192L256 429.3z"/></svg></button>';
		}
	}
	return $output;
}
