<div class="container-order">
    <div class="order">
        <div class="layout-branch">
            <div class="title">
                <h2>Đơn hàng chưa hoàn thành</h2>
            </div>
            <div id="branch">
                <div class="items">
                    <a href="">
                        <span class="image-branch">
                            <img src="/public/images/home2.png" alt="">
                        </span>
                        <span>
                            <span class="name-branch">Chí Nhánh 2</span>
                            <span class="address-branch">54 Xô Viết Nghệ Tĩnh, Q.Bình Thạnh, TPHCM</span>
                            <span class="details-order">
                                <span class="count-products">Số lượng mặt hàng: 3</span>
                                <span class="total-price">Tổng: 402,000đ</span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="layout-info-order">
            <div class="title">
                <h2>Thông tin chi tiết đơn hàng</h2>
            </div>
            <div id="container-info-order">
                <div class="info-order">
                    <div class="items-product">
                        <div class="inner-items-product">
                            <div class="image-product">
                                <img src="/public/images/home2.png" alt="">
                            </div>
                            <div class="info-product">
                                <div class="name-product">Tên sản phẩm</div>
                                <div class="price-product">Giá: 100,000đ</div>
                                <div class="quantity-product">Số lượng: 2</div>
                            </div>
                        </div>
                    </div>
                    <div class="btn">
                        <button>Giao hàng ngay cho khách</button>
                        <button>Xác nhận giao thành công</button>
                    </div>
                </div>
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