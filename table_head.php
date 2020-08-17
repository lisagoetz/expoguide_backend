<?php
function table_head(){
    $roomID = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
    include "connect.inc.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // Wenn delete_room.php ausgeführt wurde
    if($action=='deleted'){
        echo "<div class='alert alert-success'>Raum wurde gelöscht.</div>";
    }

    $query = "SELECT roomname
                    FROM rooms
                    WHERE roomID = ?";

    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $roomID);
    $statement->execute();

    $num = $statement->rowCount();

    if($num>0) {

        //Kunden
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            echo "<table>";
            echo "<tr>";
            echo "<th><h1>{$roomname}</h1></th>";
            echo "<th>";
            // Item hinzufügen
            echo "<a href='create_item.php?id={$roomID}' class='btn'><i class='fa fa-plus'></i></a>";
            echo "</th>";
            echo "</tr>";
            echo "</table>";
        }
    }
}
$pdo = null;
?>
