<?php ob_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php if (isset($_SERVER['REQUEST_URI'])) {
            $title = explode('/', trim($_SERVER['REQUEST_URI'], '/'))[0];
            $title = $title == "" ? "Home" : $title;
            echo ucfirst($title);
            } ?>
    </title>
    <link data-default-icon="https://static.xx.fbcdn.net/rsrc.php/yD/r/d4ZIVX-5C-b.ico" data-badged-icon="https://static.xx.fbcdn.net/rsrc.php/ye/r/Ta8_J_nYekI.ico" rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yD/r/d4ZIVX-5C-b.ico">
    <link rel="stylesheet" href="/public/css/app.css"  />
    <link rel="stylesheet" href="<?php echo "/public/css/$title.css";?>"  />
    <script
      src="https://kit.fontawesome.com/0a37ab2a11.js"
      crossorigin="anonymous"
    ></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />
  <script
    src="https://kit.fontawesome.com/kitcode.js"
    crossorigin="anonymous"
  ></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <?php require_once __DIR__ . '/../configs/scripts.php'; ?>
  </head>
  <body>
    <div class="top">
      <div class="container top-bar">
        <div class="item-top">
          <a href="/" title="Chi nhánh">
            <i class="fa-solid fa-location-dot"></i>
            <span>Có hơn 200 chi nhánh toàn quốc</span>
          </a>
        </div>
        <div class="item-top">
          <a href="/" title="Liên hệ">
            <i class="fa-sharp fa-solid fa-phone-volume"></i>
            <span>Liên hệ: 123456789</span>
          </a>
        </div>
        <div class="item-top">
          <a href="/" title="Miễn phí vận chuyển">
            <i class="fa-solid fa-helicopter"></i>
            <span>Free ship đơn trên 50.000đ</span>
          </a>
        </div>
      </div>
    </div>
    <header>
      <div class="container-header">
        <div class="header-nav">
          <div id="logo">
            <h2 title="LFF">Live For Food</h2>
          </div>
          <nav>
            <ul>
              <li><a href="/" title="Trang chủ">Trang chủ</a></li>
              <li><a href="/About" title="Giới thiệu">Trò chơi</a></li>
              <li><a href="/Menu/page/" title="Thực đơn">Thực đơn</a></li>
              <?php if(isset($_SESSION['user'])){ ?>
              <li class="cart"><a href="/Cart" title="Giỏ hàng">Giỏ hàng</a>
                <span class="count-cart"> <?php echo count($_SESSION['cart']); ?></span>
              </li>
              <li><a href="/Order" title="Đơn hàng">Đơn hàng</a></li>
              <?php } ?>
              <li><a href="/Branch"  title="Chi nhánh">Chi nhánh</a></li>
              <li><a href="/Blog"  title="Tin tức">Tin tức</a></li>
            </ul>
          </nav>
        </div>
        <div class="auth">
          <?php if(isset($_SESSION['user'])){?>
            <div class="auth-item profile">
              <a href="/views/profile.php"><?php echo $_SESSION["user"]["name"];?></a>
            </div>
            <div class="auth-item" >
              <a href="#" title="Click để đăng xuất" id ="logout" onclick="logout()">Đăng xuất</a>
            </div>
          <?php }else{?>
            <div class="auth-item">
              <a href="/Login" title="Click để đăng nhập thành viên">Đăng nhập</a>
            </div>
            <div class="auth-item">
              <a href="/Register" title="Click để đăng ký">Đăng ký</a>
            </div>
          <?php }?>
        </div>
      </div>
    </header>
  


