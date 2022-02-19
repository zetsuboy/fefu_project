<?php
include "dbconnect.php";
$id = $_POST['id'];

$sql = "DELETE FROM `events` WHERE event_id = :id";
$result = $conn->prepare($sql);
$result->execute(array(':id' => $id));
echo("1");
?>