<?php

/*
Moockup Controller for getin POST and GET and take action depending on them
Should be implemented in a better way for production purposes
*/

include_once('../config/config.php');

// If the user is signing in, check headers and check if user is already loged in,
// If loged in, return to index, if not call login method from Login class
if( isset($_POST['user']) and 
    isset($_POST['pass']) and 
    !Login::isLoged() ) {
        if($_POST['user'] != ''  and $_POST['pass'] != '')
            Login::doLogIn($_POST['user'], $_POST['pass']);
        else
            header('Location: '.'../index.php');
}

// If we want to Log Out user from app, call method in Login class
if(isset($_GET['doLogOut'])){
    Login::doLogOut();
}

// Load all users and return json data for datatables
if (isset($_GET['getAllUsers'])) {
    // get all users
    $users = USER::getAllUsers(); 
    $returnData['data'] = array();
    // Prepare data for datatables
    foreach($users as $usr){ 
        $returnData['data'][] = $usr;
    }
    // return json data
    echo json_encode($returnData); 
}

// Insert new user in the database, sanitizing strings, no validation, sql injection prevention in DB class
if(isset($_POST['newUser'])){
    $usr = new USER(
        filter_var($_POST["firstname"], FILTER_SANITIZE_STRING),
        filter_var($_POST["lastname"], FILTER_SANITIZE_STRING)
    );
    echo $usr->save();
}
