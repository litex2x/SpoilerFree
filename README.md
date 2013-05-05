SpoilerFree
===========

Installation:

1.  Copy the SpoilerFree directory into the mediawiki extensions folder or add a symbolic link pointing to it.

2.  Go into your mediawiki LocalSettings.php and add the following line to bottom:
    
    require_once("$IP/extensions/SpoilerFree/SpoilerFree.php");

3.  Also in LocalSettings.php the following configuration variables need to be set like so in the following example:
    
    $wgSpoilerFreeSeasonCount = 5;                          // Represents the amount of seasons in a show.
    
    $wgSpoilerFreeEpisodeCounts = array(1, 2, 3, 4, 5);     // Represents the amount of episodes for each season.

Usage:

1.  Login into a mediawiki account.
2.  Open the Special:SeasonsSelection in mediawiki.
3.  Set seasons and episodes options. Submit when finished.
4.  All season tags should render based on the season and episode options set by the user.
    
    i.e.  &lt;season id="1" episode="1"&gt;Snape kills Dumbledore&lt;/season&gt;
