<?php
// code is from http://paste.tbee-clan.de/r/whLB5
function rand_str( $len, $rep )
{
	// The alphabet the random string consists of
	$abc = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

	// The default length the random key should have
	$defaultLength = 3;

	// The default count of repetitions of a char in the random string
	$defaultRepetitions = 1;

	// Ensure $len is a valid number
	// Should be less than or equal to strlen( $abc ) but at least $defaultLength
	$len = max( min( intval( $len ), strlen( $abc )), $defaultLength );

	// Max. repetitions of a char
	// Should be less than or equal to $len but at least $defaultRepetitions
	$rep = max( min( intval( $rep ), $len ), $defaultRepetitions );

	// Expand $abc. Of course you may concatenate only parts of $abc here, too.
	$abc = str_repeat( $abc, $rep );

	// Return snippet of random string as random string
	return substr( str_shuffle( $abc ), 0, $len );
}

?>
