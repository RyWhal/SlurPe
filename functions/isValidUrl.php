<?php
//function is just a fancy regex to look for url format
//does not verify valid URL
//It can't handle the end of a URL (.com, .org, etc)
function isValidURL($url) {
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

?>
