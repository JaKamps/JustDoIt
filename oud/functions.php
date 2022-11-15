<?php
session_start();
//looks for if the user is in the database ============================================================
function emptyInputSignup($uName, $email, $vName, $password, $passwordR) {
    $result;
    if(empty($uName) || empty($email) || empty($vName) || empty($password) || empty($passwordR)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidUid($uName) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$uName)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $passwordR) {
    $result;
    if($password !== $passwordR){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
// test function -------------------------------------------------------------------------------------
function JSC($input){
    echo "<pre>";
    print_r($input);
    echo "</pre>";
}
// checks if the user exists ----------------------------------------------------------------------------------
function uidExists($conn, $uName) {
    $sql = "SELECT * FROM users WHERE username = ?;";
    // $sql = "SELECT * FROM users WHERE username = ? OR username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: SignUp.html?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $uName,);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else {
        $result = false;
        return $result;
    }

}
// create new user ====================================================================================
function createUser($conn, $uName, $vName, $email, $password) {
    $sql = "INSERT INTO users (username, Naam, `e-mail`, password ) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: SignUp.html?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $uName, $vName, $email, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: index.html");
    exit();
    
}
function createList($conn, $uName) {
    $sql = "INSERT INTO lijsten ( naamLijst ) VALUES( ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: SignUp.html?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "s", $uName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: Lijsten.html");
    exit();

}

function emptyInputLogin($uName, $password){
    $result;
    if(empty($uName) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//login ----------------------------------------------------------------------------------------
function loginUser($conn, $uName, $password) {
    $userexist;
    $userexist = uidExists($conn, $uName);

    if ($userexist === false) {
        header("location: /Accounts.html?error=wronglogin");
        exit();
    }

    $hashedpassword = $userexist["password"];
    $checkpassword = password_verify($password, $hashedpassword);

    if($checkpassword === false) {
        header("location: /Accounts.html?error=wronglogin");
        exit();
    }
    else if($checkpassword === true) {
        
        $_SESSION["idUsers"] = $userexist["idUsers"];
        $_SESSION["username"] = $userexist["uName"];
        header("location: index.html");
        exit();
    }
}
