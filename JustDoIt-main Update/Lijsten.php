<?php
require_once 'connection.php';
require_once 'functions.php';

if (!empty($_SESSION["idUsers"])) {
    header("location: Lijsten.html");
}
else {
    header("location: Accounts.html?error=loginplease");
}