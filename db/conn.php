<?php 
    $str = file_get_contents('data.json');
    $json = json_decode($str, true); // decode the JSON into an associative array
      $host = $json['host'];
      $db ="attendance";
      $user = $json['username'];
      $pass = $json['password'];
    
           

    $dsn = "mysql:host=$host;dbname=$db;";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "<h1 class='text-danger'>No Database Found</h1>";
        header("Refresh:3;url=index.php");
        throw new PDOException($e->getMessage());

    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $userlog = new userlog($pdo);
    //calls insertUser function inside the user class which inserts admin, password credentials only once (cause i have another function that checks the username if it's the same than the one inserted)
    $userlog->insertUser('admin', 'password');
?>

