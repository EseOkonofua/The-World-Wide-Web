<?php
    define("PASSWORD","comingon201520");
    //MODELS
    class User{
        public $firstname;
        public $lastname;
        public $address;
        public $username;
        public $password;
    
        function User($fname, $lname, $home, $user,$pwd){
            $this->firstname = $fname;
            $this->lastname = $lname;
            $this->address = $home;
            $this->username = $user;
            $this->passwrod = $pwd;
        }
    }
    
    function checkUsername($username){
        $user = array();
        try{
        $con = new PDO("mysql:host=localhost;dbname=shopanytime","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select userid from user_account where userid = '".$username."'");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            array_push($user, $row['userid']);
        }
         $con=NULL;
    
         return $user;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        }       
    }
    
    function checkLogin($username,$password){
         $user = array();
        try{
        $con = new PDO("mysql:host=localhost;dbname=shopanytime","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select userid from user_account where userid = '".$username."' and password = '".$password."'");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            array_push($user, $row['userid']);
        }
         $con=NULL;
    
         return $user;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        }     
    }
    
     function getUser($username){
        $user; 
        try{
        $con = new PDO("mysql:host=localhost;dbname=shopanytime","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select * from user_account where userid = '".$username."'");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            $user = new User($row['firstname'],$row['lastname'],$row['address'],$row['userid'],$row['password']);
        }
        $con=NULL;
    
         return $user;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        }     
    }
    
    //create account
    function createAccount($firstname,$lastname,$address,$username,$password){
         try{
            $con = new PDO("mysql:host=localhost;dbname=shopanytime","root",PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $con->prepare("Insert into user_account(userid, firstname, lastname, password,address) values(:uname,:fname,:lname,:pwd,:add)");
            $sth->bindParam(':fname',$firstname);
            $sth->bindParam(':lname',$lastname);
            $sth->bindParam(':add',$address);
            $sth->bindParam(':uname',$username);
            $sth->bindParam(':pwd',$password);
            $sth->execute();
            $con=NULL;     
            }catch(PDOException $e){
                echo "Connection failed! ".$e->getMessage();
            }      
    }
    
?>

