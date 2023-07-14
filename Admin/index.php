<?php
session_start();
require_once __DIR__ . "/../configs/config.php";
require_once __DIR__ . '/../app/models/connectDB.php';
require_once __DIR__ . "/Views/header.php";
require_once __DIR__ . "/Controllers/adminController.php";

if (!isset($_SESSION["admin"])){
    require_once __DIR__ . "/Views/login.php";
}
$admin = new adminController();
$admin->management();

require_once __DIR__ . "/Views/footer.php";
?>