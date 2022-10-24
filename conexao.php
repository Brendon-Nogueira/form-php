<?php 

//PDO

$host = "localhost";
$user = "root";
$passwdd = "";
$dbname = "brendon";
$port = 3306;

try{

} catch(PDOException $err){
    echo "Error : failed to connect to the database, please try again" 
    .$err -> getMessage();
}