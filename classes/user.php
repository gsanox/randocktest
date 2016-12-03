<?php

/*
    User class, to create and retrieve inserted users in the Database
*/

class User
{
    private $firstname;
    private $lastname;
    private $hash;

    /*
        New user constructor
        @param $name user firstname
        @param $surname user lastname
    */
    public function __construct($firstname, $lastname){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->hash = $this->getHash();
    }

    /*
        Get hash from external API, using PHP Curl
        @return String hash for user
    */
    private function getHash(){

        $host = 'https://api.randock.com/name/hash.json';

        $data = array("firstname" => $this->firstname, "lastname" => $this->lastname, "_format" => "json");
        $data_json = json_encode($data);  

        // Setting curl options
        $ch = curl_init($host); 
        curl_setopt($ch, CURLOPT_POST, 1);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        //curl_setopt($ch, CURLOPT_VERBOSE, true); // Debuggin purposes only
        curl_setopt($ch, CURLOPT_USERPWD, "api:p.i.sgWJUqz6Y4[nB99bUGWgzceDeDUyZyLiLck9j>X?PBZcsD");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_json)
            )                                                                       
        ); 

        $result = curl_exec($ch);

        // If error ocurred return false
        if($result === false) {
            echo 'Curl error: ' . curl_error($ch);
            return false;
        }

        curl_close($ch);

        $obj = json_decode($result);

        return $obj->hash;
    }

    /*
        Get al users from Database
        @return recordset of users
    */
    public static function getAllUsers(){
        $db = DB::getInstance();
        $statement = "SELECT id, firstname, lastname, api_hash AS hash FROM users;";
        if ($result = $db->query($statement, true)) {
            return $result;
        }
    }

    /*
        Save current user in the Database
        @return string if its succsesful inserted or not
    */
    public function save(){
        // check errors before saving
        if ($this->firstname == '' or 
            $this->lastname == '' or 
            $this->hash == false){
                return "false";
            }

        // Save user in database
        $db = DB::getInstance();
        $statement = "INSERT INTO `users` (`firstname`, `lastname`, `api_hash`) VALUES ( '$this->firstname','$this->lastname','$this->hash' );";
        if ($result = $db->query($statement, false)) {
            echo "true";
        }
        else {
            echo "false";
        }
    }



}
