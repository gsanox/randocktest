<?php

/*
Singleton class, to allow users to sign in 
In this case I used cookies, but security should be improved for production purposes
*/

class Login {

    /*
        Log in the user in the app using cookies, in this case we convert data to base64, 
        should be implemented in a safer and consistent method for production purposes
        like php sessions or tokens, rather than cookies, if all went well it redirects to index
        @param $usr User to login
        @param $pwd User password
    */
    public static function doLogIn($usr, $pwd){
        if( self::checkUsrPwd($usr, $pwd) ){
            $cookieData = base64_encode("usr=" . $usr . "&pwd=" . $pwd);
            setcookie("randockCookie", $cookieData ,time()+3000, '/');
        }
        header('Location: '.'../index.php');
    }

    /* 
        Log out the user unsetting the cookie and redirecting to index
    */
    public static function doLogOut(){
        setcookie("randockCookie", 'localhost' ,time()-1000, '/');
        header('Location: '.'../index.php');
        die();
    }

    /*
        Check if username and password are correct
        @return bool check if username or password are correct
    */
    private static function checkUsrPwd($usr, $pwd){
        return ($usr == _APPUSR_ and $pwd == _APPPWD_);
    }

    /*
        Check if user is loged in the app, checking username and password too
        @return bool if user is loged in
    */
    public static function isLoged(){
        if(isset($_COOKIE["randockCookie"])){
            $cookieData = explode( '&', base64_decode($_COOKIE["randockCookie"]) );
            $usr = str_replace('usr=','',$cookieData[0]);
            $pwd = str_replace('pwd=','',$cookieData[1]);
            return self::checkUsrPwd($usr, $pwd);
        }
        return false;
    }



}