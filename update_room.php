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
    <?php include "items_table.php";
          include "table_head.php";
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
            table_head();
            ?>
            <?php
            items_table();
            ?>
            <script type='text/javascript'>
                // Löschen bestätigen
                function delete_item( itemid ){

                    var answer = confirm('Sind Sie sicher, dass Sie dieses Ausstellungsstück löschen möchten?');
                    if (answer){
                        // wenn ok geklickt wurde
                        // gib die id an delete_kunde.php weiter und lösche Eintrag
                        window.location = 'delete_item.php?id=' + itemid;
                    }
                }
            </script>
    </main>
</div>
</body>
