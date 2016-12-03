<?php

/*
Singleton database class, to create database conections and querys
*/

class Db
{
    private $_db;
    static $_instance;

    /*
    * Object constructor, creating PDO object for database conections
    */
    private function __construct() {
        $this->_db = new PDO('mysql:host='._DBHOST_.';dbname='._DB_, _DBUSR_, _DBPWD_);
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /*
        For clonning purposes 
     */
    private function __clone(){}

    /*
     Get instance method
    */
    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /*
        Query method if is select, returns data, if not returns boolean
        as of PDO allows transactions, this shoild be implemented in production,
        if selected DB allows it
        @param $sql query statement
        @param $select whereas a select or not
        @return number of rows, select result or error message
    */
    public function query($sql, $select = false) {
        // Prevent SQL injection
        $st = $this->_db->prepare($sql); 
        $rows =  $st->execute();
        
        if(!$select)
            return $rows;

        if($rows)
            return $st->fetchAll();
        else
            return 'error';
    }

}