<?php
include_once "database.php";
session_start();
if (!isset($_SESSION['first'])) {
    echo "<script>window.location.href='index.php'</script>";
}
?>

<!Doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="main.js"></script>
    <style>
        a[href^=tel] {
            color: inherit;
        }
    </style>
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
            <li class="navlinks" id="selected"><a href="contact.php">Contact</a></li>
            <li class='navlinks'><a href="lodging.php">Lodging</a></li>
        </ul>
    </div>
    <div id="container" style="margin-top:20px">
	<table>
	    <?php
                echo ('                
                    <tr>
                        <td>Email:<br>
                            <b>testEmail@gmail.com</b></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name<br>
                                (888) 888-8888<br></b>
                            Groom\'s Brother
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name<br>
                                (888) 888-8888<br></b>
                            Groom\'s Sister
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name<br>
                                (888) 888-8888</b><br>
                            Groom\'s Mother
                        </td>
                    </tr>
                ');
            ?>

        </table>
    </div>
    <script src="main.js"></script>
</body>

</html>
