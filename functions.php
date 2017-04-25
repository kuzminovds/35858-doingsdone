<?php
/**
 * @param  string $filename
 * @param  array  $data
 * @return string
 */
function includeTemplate($filename, $data) {
	if ('templates/'.str_replace('..','',$filename).'.php') {
			ob_start();
		htmlspecialchars($data);
		include 'templates/'.$filename.'.php';
		return ob_get_clean();
		
	} else {
		return '';
	}
}

$header = includeTemplate('header', []);
$main = includeTemplate('main', []);
$footer = includeTemplate('footer', []);

echo $header, $main, $footer;