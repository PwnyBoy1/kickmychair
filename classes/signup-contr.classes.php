<?php 

class SignupContr extends Signup{ 
    private $name;
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $localCounter;
    public function __construct($name, $uid, $pwd, $pwdRepeat, $email, $localCounter){
        $this->name = $name;
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
        $this->localCounter = $localCounter;
    }
    public function signupUser(){
        if($this->emptyInput() == false){
            $error = "Empty input!";
            header("location: ../signup.php?error=$error");
            exit();
        }
    
        if($this->invalidUid() == false){
            $error = "Invalid username! Only letters and numbers allowed. 3-15 characters long";
            header("location: ../signup.php?error=$error");
            exit();
        }
    
        if($this->invalidEmail() == false){
            $error = "Invalid Email!";
            header("location: ../signup.php?error=$error");
            exit();
        }
    
        if($this->pwdMatch() == false){
            $error = "Passwords don't match!";
            header("location: ../signup.php?error=$error");
            exit();    
        }
    
        if($this->uidTakenCheck() == false){
            $error = "Username or Email taken!";
            header("location: ../signup.php?error=$error");
            exit();
        }
    
        $this->setUser($this->name, $this->uid, $this->pwd, $this->email, $this->localCounter);
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
            if (strlen($this->uid) < 3 || strlen($this->uid) > 15) {
                $result = false;
            } else {
                $result = true;
            }
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