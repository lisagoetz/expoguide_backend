<?php
include "connect.inc.php";
include "rooms_table.php";
?>
<nav>
    <?php
        rooms_table($res_rooms);
    ?>
    <script type='text/javascript'>
        // Löschen bestätigen
        function delete_room( roomid ){

            var answer = confirm('Sind Sie sicher, dass Sie diesen Raum löschen möchten?');
            if (answer){
                // wenn ok geklickt wurde
                // gib die id an delete_kunde.php weiter und lösche Eintrag
                window.location = 'delete_room.php?id=' + roomid;
            }
        }
    </script>
</nav>
