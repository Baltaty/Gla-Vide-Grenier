<?php

$configs_env = file_get_contents('../config.json');
$configs_env = json_decode($configs_env,true);

$hostname=$configs_env['hostname'] ;
$dbname=$configs_env['dbname'] ;
$user = $configs_env['user'] ;
$password = $configs_env['password'] ;


try {
    $conn = new PDO("mysql:host=".$hostname.";dbname=".$dbname, $username, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
    // set the PDO error mode to exception
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    //die("<h2>Impossible de se connecter a la bd</h2>");
    }
?>