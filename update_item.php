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

//Verbindung zur Datenbank
include "connect.inc.php";
?>
<header>
    <h2><a href="logout.php" class="btn logout-btn">Abmelden</a></h2>
</header>
<div class="wrapper">
    <main>
        <?php
        // ID holen
        $itemID=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //Verbindung zur Datenbank
        include 'connect.inc.php';

        // Aktuelle Daten auslesen
        $query = "SELECT itemid, itemname, artist, date, description, image FROM items WHERE itemID = ? LIMIT 0,1";
        $statement = $pdo->prepare( $query );

        $statement->bindParam(1, $itemID);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $itemname = $row['itemname'];
        $artist = $row['artist'];
        $date = $row['date'];
        $description = $row['description'];
        $image = $row['image'];
        ?>
        <?php
        // Überprüfen, ob das Formular gespeichert wurde
        if(isset($_POST['submit'])){

            //Update mit Bild
            if(!empty($_POST['image'])){

                $query = "UPDATE items
                        SET itemname=:itemname, artist=:artist, date=:date, description=:description, image=:image
                        WHERE itemid = :id";

                $statement = $pdo->prepare($query);

                $itemname=htmlspecialchars(strip_tags($_POST['itemname']));
                $artist=htmlspecialchars(strip_tags($_POST['artist']));
                $date=htmlspecialchars(strip_tags($_POST['date']));
                $description=htmlspecialchars(strip_tags($_POST['description']));
                $image=htmlspecialchars(strip_tags($_POST['image']));

                $statement->bindParam(':itemname', $itemname);
                $statement->bindParam(':artist', $artist);
                $statement->bindParam(':date', $date);
                $statement->bindParam(':description', $description);
                $statement->bindParam(':image', $image);
                $statement->bindParam(':id', $itemID);

                if($statement->execute()){
                    echo "<div class='alert alert-success'>Eintrag aktualisiert.</div>";
                } else{
                    echo "<div class='alert alert-danger'>Eintrag konnte nicht aktualisiert werden. Bitte versuchen Sie es nochmal.</div>";
                }

                //Update ohne Bild
            }elseif (empty($_POST['image'])){

                $query = "UPDATE items
                        SET itemname=:itemname, artist=:artist, date=:date, description=:description
                        WHERE itemid = :id";

                $statement = $pdo->prepare($query);

                $itemname=htmlspecialchars(strip_tags($_POST['itemname']));
                $artist=htmlspecialchars(strip_tags($_POST['artist']));
                $date=htmlspecialchars(strip_tags($_POST['date']));
                $description=htmlspecialchars(strip_tags($_POST['description']));

                $statement->bindParam(':itemname', $itemname);
                $statement->bindParam(':artist', $artist);
                $statement->bindParam(':date', $date);
                $statement->bindParam(':description', $description);
                $statement->bindParam(':id', $itemID);

                if($statement->execute()){
                    echo "<div class='alert alert-success'>Eintrag aktualisiert.</div>";
                } else{
                    echo "<div class='alert alert-danger'>Eintrag konnte nicht aktualisiert werden. Bitte versuchen Sie es nochmal.</div>";
                }
            }
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$itemID}");?>" method="post">
            <fieldset>
                <ul>
                    <li>
                        <label for="itemname"><h2>Titel</h2></label>
                        <input type="text" name="itemname" value="<?php echo htmlspecialchars($itemname, ENT_QUOTES);  ?>" required>
                    </li>
                    <li>
                        <label for="artist"><h2>Künstler</h2></label>
                        <input type="text" name="artist" value="<?php echo htmlspecialchars($artist, ENT_QUOTES);  ?>" required>
                    </li>
                    <li>
                        <label for="Erscheinungsjahr"><h2>Erscheinungsjahr</h2></label>
                        <input type="text" name="date" value="<?php echo htmlspecialchars($date, ENT_QUOTES);  ?>" required>
                    </li>
                    <li>
                        <label for="beschreibung"><h2>Beschreibung</h2></label>
                        <textarea type="text" name="description" id="description" required><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea>
                    </li>
                    <li>
                        <label for="image"><h2>Bild</h2></label>
                        <?php
                        if (!empty($image)) {
                            echo "<img src='uploads/$image' width='100' height='auto'>";
                            echo "<br><br><input type='file' name='image'>";
                        } else {
                            echo "<input type='file' name='image' accept='*.jpg, *.jpeg, *.png, *.gif' required>";
                        }

                        ?>
                        <!--<input type='file' name='image'/>-->
                    </li>
                    <input type="submit" name="submit" value="Speichern" class="btn submit-btn">
                </ul>
            </fieldset>
        </form>
    </main>
</div>
</body>
