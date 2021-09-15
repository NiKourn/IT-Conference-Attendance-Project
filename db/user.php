<?php
    class userlog{
        //private database object
      
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;

        }
        
        public function insertUser($username, $password){
            try {
                //checks if getUserbyUsername and if it's more than 1 then it returns
                $result = $this->getUserbyUsername($username);
                if ($result['num'] > 0){
                    return false;
                }else{
                       //encrypted password with md5 & password and username combining together while not using SALT 
                        $new_password = md5($password.$username);
                        //define sql statement to be executed
                        $sql = "INSERT INTO users (username,password)VALUES(:username,:password)";
                        //prepare the sql statement for execution
                        $stmt = $this->db->prepare($sql);
                        //bind all placeholders to the actual values, this is what is save in db
                        $stmt->bindparam(':username',$username);
                        $stmt->bindparam(':password',$new_password);
                        
                        //execute statement
                        $stmt->execute();
                        return true;
                }
            
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                    }
                
            
        }
    
        public function getUser($username, $password){
            try{
                $sql = "SELECT * FROM users where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
            return $result;
            }
            catch (PDOException $e){
                echo $e->getMessage();
            return false;
            }
        }
    
        public function getUserbyUsername($username){
            try{
                $sql = "SELECT count(*) as num FROM users where username = :username ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->execute();
                $result = $stmt->fetch();
            return $result;
            }
            catch (PDOException $e){
                echo $e->getMessage();
            return false;
            }
        }
    }
?>