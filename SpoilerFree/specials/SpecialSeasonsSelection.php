<?php
class SpecialSeasonsSelection extends SpecialPage {
	public function __construct() {
		parent::__construct( 'SeasonsSelection' );
	}

	public function execute( $sub ) {	
		global $wgSpoilerFreeEpisodeCounts;
		global $wgSpoilerFreeSeasonCount;	
		$out = $this->getOutput();
		$request = $this->getRequest();
		$user = $this->getUser();
		$out->setPageTitle('Seasons Selection');
		$out->addModules('ext.SpoilerFree.season');

		if(!isset($wgSpoilerFreeEpisodeCounts) || !isset($wgSpoilerFreeSeasonCount)){
			$out->addHTML('The Spoiler Free extension is not configured correctly!');
		}
		
		if( !$user->isLoggedIn() ){
			$out->addHTML('You must login to use this feature!');
		} else if($request->wasPosted()) {
			$season = $request->getVal('season');
			$episode = $request->getVal('episode');
			
			if($episode == '0' || !isset($episode)) {
				$this->renderSeasonList($season, $out);
				
				if($season != '0'){
					$this->renderEpisodeList($season, null, $out);
				}
			} else {
				$user->setOption('season', $season);
				$user->setOption('episode', $episode);
				$user->saveSettings();
				$out->addHTML('Saved!');
				
				return;
			}
		} else {
			$season = $user->getOption('season');
			$this->renderSeasonList($season, $out);
			
			if(isset($season)) {
				$episode = $user->getOption('episode');
				$this->renderEpisodeList($season, $episode, $out);
			}			
		}
		
		$out->addHTML('<div><input type="submit" value="Submit" /></div></div></form>');
	}
	
	private function renderEpisodeList($season, $episode, $out) {
		global $wgSpoilerFreeEpisodeCounts;
		$episodeMaxCount = $wgSpoilerFreeEpisodeCounts[$season - 1];
				
		$out->addHTML('<div>Episode Number:</div>');
		$out->addHTML('<div><select id="episode-ddl" name="episode">');
		$out->addHTML('<option value="0">-</option>');
					
		for ($episodeCount = 1; $episodeCount <= $episodeMaxCount; $episodeCount++ ) {
			if($episode == $episodeCount) {
				$out->addHTML('<option value="'.$episodeCount.'" selected>'.$episodeCount.'</option>');
			} else {
				$out->addHTML('<option value="'.$episodeCount.'">'.$episodeCount.'</option>');
			}				
		}
		
		$out->addHTML('</select></div>');
	}
	
	private function renderSeasonList($season, $out){
		global $wgSpoilerFreeSeasonCount;
		$out->addHTML('<form id="selection-form" name="seasonselection" method="post"><div><div>Season Number:</div><div><select id="season-ddl" name="season">');
		$out->addHTML('<option value="0">-</option>');
		
		for ($seasonCount = 1; $seasonCount <= $wgSpoilerFreeSeasonCount; $seasonCount++ ) {
			if($seasonCount == $season) {
				$out->addHTML('<option value="'.$seasonCount.'" selected>'.$seasonCount.'</option>');
			} else {
				$out->addHTML('<option value="'.$seasonCount.'">'.$seasonCount.'</option>');
			}
		}
		
		$out->addHTML('</select></div>');
	}
}
?>