<?php
// function JSC($input){
//     echo "<pre>";
//     print_r($input);
//     echo "</pre>";
// }
// JSC($_POST);
if (isset($_POST["submit"])) {

    $uName = $_POST["lijstnaam"];


    require_once 'connection.php';
    require_once 'functions.php';



    createList($conn, $uName);
    exit();
}
else {
    // header("location: SignUp.html?error=unknown");
    exit();
}