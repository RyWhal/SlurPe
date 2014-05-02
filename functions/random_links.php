<?php
// THIS FUNCTION HAS BEEN DEPRECATED
// it makes things too complex

function random_links(){
	include '../variables/secrets.php';
	$mysqli = new mysqli($host, $username, $password, $db_name);
        if ($mysqli->connect_error) {
                die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
        }

        //insert information into table "entry"
        $query="SELECT url_short,clicks,url_full FROM urls WHERE public=1 ORDER BY RAND() limit 20;";
        $result = mysqli_query($mysqli,$query);
	$a=0;
	$b=0;
	$c=0;
	
        if ($result = $mysqli->query( $query)) {	
		while($a <= 19){   
	     		// select the entry
                	$result->data_seek($a);
                	$row = $result->fetch_row();
                        $b=0;
			$c=$a+1;
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
