 <?php
include_once("dbh.classes.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); error_reporting(E_ALL);
 class Signup extends Dbh {

        protected function setUser($name, $uid, $pwd, $email, $localCounter){
            $stmt = $this->connect()->prepare('INSERT INTO users (users_name, users_uid, users_pwd, users_email, users_score) VALUES (?,?,?,?,?);');
            
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            

            if(!$stmt->execute(array($name, $uid,$hashedPwd,$email,$localCounter))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            $stmt = null;
        }
        protected function checkUser ($uid, $email){
            $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

            if(!$stmt->execute(array($uid, $email))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            $resultCheck=false;
            if($stmt->rowCount() > 0){
                $resultCheck = false;
            }
            else{
                $resultCheck = true;
            }
            
            return $resultCheck;

        
        }
        
 }