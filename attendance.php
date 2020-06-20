<?php
    include_once "database.php";
    session_start();
    if (!isset($_SESSION['first'])){
        echo "<script>window.location.href='index.php'</script>";
    }
    $data=mysqli_fetch_array(mysqli_query($conn,$_SESSION['sql']));
    $first=$_SESSION['first'];
    $last=$_SESSION['last'];
    $city=$_SESSION['city'];
    if (!$data['MehndiAtt']&&!$data['WalimahAtt']&&!$data['BaraatAtt']){
        $sql=mysqli_query($conn,"UPDATE invited SET ADULTSATTMEHNDI=0, ADULTSATTBARAAT=0, ADULTSATTWALIMAH=0, CHILDRENATTMEHNDI=0,CHILDRENATTBARAAT=0,CHILDRENATTWALIMAH=0,EMAIL='' WHERE FIRSTNAME='$first' AND LASTNAME='$last' AND CITY='$city'; ");
        echo "<script>window.location.href='confirmation.php'</script>";
    }
    $flake="";
    $first=($_SESSION['first']);
    $last=($_SESSION['last']);
    $city=($_SESSION['city']);
    if ($data['Email']==null){
        $emailValue="placeholder='EMAIL'";
    }
    else{
        $emailValue="value=".$data['Email'];
    }
    $attendingMehndi="";
    $attendingBaraat="";
    $attendingWalimah="";
    if (!$data['MehndiAtt']){
        $attendingMehndi="hidden ";
    }
    if (!$data['BaraatAtt']){
        $attendingBaraat="hidden ";
    }
    if (!$data['WalimahAtt']){
        $attendingWalimah="hidden ";
    }
    if (isset($_POST['submit']) or isset($_POST['goBack'])){
        if (!$data['MehndiAtt']){
            $adultsMehndi=0;
            $childrenMehndi=0;
        }
        else{
            $adultsMehndi=$_POST['adultsMehndi'];
            $childrenMehndi=$_POST['childrenMehndi'];
        }
        if (!$data['BaraatAtt']){
            $adultsBaraat=0;
            $childrenBaraat=0;
        }
        else{
            $adultsBaraat=$_POST['adultsBaraat'];
            $childrenBaraat=$_POST['childrenBaraat'];
        }
        if (!$data['WalimahAtt']){
            $adultsWalimah=0;
            $childrenWalimah=0;
        }
        else{
            $adultsWalimah=$_POST['adultsWalimah'];
            $childrenWalimah=$_POST['childrenWalimah'];
        }
        $email=$_POST['email'];
        mysqli_query($conn,"UPDATE invited SET ADULTSATTMEHNDI=$adultsMehndi,CHILDRENATTMEHNDI=$childrenMehndi,ADULTSATTBARAAT=$adultsBaraat,CHILDRENATTBARAAT=$childrenBaraat,ADULTSATTWALIMAH=$adultsWalimah,CHILDRENATTWALIMAH=$childrenWalimah,EMAIL='$email' WHERE FIRSTNAME='$first' AND LASTNAME='$last' AND CITY='$city';");
        if (isset($_POST['submit'])){
            echo "<script>window.location.href='confirmation.php'</script>";
        }
        else{
            echo "<script>window.location.href='rsvp.php'</script>";
        }
    }
?>

