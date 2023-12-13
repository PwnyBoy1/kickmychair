<?php 

class SignupContr extends Signup{ 
    private $name;
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($name, $uid, $pwd, $pwdRepeat, $email){
        $this->name = $name;
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;

    }
    public function signupUser(){
        if($this->emptyInput() == false){
            //echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
            //echo "Invalid username!";
        if($this->invalidUid() == false){
            header("location: ../index.php?error=username");
            exit();
         }
        //echo "Invalid Email!";
        if($this->invalidEmail() == false){
            header("location: ../index.php?error=email");
            exit();
        }
        //echo "Passwords don't match!";
        if($this->pwdMatch() == false){
            header("location: ../index.php?error=passwordmatch");
            exit();    
        }
        //echo "Username or email taken!";
        if($this->uidTakenCheck() == false){
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
        $this->setUser($this->name, $this->uid, $this->pwd, $this->email);
    }
    private function emptyInput(){
        $result=false;
        if(empty($this->name) || empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
            $result = false;
    
        }
        else {
            $result = true;
        }
        return $result; 
    }
    private function invalidUid() {
        $result=false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidEmail() {
        $result=false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function pwdMatch(){
        $result=false;
        if ($this->pwd !== $this->pwdRepeat)
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(){
        $result=false;
        if (!$this->checkUser($this->uid, $this->email))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}