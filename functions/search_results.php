<?php

function search_function($search){
	include '../variables/secrets.php';
	//generates MySQL connection
	$mysqli = new mysqli($host, $username, $password, $db_name);
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

	//insert information into table "entry"
	$query="SELECT url_short,clicks,url_full FROM urls WHERE url_full LIKE '%$search%' AND public=1 OR url_short LIKE '%$search%' and public=1 ORDER by datetime DESC";
	$result = mysqli_query($mysqli,$query);
	$a=0;
	$b=0;
	$c=0;

	//TODO: make this function a little less rigid. right now it is hard coded to 50 results and cant handle multiple pages
	if ($result = $mysqli->query( $query)) {	
		while($a <= 49){   
			// select the entry
			$result->data_seek($a);
			$row = $result->fetch_row();
			$b=0;
			$c=$a+1;
			if ($row[0]==NULL){
				break;
			}
			echo"<tr><th>".$c.".</th>";

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