<!Doctype html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta charset="UTF-8">
		<title>RSVP</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<style>
            #rightButton{
                width:45px;
                height:35px;
                border:none;
                background-color:inherit;
                background-image:url('images/arrow.png');
                background-size:45px 35px;
                position:absolute;
                margin-top:20px;
                right:0;
		    }
		    
		    #leftButton{
                width:45px;
                height:35px;
                background-color:inherit;
                border:none;
                background-image:url('images/arrow.png');
                background-size:45px 35px;
                position:absolute;
                margin-top:20px;
                left:0;
                transform:rotate(180deg);
		    }
		    
		    #display{
		        border-collapse:collapse;
		    }

            #display td{
                width:25%;
            }

		    #display td+td{
		        border-left:1px solid black;
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
		        <li class="navlinks"><a href="event.php">Event Info</a></li>
		        <li class="navlinks" id="selected"><a href="rsvp.php">RSVP</a></li>
		        <li class="navlinks"><a href="contact.php">Contact</a></li>
		        <li class='navlinks'><a href="lodging.php">Lodging</a></li>
		    </ul>
		</div>
		<div id="container">
            <h2>Family Name: <?php echo $_SESSION['first']."  ".$_SESSION['last']?></h2>
    		<table id="display" style="margin-top:20px">
    		    <tr><b>
    		        <th>Event:</th>
    		        <th>Total Guests Invited</th>
    		        <th>Adults</th>
    		        <th>Children<br>(3-12)</th>
    		    </b></tr>
    		    <tr style="border-bottom:1px solid black" <?php echo $_SESSION['hideMehndi']; echo $attendingMehndi?>>
    		        <td>Mehndi</td>
    		        <td><?php echo $data['TotalGuestsMehndi']?></td>
    		        <td><?php echo $data['AdultsInvMehndi']?></td>
    		        <td><?php echo $data['ChildrenInvMehndi']?></td>
    		    </tr>
    		    <tr style="border-bottom:1px solid black" <?php echo $_SESSION['hideBaraat']; echo $attendingBaraat?>>
    		        <td>Baraat</td>
    		        <td><?php echo $data['TotalGuestsBaraat']?></td>
    		        <td><?php echo $data['AdultsInvBaraat']?></td>
    		        <td><?php echo $data['ChildrenInvBaraat']?></td>
    		    </tr>
    		    <tr <?php echo $_SESSION['hideWalimah']; echo $attendingWalimah?>>
    		        <td>Walimah</td>
    		        <td><?php echo $data['TotalGuestsWalimah']?></td>
    		        <td><?php echo $data['AdultsInvWalimah']?></td>
    		        <td><?php echo $data['ChildrenInvWalimah']?></td>
    		    </tr>
    		</table>
    		<form action="" method="post" style="margin-top: 20px;" border="1px solid black">
    		    <table>
    		        <tr>
    		            <td><b>Event:</b></td>
        	            <td><b>Adults:</b></td>
        	            <td><b>Children:</b></td>
        	        </tr>
        	        <tr <?php echo $_SESSION['hideMehndi']; echo $attendingMehndi?>>
        	            <td>Mehndi</td>
        	            <td>
        	                <select name="adultsMehndi">
            	                <?php
            	                    for ($i=$data['AdultsInvMehndi'];$i>=0;$i--){
                        	            echo "<option value='$i'>$i</option>";
            	                    }
                    	        ?>
                	        </select>
        	            </td>
        	            <td>
        	                <select name="childrenMehndi">
            	                <?php 
            	                    for ($i=$data['ChildrenInvMehndi'];$i>=0;$i--){
                        	            echo "<option value='$i'>$i</option>";
            	                    }
                    	        ?>
                	        </select>
        	            </td>
        	         </tr>
        	        <tr <?php echo $_SESSION['hideBaraat']; echo $attendingBaraat?>>
        	            <td>Baraat</td>
        	            <td>
        	                <select name="adultsBaraat">
            	                <?php
            	                    for ($i=$data['AdultsInvBaraat'];$i>=0;$i--){
                        	            echo "<option value='$i'>$i</option>";
            	                    }
                    	        ?>
                	        </select>
        	            </td>
        	            <td>
        	                <select name="childrenBaraat">
            	                <?php 
            	                    for ($i=$data['ChildrenInvBaraat'];$i>=0;$i--){
                        	            echo "<option value='$i'>$i</option>";
            	                    }
                    	        ?>
                	        </select>
        	            </td>
        	         </tr>
        	        <tr <?php echo $_SESSION['hideWalimah']; echo $attendingWalimah?>>
        	            <td>Walimah</td>
        	            <td>
        	                <select name="adultsWalimah">
            	                <?php
            	                    for ($i=$data['AdultsInvWalimah'];$i>=0;$i--){
                        	            echo "<option value='$i'>$i</option>";
            	                    }
                    	        ?>
                	        </select>
        	            </td>
        	            <td>
        	                <select name="childrenWalimah">
            	                <?php 
            	                    for ($i=$data['ChildrenInvWalimah'];$i>=0;$i--){
                        	            echo "<option value='$i'>$i</option>";
            	                    }
                    	        ?>
                	        </select>
        	            </td>
        	         </tr>
                </table>
                <br>
                <p>Enter Email Address:</p>
                <input type="email" name="email" <?php echo $emailValue?> required style="width:50%"><br><br>
                <input type="submit" name="submit" id="rightButton" value="">
                <input type="submit" name="goBack" id="leftButton" value=""> 
    		</form>
    	</div>
		<script src="main.js"></script>
	</body>
</html>
