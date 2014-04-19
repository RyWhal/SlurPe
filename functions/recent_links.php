<?php

function most_recent(){
	//imports the connection variables from secrets.php
	include '../variables/secrets.php';
	//establish the mysql connection
	$mysqli = new mysqli($host, $username, $password, $db_name);
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

	//insert information into table "entry"
	$query="select url_short,clicks,url_full from urls where public=1 order by datetime desc limit 20;";
	$result = mysqli_query($mysqli,$query);
	$a=0;
	$b=0;
	$c=0;
 
 	//make this function less rigid. hard coded to 20 results
	if ($result = $mysqli->query( $query)) {	
		while($a <= 19){   
			// select the entry
			$result->data_seek($a);
			$row = $result->fetch_row();
			$b=0;
			$c=$a+1;
			echo"<tr><th>".$c.".</th>";
			//print a table of short URLs
			while($b <=2){
				if ($b==0){
					echo '<th><a href="../'.$row[$b].'">slur.pe/'.$row[$b].'</a></th>';
				}
				else{
					echo "<th>".$row[$b]."</th>";
				}
				$b=$b+1;
			}
			$a=$a+1;
			echo "</tr>";
		}
	}
	else{
		echo "the query failed";
	}
	//close the connection
	mysqli_close($mysqli);
}

?>
