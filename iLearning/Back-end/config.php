<?php

function dbconnection(){
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "iLearning";

$error = 'could not connect to database';
try
{
    if ($conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
    {
      return $conn;
    }
    else
    {
        throw new Exception('could not connect to database');
    }
}
catch(Exception $exceotion)
{
    echo $exceotion->getMessage();
}

}

function CloseCon($conn)
 {
 $conn -> close();
 }

?>
