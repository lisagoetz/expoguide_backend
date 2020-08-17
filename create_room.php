<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Expoguide</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php
// Importiert die Navigation
include "navigation.php";
?>
<header>
    <h2><a href="logout.php" class="btn logout-btn">Abmelden</a></h2>
</header>
<div class="wrapper">
    <main>
        <h1>Raum erstellen</h1>
        <?php
        //Verbindung zur Datenbank
        include 'connect.inc.php';

        if (isset($_POST['submit']))
        {
            $roomname = $_POST['roomname'];

            $query = "INSERT INTO rooms (roomname)
	                        VALUES ('$roomname')";

            $statement = $pdo->prepare($query);
            if($statement->execute()) {
                $roomID = $pdo->lastInsertId();
                echo "<script type='text/javascript'> document.location = 'update_room.php?id=$roomID'; </script>";
            } else {
                echo "<div class='alert alert-danger'>Raum konnte nicht erstellt werden.</div>";
            }

            $pdo = null;
        }
        ?>
        <form action="create_room.php" method="post">
            <fieldset>
                <ul>
                    <li>
                        <label for="room"><h2>Name</h2></label>
                        <input type="text" name="roomname" id="room" placeholder="Name" required>
                    </li>
                    <input type="submit" name="submit" value='Speichern' class="btn submit-btn">
                </ul>
            </fieldset>
        </form>
    </main>
</div>
</body>
