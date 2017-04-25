<?php
/**
 * @param  string $filename
 * @param  array  $data
 * @return string
 */
function includeTemplate($filename, $data) {
	if ('templates/'.str_replace('..','',$filename).'.php') {
		htmlspecialchars($data);
		ob_start();
		include 'templates/'.$filename.'.php';
		$text = ob_get_contents();
		ob_end_clean();
		return $text;
		
	} else {
		return '';
	}
}

$header = includeTemplate('header', []);
$main = includeTemplate('main', []);
$footer = includeTemplate('footer', []);

echo $header, $main, $footer;