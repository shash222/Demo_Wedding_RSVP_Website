<?php
    include_once "database.php";
    session_start();
    if (!isset($_SESSION['first'])){
        echo "<script>window.location.href='index.php'</script>";
    }
    $data=mysqli_fetch_array(mysqli_query($conn,$_SESSION['sql']));
    if (!$data['MehndiAtt']&&!$data['WalimahAtt']&&!$data['BaraatAtt']){
        $noEvents="hidden";
    }
    if ($data['MehndiAtt']){
        $attMehndi= "<p id='att'>Attending</p>";
    }
    else{
        $attMehndi= "<p id='notAtt'>Not Attending</p>
              <p id='based'>Based on RSVP Response</p>";
    }
    if ($data['BaraatAtt']){
        $attBaraat= "<p id='att'>Attending</p>";
    }
    else{
        $attBaraat= "<p id='notAtt'>Not Attending</p>
              <p id='based'>Based on RSVP Response</p>";
    }
    if ($data['WalimahAtt']){
        $attWalimah= "<p id='att'>Attending</p>";
    }
    else{
        $attWalimah= "<p id='notAtt'>Not Attending</p>
              <p id='based'>Based on RSVP Response</p>";
    }
    if (!$data['MehndiAtt']){
        $attendingMehndi="hidden ";
    }
    if (!$data['BaraatAtt']){
        $attendingBaraat="hidden ";
    }
    if (!$data['WalimahAtt']){
        $attendingWalimah="hidden ";
    }
?>

<!Doctype html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta charset="UTF-8">
		<title>Event Info</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<script src="main.js"></script>
		<style>
		    #att{
		        color:green;
		        font-weight:bold;
		    }
		    
		    #attending td{
		        width:33%;
		    }
		    
		    #attending td+td{
		        border-left:1px solid black;
		    }
		    
		    #attending tr+tr+tr+tr{
		        border-top:1px solid black;
		    }
		    
		    table{
		        border-collapse:collapse;
		        margin-bottom:30px;
		    }

		    #notAtt{
		        color:red;
		        font-weight:bold;
		    }
		    
		    #based{
		        color:orange;
		        font-weight:bold;
		    }
		    
		    span{
		        font-size:25px;
		    }
		    
		    th{
		        font-family:vivaldi;
		        font-size:30px;
		    }
		    
		    @media screen and (orientation:landscape){
		        .portrait{
		            display:none;
		        }
		    }
		</style>
	</head>
	<body>
		<div id="topbar">
			<img id="bismillah" src="images/bismillah.png">
			<h1 id="title">Groom & Bride's Wedding</h1>
			<?php
			    echo('<p id="invited">Invited by Mr. & Mrs. John Doe</p>');	

			?>
		    <ul>
		        <li class="navlinks" id="selected"><a href="event.php">Event Info</a></li>
		        <li class="navlinks"><a href="rsvp.php">RSVP</a></li>
		        <li class="navlinks"><a href="contact.php">Contact</a></li>
		        <li class='navlinks'><a href="lodging.php">Lodging</a></li>
		    </ul>
		</div> 
		<div id="container" style="margin-top:20px">
		    <table style="border-bottom:1px solid black" <?php echo $_SESSION['hideMehndi']?>>
		        <tr>
		            <th width="20%">Mehndi<br></th>
		            <th width="80%">Day, <br class="portrait">Date, <br class="portrait">Year<br></th>
		        </tr>
		        <tr>
		            <td>
		                <?php echo $attMehndi?>
		            </td>
		            <td><span>Venue</span><br>
	                    Address,<br>City, State Zip</td>
		        </tr>
		    </table>
		    <table style="border-bottom:1px solid black" <?php echo $_SESSION['hideBaraat']?>>
		        <tr>
		            <th width="20%">Baraat<br></th>
		            <th width="80%">Day, <br class="portrait">Date, <br class="portrait">Year<br></th>
		        </tr>
		        <tr>
		            <td><?php echo $attBaraat?></td>
		            <td><span>Venue</span><br>
	                    Address,<br>City, State Zip</td>
		    </table>
		    <table style="border-bottom:1px solid black" <?php echo $_SESSION['hideWalimah']?>>
		        <tr>
		            <th width="20%">Walimah<br></th>
		            <th width="80%">Day, <br class="portrait">Date, <br class="portrait">Year<br></th>
		        </tr>
		        <tr>
		            <td><?php echo $attWalimah?></td>
		            <td><span>Venue</span><br>
	                    Address,<br>City, State Zip</td>
		        </tr>
		    </table>
		    <table id="attending" <?php echo $noEvents?>>
		        <tr>
		            <td colspan="3">People Attending:</td>
		        </tr>
		        <tr <?php echo $noEvents?>>
		            <th>Event</th>
		            <th>Adults</th>
		            <th>Children</th>
		        </tr>
		        <tr <?php echo $_SESSION['hideMehndi']; echo $attendingMehndi?>>
		            <td>Mehndi</td>
		            <td width="50%"><?php echo $data['AdultsAttMehndi']?></td>
		            <td width="50%"><?php echo $data['ChildrenAttMehndi']?></td>
		        </tr>
		        <tr <?php echo $_SESSION['hideBaraat']; echo $attendingBaraat?>>
		            <td>Baraat</td>
		            <td width="50%"><?php echo $data['AdultsAttBaraat']?></td>
		            <td width="50%"><?php echo $data['ChildrenAttBaraat']?></td>
		        </tr>
		        <tr <?php echo $_SESSION['hideWalimah']; echo $attendingWalimah?>>
		            <td>Walimah</td>
		            <td width="50%"><?php echo $data['AdultsAttWalimah']?></td>
		            <td width="50%"><?php echo $data['ChildrenAttWalimah']?></td>
		        </tr>
		        <tr>
		            <td colspan="3">Email: <?php echo $data['Email']?></td>
		        </tr>
		    </table>
		</div>
		<script src="main.js"></script>
	</body>
</html>
