r<?php
    include_once "database.php";
    session_start();
    if (isset($_POST['submit'])){
        $time=date("Y-m-d H:i:s",time());
        $first=$_POST['first'];
        $last=$_POST['last'];
        $city=$_POST['city'];
        $_SESSION['first']=$first;
        $_SESSION['last']=$last;
        $_SESSION['city']=$city;
        $_SESSION['sql']="SELECT * FROM invited WHERE FIRSTNAME='$first' AND LASTNAME='$last' AND CITY='$city';";
        $sql=mysqli_query($conn,$_SESSION['sql']);
        if (mysqli_num_rows($sql)==0){
            $logSql="INSERT INTO `accessLog` (first, last, city, successful, time) VALUES ('$first', '$last', '$city', 0, '$time')";
            mysqli_query($conn,$logSql);
            $fail="<p style='color:red'>Error: could not find name.  Enter EVITE for city if the card was emailed to you.  Enter city on letter if the card was postmailed.  If trouble still persists, please mail anum5000 at gmail dot com your confirmation.</p>";
        }
        else{
            $logSql="INSERT INTO `accessLog` (first, last, city, successful, time) VALUES ('$first', '$last', '$city', 1, '$time')";
            mysqli_query($conn,$logSql);
            echo "<script>window.location.href='rsvp2.php'</script>";
        }
    }
?>

<!doctype html>
<html>
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Anas and Anoshia Wedding RSVP</title>
		<link rel="stylesheet" type="text/css" href="main.css">
        <style>
            form{
                width:60%;
            }
			.entry{
				width:100%;
				height:35px;
			}
			
            #indexButton{
                width:45px;
                height:30px;
                background-color:inherit;
                background-image:url('images/arrow.png');
                background-size:45px 30px;
                border:none;
                position:absolute;
            }
            
            #appears{
                font-size:12px;
            }
		</style>
    </head>
    <body>
		<div id="topbar">
			<img id="bismillah" src="images/bismillah.png">
			<h1 id="title">Anas & Anoshia's Wedding</h1>
			<p id="invited">Invited by Mr. & Mrs. Quaiser Hashmi</p>
		</div>
		<div id="container"> 
		    <?php echo $fail?>
            <p><b>Enter Family Name <br><span id="appears">(As Appears on Invitation):</span></b></p>
            <form action="" method="post">
                <input class="entry" type="text" name="first" placeholder="FIRST NAME"><br><br>
                <input class="entry" type="text" name="last" placeholder="LAST NAME"><br><br>
                <input class="entry" type="text" name="city" placeholder="CITY">
                <input type="submit" name="submit" value="" id="indexButton">
              <p>Enter "Evite" in place of City if the card was emailed to you. </p>


           </form>
        </div>
        <script>
            var button=document.getElementById("indexButton");
            var buttonHeight=button.clientHeight;
            var formHeight=document.getElementsByTagName("form")[0].clientHeight;
            button.style.top=(formHeight-buttonHeight-2)/2+"px";
            button.style.right= -button.clientWidth-20+"px";
        </script>
    </body>
</html>
