<?php
// Verbindung zur Datenbank
include 'connect.inc.php';

// ID holen
$roomid=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

// Löschen
$query = "DELETE FROM rooms WHERE roomID = ?";
$statement = $pdo->prepare($query);
$statement->bindParam(1, $roomid);

if($statement->execute()){
    header('Location: index.php');
}else{
    die('Löschen nicht möglich. Bitte löschen Sie zuerst alle Ausstellungsstücke in diesem Raum.');
}
?>
