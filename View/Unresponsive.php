<?php
    include_once "../database.php";
    $result=mysqli_query($conn,'SELECT * FROM Unresponsive');

?>

<!doctype html>
<html>
    <head>
		<title>Anas and Anoshia Wedding RSVP</title>
		<link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>a
<?php 


if($result->num_rows && $row2 = mysqli_fetch_assoc($result)) {
		echo '<table>';
		echo "<tr>";
		foreach(array_keys($row2) as $key=>$value){
		    echo "<th> ".$value." </th>";
		}
		echo "</tr>";
		echo '<tr>';
		foreach($row2 as $key=>$value) {
			echo '<td>',$value,'</td>';
		}
		echo '</tr>';
		while($row2 = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			foreach($row2 as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';
	}
	
	
	
?>
    </body>
</html>
