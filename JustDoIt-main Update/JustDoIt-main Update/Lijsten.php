<?php
    require_once 'connection.php';
    require_once 'functions.php';

    if (empty($_SESSION["idUsers"])) {
        header("location: Accounts.html?error=loginplease");
    }

    $list = getList($conn, $_SESSION["idUsers"]);
    print_r($list);

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

        <?php foreach($list as $value){ ?>
            <div class="rectangle1 list" onclick="window.location.href='main.html';">
            <?php echo $value['naamLijst'] ?> <br>
            <a href="DeleteList.php?id=<?php echo $value['idLijsten'] ?>">verwijder</a>
        </div>
        <?php } ?>
</div>
</body>
</html>