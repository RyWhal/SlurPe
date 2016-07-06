<?php
//variable imports
include 'variables/secrets.php';
include 'functions/log_ip.php';//checks IP
include 'functions/isValidUrl.php';
include 'functions/random_string.php';//generates random string
include 'functions/error_page.php';

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
if($url_short== ''){
	$url_short=rand_str( $str_len, $char_rep );
	$random=1;

	//search to see if that random URL exists
	$mysqli = new mysqli($host, $username, $password, $db_name);
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

	$query = "SELECT url_short from $table where BINARY url_short='$url_short' AND random=1";
	$result = mysqli_query($mysqli,$query);
	$result->data_seek(1);
	$row = $result->fetch_row();

	//if the query found something. Run the random generator again.
	if($row[0]==''){
		$url_short=rand_str( $str_len, $char_rep );
	}
	mysqli_close($mysqli);//close the connection
	$result->free();//free the result set.
}
//uses the is_valid_url function
if (isValidUrl($url_full)){

	//establish connection to mysql
	$mysqli = new mysqli($host, $username, $password, $db_name);
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

	//checks to see if the shortened URL exists already
	$sql="SELECT url_short,random FROM urls WHERE url_short LIKE '%$url_short%'";
	$result = mysqli_query($mysqli,$sql);

	//if results is not null run following statements
	if ($result = $mysqli->query($sql)) {
		// select the first row returned (should be the only row as url_short is unique).
		$result->data_seek(1);

		// fetch row
		$row = $result->fetch_row();

		//if row 1 / column 1 of the select is not null, url_short is alpha numeric, and
		if($row[0]!=$url_short && ctype_alnum($url_short)){
			//insert full URL, short URL, datetime, ip of submitter, user_id=1 (anon), and wether or not the search should be public into table "urls"
			$sql2="INSERT INTO $table (url_full, url_short, datetime, ip_put, public, random) VALUES ('$url_full', '$url_short', now(), INET_ATON('$IP'), '$searchable', '$random')";
			$result2 = mysqli_query($mysqli,$sql2);

			//message gets picked up below in the html
			$message= "<textarea class='copybox' id='copy_text'>slur.pw/$url_short</textarea>
				<p style='width:70%; margin-left:15%; margin-right:15%;'>Copy the link above into a URL bar to go to $url_full</p>
				<a href='index.html' class='backlink'><span class='glyphicon glyphicon-backward'></span><span style='font-weight:bold;'> Shorten another</span></a>";
			$search='false';///improperly named determines if option to enter a new URL comes up
		}

		//if the short_url already exits or contains invalid chars
		elseif($row[0]==$url_short){
			$message = "Sorry, but that shortened URL is already in use";
			$search = 'true';//improperly named: sets value to allow new entry of a url
		}

		else{
			$message = "The short url you entered contains invalid characters<br>Please try another short url (alpahnumeric only).";
			$search='true';
		}

	}
}

else{
	$message = "<h2>Please Enter a Valid URL!</h2>having http:// or https:// is required to validate the url<br>";
	$search = 'true';
}

mysqli_close($mysqli);
?>




<!DOCTYPE html PUBLIC "-//W2C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>slur.pw</title>

	<link href="dist/css/bootstrap.css" rel ="stylesheet">
	<link href="dist/css/custom.css" rel ="stylesheet">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<script type="text/javascript" src="js/clipboard_copy.js"></script>
	<style>
				.col-lg-8{margin-left:15%;margin-right:15%;}
				.input-group-addon{font-size:16px;}
				.copybox{width:70%; margin-left:15%; margin-right:15%;}
	</style>

</head>

<body style="padding: 30px; background-color:currentcolor">
	<div class="jumbotron" style="margin-top:15%; border-radius:15px;">
		<?php error_page($message, $search); //generates error page with $message from above and $search from above ?>
	</div>
</div><!--container-->

		<div class="footer_content">Created by Ryan Whalen - 2013</div>
		<img src="/images/slurpe.png" class="slurpe_logo">

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-45291951-1', 'slur.pe');
ga('send', 'pageview');

</script>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>

