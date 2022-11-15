<?php
    require_once 'connection.php';
    require_once 'functions.php';

    if (!empty($_SESSION["idUsers"])) {
        header("location: Lijsten.html");
    }
    else {
        header("location: Accounts.html?error=loginplease");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lijsten</title>
    <link rel="stylesheet" href="styleLijsten.css">
</head>
<body>
<header>
    <div class="navbar">
        <div class="Home"><a href="index.html">Home</a></div>
        <div class="Lijst"><a href="Lijsten.html" class="navdrop">Lijsten</a></div>
        <div class="Account"><a href="Accounts.html">Account</a></div>
        
    </div>
</header>

<div class="AddLijst">
    <a class="AddButton" href="aanmaak.html">Lijst aanmaken</a>
</div>

<div class="grid-container">
    
        <div class="rectangle1 list" onclick="window.location.href='main.html';"></div>
        <div class="rectangle2 list" onclick="window.location.href='main.html';"></div>
        <div class="rectangle3 list" onclick="window.location.href='main.html';"></div>
    

   
        <div class="rectangle4 list" onclick="window.location.href='main.html';"></div>
        <div class="rectangle5 list" onclick="window.location.href='main.html';"></div>
        <div class="rectangle6 list" onclick="window.location.href='main.html';"></div>
    

    
    <div class="rectangle7 list" onclick="window.location.href='main.html';"></div>
    <div class="rectangle8 list" onclick="window.location.href='main.html';"></div>
    <div class="rectangle9 list" onclick="window.location.href='main.html';"></div>
    
</div>
</body>
</html>