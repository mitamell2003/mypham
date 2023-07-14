
<!DOCTYPE html>
<html lang="en">
<head>
<title>Đăng nhập quản trị viên</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Clean Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<link href="<?= isset($_SESSION["admin"]) ? "/public/css/dashboard.css": "/public/css/Admin.css"; ?>" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/public/css/addProduct.css">
<script src="https://kit.fontawesome.com/0a37ab2a11.js" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<?php if(isset($_SESSION["admin"])){ ?>
<section>
    <div class="container-dashboard">
        <div class="dashboard">
            <div id="container-nav-bar">
                <div id="nav-bar">
                    <div class="title">
                        <h3>Dashboard</h3>
                        <div id="hide-nav-bar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <a href="?action=order">Đơn hàng</a>
                        </li>
                        <li>
                            <a href="?action=user">Khách hàng</a>
                        </li>
                        <li>
                            <a href="?action=add">Thêm sản phẩm: </a>
                        </li>
                        <li>
                            <a href="?action=update">Sửa sản phẩm: </a>
                        </li>
                        <li>
                            <a href="?action=thongke">Thống kê</a>
                        </li>
                        <li>
                            <a href="?action=logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <div id="show-nav-bar">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div id="container-services">
                <div class="service">
                    <div class="manager">
                        <div class="info-manager">
                            <div class="user-name">
                                <h3>Họ tên: <span>Nguyễn Văn A</span></h3>
                            </div>
                            <div class="permission">
                                <h3>Chức vụ: <span>Nhân viên</span></h3>
                            </div>
                            <div class="date">
                                <h3>Ngày đăng nhập: <span>20-10-2020</span></h3>
                            </div>
                        </div>
                        <div class="title-order">
                                <h1>Trang Quản lý Live For Food</h1>
                            </div>
                    </div>
<?php } ?>
