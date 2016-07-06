<?php
//variable imports
include '../variables/secrets.php';
include '../functions/log_ip.php';//checks IP	
include '../functions/isValidUrl.php';
include '../functions/random_string.php';//generates random string
//include '../functions/error_page.php';

//imports from index.html
$url_full = $_POST['url_full'];//imports full url from index.html post
$url_full = ltrim($url_full); //trim leading space
$url_short = $_POST['url_short'];//imports short url from index.html
$url_short = ltrim($url_short);//trim leading space 
$searchable=0;
$searchable = $_POST['searchable'];//imports value of checkbox
$random=0;//defines if the URL is randomly generated	

$str_len = 6;//defines allowed string length of random string variable
$char_rep= 6;//defines allowed number of times a character can repeat
$message="An unhandled error occured";

//check if url_short is blank. if so generate random char string
if($url_short== '')
{
	$url_short=rand_str( $str_len, $char_rep );
	$random=1;

	//search to see if that random URL exists	
	$mysqli = new mysqli($host, $username, $password, $db_name);
	if ($mysqli->connect_error) 
	{
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
	$query = "SELECT url_short from $table where BINARY url_short='$url_short' AND random=1";
	$result = mysqli_query($mysqli,$query);
	$result->data_seek(1);
	$row = $result->fetch_row();
	//if the query found something. Run the random generator again.
	if($row[0]=='')
	{
		$url_short=rand_str( $str_len, $char_rep );
	}
	mysqli_close($mysqli);//close the connection
	$result->free();//free the result set.
}	
//uses the is_valid_url function
if (isValidUrl($url_full))
{	

	//establish connection to mysql
	$mysqli = new mysqli($host, $username, $password, $db_name);
	if ($mysqli->connect_error) 
	{
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}	

	//checks to see if the shortened URL exists already
	$sql="SELECT url_short,random FROM urls WHERE url_short LIKE '%$url_short%'";
	$result = mysqli_query($mysqli,$sql);

	//if results is not null run following statements
	if ($result = $mysqli->query($sql)) 
	{
		// select the first row returned (should be the only row as url_short is unique). 
		$result->data_seek(1);
		// fetch row
		$row = $result->fetch_row();
		//if row 1 / column 1 of the select is not null, url_short is alpha numeric, and
		if($row[0]!=$url_short && ctype_alnum($url_short))
		{
			//insert full URL, short URL, datetime, ip of submitter, user_id=1 (anon), and wether or not the search should be public into table "urls"
			$sql2="INSERT INTO $table (url_full, url_short, datetime, ip_put, public, random) VALUES ('$url_full', '$url_short', now(), INET_ATON('$IP'), '$searchable', '$random')";
			$result2 = mysqli_query($mysqli,$sql2);
			//message gets picked up below in the html
			echo "Your Short URL: http://slur.pw/$url_short\nCopy the link above into a URL bar to go to $url_full\n";
			$search='false';///improperly named determines if option to enter a new URL comes up
		}

		//if the short_url already exits or contains invalid chars
		elseif($row[0]==$url_short)
		{
			echo "Sorry, but that shortened URL is already in use\n";
			$search = 'true';//improperly named: sets value to allow new entry of a url
		}

		else
		{
			echo "The short url you entered contains invalid characters<br>Please try another short url (alpahnumeric only).\n";
			$search='true';
		}

	}	
}

else
{
	echo "Please Enter a Valid URL!\n having http:// or https:// is required to validate the url\n"; 
	$search = 'true';
}

mysqli_close($mysqli);
?>
