<?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
<section class="cart-order">
  <div class="container-cart">
    <div class="title"><h2>Giỏ hàng của bạn</h2></div>
    <div class="container-cart-items">
      <?php foreach ($_SESSION["cart"] as $key => $value) {?>
      <div class="cart-item">
        <div class="img-item">
          <img src="<?php echo $value["image"]; ?>" alt="<?php echo $value["name"]; ?>" />
        </div>
        <div class="name-delete">
          <div class="name-item">
            <h3><?php echo $value["name"]; ?></h3>
          </div>
          <div class="delete-item">
            <a onclick="removeCart(this)" data-product-id="<?php echo $key; ?>" class="destroy">Xóa sản phẩm</a>
          </div>
        </div>
        <div class="price-count">
          <div class="price-item">
            <span id="price-product-<?php echo $key; ?>">Đơn giá: <?php echo number_format((int) $value["price"] * (int) $value["quantity"]); ?>đ</span>
          </div>
          <div class="count-item">
            <div class="count">
              <button data-price="<?php echo (int) $value["price"]; ?>" data-cart-id="cart-id-<?php echo $key; ?>" data-product-id="<?php echo $key; ?>" onclick="decreaseValue(this)" >
                <i class="fa-solid fa-minus"></i></button
              ><input type="text" id="cart-id-<?php echo $key; ?>" value="<?php echo $value["quantity"]; ?>" data-price="<?php echo (int) $value["price"]; ?>" onchange="price(this)" data-cart-id="<?php echo $key; ?>"/>
              <button data-product-id="<?php echo $key; ?>" data-price="<?php echo (int) $value["price"]; ?>" data-cart-id="cart-id-<?php echo $key; ?>"
                onclick="increaseValue(this)">
                <i class="fa-solid fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
    <div class="create-order">
      <div class="container-form">
        <form action="" method="post">
          <div class="info-order">
            <div class="name-order">
              <div class="label-info-order label-name">
                <h5>Tên người nhận:</h5>
              </div>
              <div class="label-name-full">
                <p><?php echo $_SESSION['user']['name']; ?></p>
              </div>
            </div>
            <div class="sdt-order">
              <div class="label-info-order label-sdt">
                <h5>Số điện thoại:</h5>
              </div>
              <div class="label-sdt-full">
                <p><?php echo $_SESSION['user']['phone']; ?></p>
              </div>
            </div>
            <div class="address-order">
              <div class="label-info-order label-address">
                <h5>Nhập địa chỉ nhận hàng:</h5>
              </div>
              <div class="label-address-full">
                <input type="text" name="diaChiNhanHang" id="diaChiNhanHang" value="<?php echo $_SESSION['user']['address']; ?>">

              </div>
            </div>
            
          </div>

          <div class="info-price">
            <div class="price-total">
              <div class="label-price">
                <h5>Tổng tiền:</h5>
              </div>
              <div class="label-price-full">
                <p id="total-product-price">
                <?php
$total = array_reduce($_SESSION["cart"], function ($carry, $item) {
    return $carry + (int) $item['price'] * $item['quantity'];
}, 0);
$_SESSION['totalPrice'] = $total;
echo number_format($total) . 'đ';
?>
                </p>
              </div>
            </div>
            <div class="discount">
              <div class="label-discount">
                <h5>Giảm giá:</h5>
              </div>
              <div class="label-discount-full">
                <p>0đ</p>
              </div>
            </div>
            <div class="shipping">
              <div class="label-shipping">
                <h5>Phí vận chuyển:</h5>
              </div>
              <div class="label-shipping-full">
                <p>0đ</p>
              </div>
            </div>
          </div>
          <div class="submit-order">
          <?php
if (count($_SESSION['cart']) > 0) {
    echo '<button>Đặt hàng ngay</button>';
}
?>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
