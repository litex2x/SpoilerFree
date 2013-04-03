SpoilerFree
===========

Installation:

1.  Copy the SpoilerFree directory into the mediawiki extensions folder or add a symbolic link pointing to it.

2.  Go into your mediawiki LocalSettings.php and add the following line to bottom:
    require_once("$IP/extensions/SpoilerFree/SpoilerFree.php");

Usage:

1.  Login into a mediawiki account.
2.  Open the Special:SeasonsSelection in mediawiki.
3.  Set seasons and episodes options. Submit when finished.
4.  All season tags should render based on the season and episode options set by the user.
    
    i.e.  &lt;season id="1" episode="1"&gt;Snape kills Dumbledore&lt;/season&gt;
