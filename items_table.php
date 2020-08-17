<?php
    function items_table(){
        $roomID = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        include "connect.inc.php";

        $query = "SELECT itemID, itemname, roomname
                    FROM items, rooms
                    WHERE items.roomID = rooms.roomID
                    AND items.roomID = ?";

        $statement = $pdo->prepare($query);
        $statement->bindParam(1, $roomID);
        $statement->execute();

        $num = $statement->rowCount();


        if($num>=0) {

            //Kunden
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                // Neues Feld pro Eintrag
                echo "<table>";
                echo "<tr>";
                echo "<td>{$itemname}</td>";
                echo "<td>";

                // Bearbeiten
                    echo "<a href='update_item.php?id={$itemID}' class='btn'><i class='fa fa-pencil'></i></a>";

                // Löschen
                echo "<a href='#' onclick='delete_item({$itemID});' class='btn'><i class='fa fa-trash'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
?>
