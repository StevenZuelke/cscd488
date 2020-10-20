<?php
    require "Db.php";
    class User{

        private $uid = null;
        private $uname = null;

        public function getUid(){ return $uid; }
        public function getUname(){ return $uname; }
        public function setUid($uidIn){ $uid = $uidIn; }
        public function setUname($unameIn){ $uname = $unameIn; }
        
        public function validateUser($unameIn, $upassIn){
            $db = Db::getInstance();
            $stmt = $db->getConn()->prepare('SELECT * FROM users WHERE uname=:key');
            $stmt->bindValue(':key', $unameIn, SQLITE3_TEXT);
            $result = $stmt->execute();
            echo "validating user";
            if ($row = $result->fetchArray()) {
              if($row[2] == password_hash($upassIn, PASSWORD_BCRYPT)){
                echo "user validated";
                $uid = $row[0];
                $uname = $row[1];
                return true;
              }
            } 
            echo "user not validated";
            return false;
            
        }

        public function createUser($unameIn, $upassIn){
            $db = Db::getInstance();
            if ( User::getUser($unameIn) != null ) {
                return false;
            }
            echo "inserting and executing statement";
            $stmt = $db->getConn()->prepare('INSERT INTO users (uname, upassword) VALUES (:uname, :upass)');
            $stmt->bindValue(':uname', $unameIn, SQLITE3_TEXT);
            $stmt->bindValue(':upass', password_hash($upassIn, PASSWORD_BCRYPT),   SQLITE3_TEXT);
            $stmt->execute();
            return $this->validateUser($unameIn, $upassIn);
        }

        private static function getUser($unameIn){
            $db = Db::getInstance();
            $stmt = $db->getConn()->prepare('SELECT * FROM users WHERE uname=:key');
            $stmt->bindValue(':key', $unameIn, SQLITE3_TEXT);
            $result = $stmt->execute();
            if ($row = $result->fetchArray()){
                $user = new User;
                $user->setUid($row[0]);
                $user->setUname($row[1]);
                return $user;
            }else{
                return null;
            }
        }

    }

?>