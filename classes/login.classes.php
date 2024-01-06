<?php
include_once("dbh.classes.php");
class Login extends Dbh {

       protected function getUser($uid, $pwd){
           $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');
           
           if(!$stmt->execute(array($uid, $uid))){
               $stmt = null;
               $error="Something went terribly wrong!";
               header("location: ../login.php?error=$error");
               exit();
           }
           if($stmt->rowCount() == 0)
           {
            $stmt = null;
            $error="User not found!";
            header("location: ../login.php?error=$error");
            exit();
           }

           $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $checkPwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);
           
           if($checkPwd == false)
           {
            $stmt = null;
            $error = "Wrong password!";
            header("location: ../login.php?error=$error");
            exit();
           }
           elseif($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE (UPPER(users_email) = UPPER(?) OR UPPER(users_uid) = UPPER(?)) AND users_pwd = ?;');
            
            if(!$stmt->execute(array($uid, $uid, $pwdHashed[0]['users_pwd']))){
                $stmt = null;
                $error="Something went terribly wrong on our end!";
                header("location: ../login.php?error=$error");
                exit();

            
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
           session_start();
           $_SESSION["userid"] = $user[0]["users_id"];
           $_SESSION["useruid"] = $user[0]["users_uid"];
           $stmt = null;
        }
           $stmt = null;
       }
}