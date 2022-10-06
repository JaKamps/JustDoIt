<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="Signup.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="Home"><a href="index.html">Home</a></div>
            <div class="Lijst"><a href="Lijsten.html" class="navdrop">Lijsten</a></div>
            <div class="Account"><a href="Accounts.html">Account</a></div>
            
        </div>
    </header>

<div class="container2">
    <form action="signup.php" method="post">
        <label><b>Gebruikersnaam</b></label>
        <input type="text" id="name" name="name">

        <label><b>Email</b></label>
        <input type="email" id="email" name="email">

        <label><b>Volledige naam</b></label>
        <input type="text" id="naam" name="vNaam">

        <label><b>Wachtwoord</b></label>
        <input type="password" name="psw">

        <label><b>Herhaal wachtwoord</b></label>
        <input type="password" name="pswr">

        <button type="submit" name="submit">Registreer</button>
        <button type="button" class="inlogbtn" onclick="window.location.href='Accounts.html';" >Heb je al een account?</button>
    </form>
</div>

</body>
</html>