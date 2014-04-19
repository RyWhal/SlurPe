<?php

//this function selects the URLs from the DB that are clicked the most
//this probably isnt scaleable. This will probably suck if the DB gets large

function most_clicked(){
	//import variables from secrets.php
	include '../variables/secrets.php';
	//establish mysql connection
	$mysqli = new mysqli($host, $username, $password, $db_name);
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

	//insert information into table "entry"
	$query="SELECT url_short,clicks,url_full FROM urls WHERE public=1 ORDER BY clicks desc LIMIT 20;";
	$result = mysqli_query($mysqli,$query);
	$a=0;
	$b=0;
	$c=0;

        //TODO: make this not a hard coded number that can handle paging
	if ($result = $mysqli->query( $query)) {	
		while($a <= 19){   
			// select the entry
			$result->data_seek($a);
			$row = $result->fetch_row();
			$b=0;
			$c=$a+1;
			echo"<tr><th>".$c.".</th>";
			//generates a table
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
	mysqli_close($mysqli);
}

?>
