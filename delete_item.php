<?php
// Verbindung zur Datenbank
include 'connect.inc.php';

// ID holen
$itemid=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

// Löschen
$query = "DELETE FROM items WHERE itemID = ?";
$statement = $pdo->prepare($query);
$statement->bindParam(1, $itemid);

if($statement->execute()){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    die('Löschen nicht möglich.');
}
?>
