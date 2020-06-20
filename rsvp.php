<?php
    include_once "database.php";
    session_start();
    if (!isset($_SESSION['first'])){
        echo "<script>window.location.href='index.php'</script>";
    }
    $data=mysqli_fetch_array(mysqli_query($conn,$_SESSION['sql']));
    $mehndi=$data['MehndiInv'];
    $baraat=$data['BaraatInv'];
    $walimah=$data['WalimahInv'];
    $first=$_SESSION['first'];
    $last=$_SESSION['last'];
    $city=$_SESSION['city'];
    
    
    $hideMehndi="";
    if (!$mehndi){
        $_SESSION['hideMehndi']="hidden ";
        $hideMehndi =TRUE;
    }
    else{
        if ($data['MehndiAtt']){
            $mehndiYes="checked";
            $mehndiNo="";
        }
        else{
            $mehndiNo="checked";
            $mehndiYes="";
        }
    }
    if (!$baraat){
        $_SESSION['hideBaraat']="hidden ";
        $hideBaraat=TRUE;
    }
    else{
        if ($data['BaraatAtt']){
            $baraatYes="checked";
            $baraatiNo="";
        }
        else{
            $baraatNo="checked";
            $baraatYes="";
        }
    }
    if (!$walimah){
        $_SESSION['hideWalimah']="hidden ";
        $hideWalimah=TRUE;
    }
    else{
        if ($data['WalimahAtt']){
            $walimahYes="checked";
            $walimahNo="";
        }
        else{
            $walimahNo="checked";
            $walimahYes="";
        }
    }
    if (isset($_POST['submit'])){
        $mehndiResp=$_POST['mehndi'];
        $baraatResp=$_POST['baraat'];
        $walimahResp=$_POST['walimah'];
        if ($mehndiResp==""){
            $mehndiResp=0;
        }
        if ($baraatResp==""){
            $baraatResp=0;
        }
        if ($walimahResp==""){
            $walimahResp=0;
        }
        mysqli_query($conn,"UPDATE invited SET MEHNDIATT=$mehndiResp,BARAATATT=$baraatResp,WALIMAHATT=$walimahResp WHERE FIRSTNAME='$first' AND LASTNAME='$last' AND CITY='$city';");
        echo "<script>window.location.href='attendance.php'</script>";
    }
?>

<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
		<title>RSVP</title>
		<link rel="stylesheet" type="text/css" href="main.css"> 
		<style>
		    .radio{
		        -webkit-appearance:check-box;
		        width:10px;
		        height:10px;
		    }
		    
		    #button{
                width:45px;
                height:35px;
                background-color:inherit;
                background-image:url('images/arrow.png');
                background-size:45px 35px;
                position:absolute;
                border:none;
                right:0;
                margin-top:20px;
		    }
		    
		    h2{
		        margin:0;
		    }
		    
		    table{
		        border-collapse:collapse;
                border-bottom:1px solid black;
		    }
		    
		    .event+div{
		    }
		    
		    .event{
		    }
		    
		    .center{
		        text-align:center;
		        width:100%;
		    }
		    
		    .date{
		        top:0;
		    }
		    
		    .left{
		        width:45%;
		        display:inline-block;
		    }
		    
		    .right{
		        width:50%;
		        display:inline-block;
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
		        <li class='navlinks'><a href="event.php">Event Info</a></li>
		        <li class='navlinks' id="selected"><a href="rsvp.php">RSVP</a></li>
		        <li class='navlinks'><a href="contact.php">Contact</a></li>
		        <li class='navlinks'><a href="lodging.php">Lodging</a></li>
		    </ul>
		</div>
		<div id="container">
		    <p style="font-family:gabriola; font-size:20px">The Doe Family requests the pleasure of your company at the wedding of their Son</p>
    	    <form action="" method="post">
    	        <div class="event" <?php if($hideMehndi) echo "hidden"; ?>>
    	            <div class="center">
    	                <h2>Event 1</h2>
    	            </div>
     	            <div class="left">
    	                <p class="date">Day<br>
    	                Date,<br>
    	                Year</p>
    	                <p>Attending:</p>
    	            </div>
    	            <div class="right">
    	                <p>Venue<br>
    	                   Address,<br>
    	                   City, State, Zip<br>
    	                </p>
    	                <p>
                            Yes<input class="radio" type="radio" name="mehndi" value="1" style="display:inline-block" <?php echo $mehndiYes?>>
                            No<input class="radio" type="radio" name="mehndi" value="0" style="display:inline-block" <?php echo $mehndiNo?>>
    	                </p>
    	            </div>
    	        </div>
    	        <div class="event" <?php if($hideBaraat) echo "hidden"; ?>>
    	            <div class="center">
    	                <h2>Baraat</h2>
    	            </div>
    	            <div class="left">
    	                <p class="date">Date<br>
    	                Date,<br>
    	                Year</p>
    	                <p>Attending:</p>
    	            </div>
    	            <div class="right">
    	                <p>Venue<br>
    	                    Address,<br>
                            City, State, Zip</p>
    	                <p>
                            Yes<input class="radio" type="radio" name="baraat" value="1" style="display:inline-block" <?php echo $baraatYes?>>
                            No<input class="radio" type="radio" name="baraat" value="0" style="display:inline-block" <?php echo $baraatNo?>>
    	                </p>
    	            </div>
    	        </div>
    	        <div class="event" <?php if($hideWalimah) echo "hidden"; ?>>
    	            <div class="center">
    	                <h2>Walimah</h2>
    	            </div>
    	            <div class="left">
    	                <p class="date">Day<br>
    	                Date,<br>
    	                Year</p>
    	                <p>Attending:</p>
    	            </div>
    	            <div class="right">
    	                <p>Venue<br>
    	                   Address,<br>
                           City, State, Zip</p>
    	                <p>
                            Yes<input class="radio" type="radio" name="walimah" value="1" style="display:inline-block" <?php echo $walimahYes?>>
                            No<input class="radio" type="radio" name="walimah" value="0" style="display:inline-block" <?php echo $walimahNo?>>
    	                </p>
    	            </div>
    	        </div>
    		    <input type="submit" name="submit" value="" id="button">
		    </form>
		</div>
		<script src="main.js"></script>
	</body>
</html>
