<style>@import url("/public/css/orderAdmin.css");</style>
<div class="container-order">
    <div class="order">
        <div class="layout-branch">
            <div class="title">
                <h2>Đơn hàng chưa hoàn thành</h2>
            </div>
            <div class="branch">
                <?php while ($branch = $data[0]->fetch_assoc()){ ?>
                <div class="items">
                    <div class="image-branch">
                        <img src="/public/images/<?php echo $branch["img"] ?>" alt="">
                    </div>
                    <a href="/Admin/?action=order&id=<?php echo $branch["id"] ?>">
                       <span class="name-address">
                            <span class="name-branch"><?php echo $branch["name"] ?></span>
                            <span class="address-branch"><?php echo $branch["address"] ?></span>
                       </span>
                        <span class="details-order">
                            <span class="count-products">Thời gian giao hàng yêu cầu: </span>
                            <span><?php echo $branch["delivery_time"] ?></span>
                            <span class="total-price">Tổng: <?php echo number_format((int)$branch["price_total"]) ?> đ</span>
                        </span>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="layout-info-order">
            <div class="title">
                <h2>Thông tin chi tiết đơn hàng</h2>
            </div>
            <div id="container-info-order">
                <?php if (isset($_GET["id"])){ ?>
                
                <div class="info-order">
                    <?php while( $details = $data[1]->fetch_assoc()){ ?>
                    <div class="items-product">
                        <div class="inner-items-product">
                            <div class="image-product">
                                <img src="<?php echo $details["image"] ?>" alt="">
                            </div>
                            <div class="info-product">
                                <div class="name-product"><p>Tên sản phẩm: <?php echo $details["product_name"] ?></p></div>
                                <div class="price-product"><p>Giá: <?php echo number_format((int)$details["price"]); ?>đ</p></div>
                                <div class="quantity-product"><p>Số lượng: <?php echo $details["quantity"] ?></p></div>
                            </div>
                        </div>
                    </div>
                    <?php $name = $details["account_name"]; $phone = $details["phone"]; $address = $details["delivery_address"]; } ?>
                    <hr>
                    <div class="address-customer">
                        <p>Địa chỉ giao hàng: <?php echo $address ?></p>
                    </div>
                    <div class="address-customer">
                        <p>Tên khách hàng: <?php echo $name ?></p>
                    </div>
                    <div class="address-customer">
                        <p>Số điện thoại: <?php echo $phone ?></p>
                    </div>
                    <div class="btn">
                        <form action="" method="post">
                            <input type="text" name="status" id="shipping" value="shipping" style="display: none;">
                            <button type="submit" style="background-color: #B2A4FF ;" <?php if($data[2] != "pending") echo "disabled" ?>>Giao hàng ngay cho khách</button>
                        </form>
                        <form action="" method="post">
                        <input type="text" name="status" id="delivered" value="success" style="display: none;">
                            <button type="submit" style="background-color: #fc8f8f;" <?php if($data[2] != "delivered") echo "disabled" ?>>Xác nhận giao thành công</button>
                        </form>
                        
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    var req = new XMLHttpRequest();
    req.onreadystatechange = () =>{
        console.log(req.responseText);
    }
    req.open('GET', '/Admin/Models/apiOrder.php?action=getBranch', true);
    req.send();
</script>