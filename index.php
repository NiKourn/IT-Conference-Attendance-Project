<?php
$title = 'Install App Database';

require_once 'header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$host = $_POST['host'];
$db = 'attendance';
$username = $_POST['username'];
$password = $_POST['password'];
$charset= 'utf8mb4';
require_once 'db/installdbconn.php';

$dbconn = new dbconn();
$dbconn->createDB($host,$username,$password);
$dbconn->createTables($host,$db,$username,$password);
$dbconn->storeJsonInfo();
}

$str = file_get_contents('data.json');
$json = json_decode($str, true); // decode the JSON into an associative array

if (!empty($json)){
  $servername = $json['host'];
  $dbnamegiven ="attendance";
  $username = $json['username'];
  $password = $json['password'];
  //make connection and access db to check if there's already a database created with given name from $dbname
    // $db = new mysqli($json['host'],$json['username'],$json['password']);
  try {$db = new PDO("mysql:host=$servername;", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $dbname = $dbnamegiven;
   $query="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME=?";
   $stmt = $db->prepare($query);
   $stmt->bindparam(1, $dbname);
   $stmt->execute(); 
  //$stmt->bind_result($data);
  
   if ($stmt->fetch()){
    echo '<br><h2>Database Created</h2>';
      Header("Refresh:1;url=homepage.php"); 
   }
 else {
    include 'includes/database-form.php';
   }

}//end try
   catch(PDOException $e){
    include 'includes/database-form.php';
    $e->getMessage();
   }
   
}//end if $json not empty
else {
  include 'includes/database-form.php';
}  
 $stmt= null;
?>