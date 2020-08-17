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
    <?php
    include "room_head.php";
    ?>
</head>
<body>
<?php
// Importiert die Navigation
include "navigation.php";

//Verbindung zur Datenbank
include "connect.inc.php";
?>
<header>
    <h2><a href="logout.php" class="btn logout-btn">Abmelden</a></h2>
</header>
<div class="wrapper">
    <main>
        <?php
        //Verbindung zur Datenbank
        include 'connect.inc.php';
        $roomID = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        if (isset($_POST['submit'])) {

            $itemname = $_POST['itemname'];
            $artist = $_POST['artist'];
            $date = $_POST['date'];
            $description = $_POST['description'];

            $image = $_FILES['image']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {

                $query = "INSERT INTO items (itemname, artist, date, description, image, roomID)
	                        VALUES ('$itemname', '$artist', '$date', '$description', '$image', '$roomID')";

                $statement = $pdo->prepare($query);
                if ($statement->execute()) {
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
                    echo "<script type='text/javascript'> document.location = 'update_room.php?id=$roomID'; </script>";
                } else {
                    echo "<div class='alert alert-danger'>Ausstellungsstück konnte nicht erstellt werden.</div>";
                }

                $pdo = null;
            }
        }
        ?>
        <?php
        room_head();
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <ul>
                    <li>
                        <label for="itemname"><h2>Titel</h2></label>
                        <input type="text" name="itemname" id="itemname" placeholder="Titel" required>
                    </li>
                    <li>
                        <label for="artist"><h2>Künstler</h2></label>
                        <input type="text" name="artist" id="artist" placeholder="Künstler" required>
                    </li>
                    <li>
                        <label for="Erscheinungsjahr"><h2>Erscheinungsjahr</h2></label>
                        <input type="text" name="date" id="date" placeholder="Erscheinungsjahr" required>
                    </li>
                    <li>
                        <label for="beschreibung"><h2>Beschreibung</h2></label>
                        <textarea name="description" id="description" placeholder="Beschreibung" required></textarea>
                    </li>
                    <li>
                        <label for="image"><h2>Bild</h2></label>
                        <input type="file" name="image" accept="*.jpg, *.jpeg, *.png, *.gif" required>
                    </li>
                    <input type="submit" name="submit" value="Speichern" class="btn submit-btn">
                </ul>
            </fieldset>
        </form>
    </main>
</div>
</body>
