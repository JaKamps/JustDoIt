<?php

if (isset($_POST["submit"])) {

    $uName = $_POST["name"];
    $password = $_POST["psw"];
 
    

    require_once 'connection.php';
    require_once 'functions.php';


    if (emptyInputLogin($uName, $password) !== false) {
        header("location: Accounts.html?error=emptyinput");
        exit();
    }

    loginUser($conn, $uName, $password);

}
else {
    header("location: Accounts.html?error=unknown");
    exit();
}