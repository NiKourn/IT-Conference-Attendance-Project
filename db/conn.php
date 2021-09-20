<?php 
   //Development Connection
    //$host='127.0.0.1';
    //$db='attendance';
    //$user='root';
    //$pass='';
    //$charset= 'utf8mb4';

    //Remote connection
    $host='sql4.freemysqlhosting.net';
    $db='sql4437373';
    $user='sql4437373';
    $pass='XUxjFtpQtk';
    $charset= 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        //echo "<h1 class='text-danger'>No Database Found</h1>";
        throw new PDOException($e->getMessage());

    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $userlog = new userlog($pdo);
    //calls insertUser function inside the user class which inserts admin, password credentials only once (cause we have another function that checks the username if it's the same than the one inserted)
    $userlog->insertUser('admin', 'password');
?>

