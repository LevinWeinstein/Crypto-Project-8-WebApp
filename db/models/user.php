<?php

$myPDO = new PDO("pgsql:host=localhost;dbname=crypto_class");

// We can randomly generate salts for a user some other time
// In the mean time, just leave the possibility open.
$salt = "SillyRabbit";

class User {
    public static function print_all(){
        global $myPDO;
        $result = $myPDO->query("SELECT * FROM users");
   
        while($row = $result->fetch(\PDO::FETCH_ASSOC)){
            print_r($row);
        }
    }

    public static function exists($username){
        global $myPDO;

        $sql = 'SELECT * FROM users WHERE username = ? ';
        $stmt = $myPDO->prepare($sql);

        $stmt->execute([$username]);
    
        $found = false;

        if($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $found = true;
        }

        return $found;
    }

    public static function get($username){
        if ($username == null || !User::exists($username)){
            return null;
        }

        global $myPDO;

        $sql = 'SELECT * FROM users WHERE username = ? ';
        $stmt = $myPDO->prepare($sql);
        $stmt->execute([$username]);

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function add($username, $password){

        if ($username == null || User::exists($username)){
            return false;
        }

        global $myPDO;
        global $salt;

        $pwd_hash = md5($password . $salt);

        $sql = "INSERT INTO users (username, pwd_hash, salt) VALUES (?, ?, ?);";

        $stmt = $myPDO->prepare($sql);

        $stmt->execute([$username, $pwd_hash, $salt]);
        return true;
    }

    public static function password_matches($username, $password){
        $user = User::get($username);

        if ($user == null)
            return false;
        
        return $user['pwd_hash'] == md5($password . $user['salt']);

    }

}
?>