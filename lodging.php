<?php
include_once "database.php";
session_start();
if (!isset($_SESSION['first'])) {
	echo "<script>window.location.href='index.php'</script>";
}
?>

<!doctype html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="utf-8">
	<title>Lodging</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<div id="topbar">
		<img id="bismillah" src="images/bismillah.png">
		<h1 id="title">Groom & Bride's Wedding</h1>
		<?php
		    echo ('<p id="invited">Invited by Mr. & Mrs. John Doe</p>');
		?>
		<ul>
			<li class="navlinks"><a href="event.php">Event Info</a></li>
			<li class="navlinks"><a href="rsvp.php">RSVP</a></li>
			<li class="navlinks"><a href="contact.php">Contact</a></li>
			<li class='navlinks' id="selected"><a href="lodging.php">Lodging</a></li>
		</ul>
	</div>
	<div id="container" style="margin-top:20px">
		<h2>Lodging Information:</h2>
		<?php
		    echo ('<p><b>Request reservation under "Doe Wedding"</b></p>');
		?>
		<h3>Address: </h3>
		<p>Address</p>
		<p>City</p>
		<h3>Phone Number: </h3>
		<p>1-888-888-8888</p>
		<h3>Rate:</h3>
		<p>Nightly Rate</p>
	</div>
</body>

</html>
