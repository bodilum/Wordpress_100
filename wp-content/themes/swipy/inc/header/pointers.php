<?php
/*
Header Style
*/
global $swipy_option;
$rs_mouse_pointer="";
$rs_mouse_pointer  = get_post_meta(get_queried_object_id(), 'mouse-pointer', true);
if($rs_mouse_pointer != 'hide'){
	if(!empty($swipy_option['show_pointer']) || ($rs_mouse_pointer == 'show') ){
	    $pointer_localize_data = array(
	        'pointer_border' => $swipy_option['pointer_border'],
	        'border_width'   => $swipy_option['border_width'],
	        'pointer_bg'     => $swipy_option['pointer_bg'],
	        'diameter'       => $swipy_option['diameter'],
	        'scale'          => $swipy_option['scale'],
	        'speed'          => $swipy_option['speed'],     
	    );
	    wp_localize_script( 'swipy-main', 'pointer_data', $pointer_localize_data );
	}
}


if(!empty($swipy_option['show_scrollbar']) ){
    $scroll_localize_data 	= array(
        'cursorcolor' 		=> $swipy_option['cursorcolor'],
        'rail_bg'   		=> $swipy_option['rail_bg'],
        'cursor_width'     	=> $swipy_option['cursor_width'],
        'cursorminheight'   => $swipy_option['cursorminheight'],
        'scrollspeed'       => $swipy_option['scrollspeed'],
        'mousescrollstep'   => $swipy_option['mousescrollstep'],     
    );
    wp_localize_script( 'swipy-main', 'scroll_data', $scroll_localize_data );
}
