<?php
class dbconn{
    
        public function createDB($servername,$username,$password){
            
          try {
              
                $conn = new PDO("mysql:host=$servername;", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "CREATE DATABASE attendance";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "Database created successfully<br>";
                
              } 
              catch(PDOException $e) {
                 $e->getMessage();
              }
              
              $conn = null;


        }
        
        public function createTables($servername,$dbname,$username,$password){
              
          try {

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql1 = "CREATE TABLE attendee (
                attendee_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) NOT NULL,
                lastname VARCHAR(50) NOT NULL,
                dateofbirth DATE,
                contactnumber VARCHAR(15),
                emailaddress VARCHAR(50),
                specialty_id INT(11),
                avatar_path VARCHAR(200),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            
                $sql2 = "CREATE TABLE specialties (
                specialty_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            
                $sql3 = "CREATE TABLE users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50),
                password VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )"; 
                
                $sql4 = "INSERT INTO `specialties`(`name`) VALUES ('Database Admin'), ('Software Devs'), ('Server Admins'), ('Other')";
            
                  $sqlqs = [$sql1, $sql2, $sql3, $sql4];

                  // use foreach to browse through arrays and only PDOexec() because no results are returned
                  foreach($sqlqs as $sql){
                  $conn->exec($sql);

                   echo "Tables created successfully <br>";
                   Header("Refresh:3;url=homepage.php");
                              
                              }
                          }
                              catch(PDOException $e) {
                              echo "<br>" . $e->getMessage();
                              //Header("Refresh:1;url=homepage.php");
                              }

                              $conn = null;


        }
        
        public function storeJsonInfo(){
          $json_file = 'data.json';
                  $json_raw = file_get_contents($json_file);
                  $json = json_decode($json_raw);
                  $json = array(
                    'host' =>$_POST['host'],
                    'db' => 'attendance',
                    'username' => $_POST['username'],
                    'password' => $_POST['password']

                  );
                    $json_out = json_encode($json);
                    file_put_contents($json_file, $json_out);

        }
        

      

    }


?>
    