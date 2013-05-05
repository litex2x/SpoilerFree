<?php
class SpoilerFreeHooks {
	public static function sfParserInit (Parser $parser) {
		$parser->setHook( 'season', 'SpoilerFreeHooks::sfRender' );

		return true;
	}

	public static function sfRender ( $input, array $args, Parser $parser, PPFrame $frame ) {
		global $wgUser;
		$parser->disableCache();

		if(!$wgUser->isLoggedIn()){
			return $parser->recursiveTagParse( $input, $frame );
		} else {
			$season = $wgUser->getOption('season');
			$episode = $wgUser->getOption('episode');
	
			if($args['id'] < $season || $args['id'] == $season && $args['episode'] <= $episode) {
				return $parser->recursiveTagParse( $input, $frame );
			}
			
			return '';
		}
	}
}
?>