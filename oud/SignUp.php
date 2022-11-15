<?php
// function JSC($input){
//     echo "<pre>";
//     print_r($input);
//     echo "</pre>";
// }
// JSC($_POST);
if (isset($_POST["submit"])) {

    $uName = $_POST["name"];
    $email = $_POST["email"];
    $vName = $_POST["vNaam"];
    $password = $_POST["psw"];
    $passwordR = $_POST["pswr"];

    require_once 'connection.php';
    require_once 'functions.php';
    
    if(emptyInputSignup($uName, $email, $vName, $password, $passwordR) !== false){
        header("location: SignUp.php?error=emptyinput");
        exit();
    }
    if (invalidUid($uName) !== false) {
        header("location: SignUp.php?error=invalidUsername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: SignUp.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($password, $passwordR) !== false) {
        header("location: SignUp.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $uName) !== false){
        header("location: SignUp.php?error=username");
        exit();
    }


    createUser($conn, $uName, $vName, $email, $password);
    header("location: acounts.html");
    exit();
}
else {
    // header("location: SignUp.html?error=unknown");
    exit();
}