<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "radon"; //database name
$charset = "utf8mb4";

//create connection using PDO(PHP Data Object) object

//set dsn - data source name - database type and database name
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";

//set the default attributes 
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];

try {
    //create new pdo connection - add dsn info,username, password and options
    $pdo = new PDO($dsn, $dbUser, $dbPassword, $options);
    # echo "Connected successfully <br>"; # to check connection, check connect.php page to see output
} catch (Exception $ex) {
    die("Connection failed " . $ex->getMessage());
}