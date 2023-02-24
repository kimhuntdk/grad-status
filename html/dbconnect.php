<?php
echo "ok 123...";
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "grad_status";

$conn = new  mysqli($dbServername, $dbUsername, $dbPassword,$dbName);

if ($conn){ 
    echo "Connected successfully"; 
    }
else
    {
    echo "Connection failed " ;
    
    }

?>