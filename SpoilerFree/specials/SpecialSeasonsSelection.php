<?php
class SpecialSeasonsSelection extends SpecialPage {
	public function __construct() {
		parent::__construct( 'SeasonsSelection' );
	}

	public function execute( $sub ) {
		$out = $this->getOutput();
		$request = $this->getRequest();
		$user = $this->getUser();

		$out->setPageTitle("Seasons Selection");

		if( !$user->isLoggedIn() ){
			$out->addHTML('You must login to use this feature!');
		} else {
			if( $request->wasPosted() ) {
				$season = $request->getVal('season');
				$episode = $request->getVal('episode');
				$user->setOption('season', $season);
				$user->setOption('episode', $episode);
				$user->saveSettings();
				$out->addHTML('Saved!');
			} else {
				$season = $user->getOption('season');
				$episode = $user->getOption('episode');
				$out->addHTML('<div><div>Current Season:</div><div>'.$season.'</div><div>Current Episode:</div><div>'.$episode.'</div></div><form name="seasonselection" method="post"><div><div>Season Number:</div><div><select name="season"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div>Episode Number:</div><div><select name="episode"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div><div><input type="submit" value="Submit" /></div></div></form>');
			}
		}
	}
}
?>