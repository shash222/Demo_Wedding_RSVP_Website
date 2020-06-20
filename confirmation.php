<?php
include_once "database.php";
session_start();
if (!isset($_SESSION['first'])) {
	echo "<script>window.location.href='index.php'</script>";
}
$data = mysqli_fetch_array(mysqli_query($conn, $_SESSION['sql']));
$time = (date("Y-m-d H:i:s", time()));
$first = $_SESSION['first'];
$last = $_SESSION['last'];
$city = $_SESSION['city'];
if ($data['DateSubmitted'] === '0000-00-00') {
	mysqli_query($conn, "UPDATE invited SET DATESUBMITTED='$time',DATEUPDATED='$time' WHERE FIRSTNAME='$first' AND LASTNAME='$last' AND CITY='$city'");
} else {
	mysqli_query($conn, "UPDATE invited SET DATEUPDATED='$time' WHERE FIRSTNAME='$first' AND LASTNAME='$last' AND CITY='$city'");
}
?>

<!Doctype html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
	<title>RSVP</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<div id="topbar">
		<img id="bismillah" src="images/bismillah.png">
		<?php
		    echo ('<h1 id="title">Anas & Anoshia\'s Wedding</h1>
		    <p id="invited">Invited by Mr. & Mrs. Quaiser Hashmi</p>');
		?>
		<ul>
			<li class="navlinks"><a href="event.php">Event Info</a></li>
			<li class="navlinks" id="selected"><a href="rsvp.php">RSVP</a></li>
			<li class="navlinks"><a href="contact.php">Contact</a></li>
			<li class='navlinks'><a href="lodging.php">Lodging</a></li>
		</ul>
	</div>
	<div id="container" style="margin-top:50px">
		<h2>THANK YOU!!!</h2>
		<p>Event Reminder will be sent closer to the day of the Ceremony!</p>
		<p>You will be redirected to the Event Info page in: <span id="timer"></span></p>
	</div>
	<script src="main.js"></script>
	<script>
		var x = 3;
		setInterval(function() {
			document.getElementById("timer").innerHTML = x;
			x--;
			if (x == 0) {
				window.location.href = "event.php"
			}
		}, 1000);
	</script>
</body>

</html>
