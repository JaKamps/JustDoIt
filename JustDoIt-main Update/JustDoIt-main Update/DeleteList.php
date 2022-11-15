<?php
// function JSC($input){
//     echo "<pre>";
//     print_r($input);
//     echo "</pre>";
// }
// JSC($_POST);
if (isset($_GET["id"])) {


    require_once 'connection.php';
    require_once 'functions.php';


    deleteList($conn, $_GET['id']);

    exit();
}
else {
    // header("location: SignUp.html?error=unknown");
    exit();
}