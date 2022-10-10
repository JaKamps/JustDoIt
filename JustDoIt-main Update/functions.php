<?php

function emptyInputSignup($uName, $email, $vName, $password, $passwordR) {
    $result;
    if(empty($uName)) || empty($email) || empty($vName) || empty($password) || empty($passwordR) {
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

function uidExists($conn, $uName, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: SignUp.php?error=stmtfailed")
        exit(): 
    }

    mysqli_stmt_bind_param($stmt, "ss", $uName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else {
        $result = false;
        return $result;
    }

}

function createUser($conn, $uName, $vName, $email, $password) {
    $sql = "INSERT INTO users (username, Naam, e-mail, password ) VALUES();";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: SignUp.php?error=stmtfailed")
        exit(): 
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $uName, $vName, $email, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: index.php?error=none")
    exit();
    
}