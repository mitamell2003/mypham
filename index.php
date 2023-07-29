<?php
session_start();
require_once 'bootstrap.php';
$quanlychuoicuahang = new App();
$quanlychuoicuahang->Run();
require_once __DIR__ . '/inc/footer.php';
?>