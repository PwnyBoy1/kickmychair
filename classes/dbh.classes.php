<?php 

class Dbh { 

    protected function connect(){

        try {
            $username = "root";
            $password = "root1";
            $dbh = new PDO('mysql:host=localhost;dbname=loginsystem', $username, $password);
            return $dbh;

        }
        catch (PDOException $e){
            print "Error!" . $e->getMessage() . "<br/>";
            die();
        }
            
    }
 
}