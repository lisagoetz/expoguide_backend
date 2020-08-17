<?php
    // Diese Funktion erstellt die Tabelle Räume
    function rooms_table($res_rooms)
    {
        include "connect.inc.php";

        // Tabelle
        $query = "SELECT roomID, roomname FROM rooms ORDER BY roomID";
        $statement = $pdo->prepare($query);

        $statement->execute();

        $num = $statement->rowCount();

        echo "<table>";
        echo "<tr>";
        echo "<th><h1>Übersicht Räume</h1></th>";
        echo "<th><a href='create_room.php' class='btn'><i class='fa fa-plus'></i></a></th>";

        if ($num > 0) {

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                extract($row);
                echo "<tr>";
                echo "<td><h2>{$roomname}</h2></td>";
                echo "<td><a href='update_room.php?id={$roomID}' class='btn'><i class='fa fa-pencil'></i></a>
                      <a href='#' onclick='delete_room({$roomID});' class='btn'><i class='fa fa-trash'></i></a></td>";
            }
        }
        echo "</tr>";
        echo "</table>";
    }
?>
