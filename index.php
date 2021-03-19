<?php
require_once 'inc/headers.php';
require_once 'inc/functions.php';

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    return 0;
}

try{
$db = openDb();
$sql = "select * from item";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
echo json_encode($results);
} 
catch (PDOExeption $pdoex) {
    returnError($pdoex);
}