<?php
function getconnaction()
{

    $servername = "localhost";
    $db = 'katherinet';
    $username = "root";
    $password = "";
    $connString = "mysql:host=$servername;dbname=$db;";
    try {
        $conn = new PDO($connString, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . '<br>';
    }

    return $conn;
}
?>