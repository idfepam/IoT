<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lb_pdo_library';
$db_driver = "mysql";

$dsn = "$db_driver:host=$host;dbname=$database";

$options = array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $dbh = new PDO ($dsn, $username, $password, $options);
}
catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>"; die();
}
?>
