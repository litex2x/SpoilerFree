<?php
$wgExtensionCredits['validextensionclass'][] = array(
		'path' => __FILE__,
		'name' => 'SpoilerFree',
		'author' => 'Ritchie Marihugh',
		'url' => 'http://www.google.com',
		'description' => 'This extension allows users to filter mediawiki pages to remain spoiler free.',
		'version' => '1.0.0'
);

$dir = dirname(__FILE__);

$wgAutoloadClasses['SpoilerFreeHooks'] = $dir . '/SpoilerFree.hooks.php';
$wgAutoloadClasses['SpecialSeasonsSelection'] = $dir . '/specials/SpecialSeasonsSelection.php';

$wgHooks['ParserFirstCallInit'][] = 'SpoilerFreeHooks::sfParserInit';
$wgSpecialPages['SeasonsSelection'] = 'SpecialSeasonsSelection';
$wgSpecialPageGroups['SeasonsSelection'] = 'other';
?>