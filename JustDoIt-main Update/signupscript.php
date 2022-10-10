<?php

if(isset($_post["submit"])){

    $uName = $_POST["name"];
    $email = $_post["email"];
    $vName = $_post["vName"];
    $password = $_post["psw"];
    $passwordR

    require_once 'connection.php';
    require_once 'functions.php';


    if(emptyInputSignup($uName, $email, $vName, $password, $passwordR) !== false){
        header("location: SignUp.php?error=emptyinput");
        exit(): 
    }
    if (invalidUid($uName) !== false) {
        header("location: SignUp.php?error=invalidUsername");
        exit(): 
    }
    if (invalidEmail($email) !== false) {
        header("location: SignUp.php?error=invalidEmail");
        exit(): 
    }
    if (pwdMatch($password, $passwordR) !== false) {
        header("location: SignUp.php?error=passwordsdontmatch");
        exit(): 
    }
    if (uidExists($conn, $uName, $email) !== false){
        header("location: SignUp.php?error=usernameoremailalreadyinuse")
        exit(): 
    }


    createUser($conn, $uName, $vName, $email, $password);
}
else {
    header("location: SignUp.php")
    exit();
}