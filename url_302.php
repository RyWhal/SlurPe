
<?php
//variable imports
include 'variables/secrets.php';
include 'functions/log_ip.php';//checks IP
include 'functions/is_valid_url.php';//check url function

//gets url_short from the url post
$url_short= $_GET["url_short"];

//opens a new mysqli connection
$mysqli = new mysqli($host, $username, $password, $db_name);
if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}

//Selects full URL, #clicks where url_short is the posted url_short
$query="SELECT url_full,clicks,id FROM urls WHERE BINARY url_short LIKE '$url_short'";
$result = mysqli_query($mysqli,$query);

if ($result = $mysqli->query( $query)) {
	// select the one row that should have been returned
	$result->data_seek(1);
	$row = $result->fetch_row();

	//if row 1 column1 is not NULL then...
	if($row[0]!=NULL){
		$url_full=$row[0];//update url_full to be row1/column1's value
		$id=$row[2];//sets id = to row1 column3
		$clicks=$row[1] + 1;//adds 1 to the current "clicks" value for tracking
		$query2="UPDATE urls SET clicks= '$clicks' WHERE id LIKE '$id'";//adds updated clicks back into DB record
		mysqli_query($mysqli,$query2);//runs query to update clicks

		//url redirection
		header("Location: ".$url_full);
	}
	else{
		//If a bad short_url is entered this redirects to a custom 404 page
		echo "<body style='background-color:#222222;'><a href='index.html'><img src='images/slurpe404.png' style='margin-left:15%;margin-right:15%;height:100%'><a></body>";
		exit;
	}

}
$result->close();//close result set
$mysqli->close();//close connection

?>

