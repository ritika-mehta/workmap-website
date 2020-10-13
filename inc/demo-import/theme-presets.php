<?php
/**
 * Theme Presets
 *
 * @package Squaretype
 */

/**
 * Theme Presets
 */
function csco_theme_presets() {
	$presets = array(
		'squaretype'    => array( '#2E073B', '#BCDED5', '#E4B28E', '#D7DAE5', '#B9CDDA' ),
		'steez'         => array( '#9A8F97', '#E9E3E6', '#B2A7A7', '#6D6D6D', '#C3BABA' ),
		'wire'          => array( '#61CC4A', '#D8E2DC', '#000000', '#61CC4A', '#1098F7' ),
		'papercut'      => array( '#FF4133', '#F0C808', '#006EDC', '#FCAA67', '#1B1B3A' ),
		'wanderlust'    => array( '#DDBD97', '#F25F5C', '#50514F', '#247BA0', '#FFE0B5' ),
		'soda'          => array( '#C1D3B4', '#DFFDFF', '#FFEE93', '#CBE896', '#AAC0AA' ),
		'mannequin'     => array( '#D9B3BD', '#F1E4F3', '#000000', '#F9E0EA', '#E7E8EA' ),
		'extraordinary' => array( '#3A353F', '#505668', '#C05850', '#F1ECE1', '#E2AB7F' ),
		'aesthetics'    => array( '#A2ACBD', '#EDF2FF', '#F4E7D0', '#A2ACBD', '#BBA991' ),
	);
	return $presets;
}
add_filter( 'csco_theme_presets', 'csco_theme_presets' );
