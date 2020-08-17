<?php
function room_head(){
    $roomID = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
    include "connect.inc.php";

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
            echo "</tr>";
            echo "</table>";
        }
    }
}
$pdo = null;
?>
