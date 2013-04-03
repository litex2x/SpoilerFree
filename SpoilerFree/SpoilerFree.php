<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/SpoilerFree/SpoilerFree.php" );
EOT;
	exit( 1 );
}

$wgExtensionCredits['validextensionclass'][] = array(
		'path' => __FILE__,
		'name' => 'SpoilerFree',
		'author' => 'Ritchie Marihugh',
		'url' => 'https://github.com/litex2x/SpoilerFree',
		'description' => 'This extension allows users to filter mediawiki pages to remain spoiler free.',
		'version' => '1.0.0'
);

$dir = dirname(__FILE__);
$wgAutoloadClasses['SpoilerFreeHooks'] = $dir . '/SpoilerFree.hooks.php';
$wgAutoloadClasses['SpecialSeasonsSelection'] = $dir . '/specials/SpecialSeasonsSelection.php';
$wgExtensionMessagesFiles['SpoilerFree'] = $dir . '/SpoilerFree.i18n.php';
$wgHooks['ParserFirstCallInit'][] = 'SpoilerFreeHooks::sfParserInit';
$wgSpecialPages['SeasonsSelection'] = 'SpecialSeasonsSelection';
$wgSpecialPageGroups['SeasonsSelection'] = 'other';
?>