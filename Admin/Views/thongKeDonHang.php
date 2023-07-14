<style>
    @import url('/public/css/thongKe.css');
</style>
<div class="container-thongkedonhang">
    <div class="thongkedonhang">
        <div class="r-b-p">
            <div class="container-revenue p10">
                <div class="revenue border">
                    <div class="t-r">
                        <p>Tổng doanh thu tất cả</p>
                    </div>
                    <div class="r">
                        <p><?php echo number_format((int)$data[0]); ?> đ</p>
                    </div>
                    <div class="nav">
                        <a href="/Admin/">Click để xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="container-hot-branch p10">
                <div class="hot-branch border">
                    <div class="t-b t-x t-size">
                        <p>Chi nhánh bán chạy nhất</p>
                    </div>
                    <div class="n-b name">
                        <p><?php echo $data[1]["name"] ?></p>
                    </div>
                    <div class="a-b">
                        <p><?php echo $data[1]["address"] ?></p>
                    </div>
                    <div class="quantity">
                        <p class="t-size1">Tổng số lượng sản phẩm đã bán ra: </p><p class="t-x num1"><?php echo $data[1]["soluong"] ?></p>
                    </div>
                    <div class="total">
                        <p class="t-size1">Tổng doanh của cửa hàng này là: </p><p class="t-x num1"><?php echo number_format((int)$data[1]["count"]) ?> đ</p>
                    </div>
                    <div class="nav">
                        <a href="#">Click để xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="container-hot-product p10">
                <div class="hot-product border">
                    <div class="t-p t-x t-size">
                        <p>Sản phẩm bán chạy nhất</p>
                    </div>
                    <div class="n-p name">
                        <p><?php echo $data[2]["name"] ?></p>
                    </div>
                    <div class="d-p">
                        <p><?php echo $data[2]["description"] ?></p>
                    </div>
                    <div class="quantity">
                        <p class="t-size1">Số lượng bán ra: </p><p class="t-x num1"><?php echo $data[2]["quantity"] ?></p>
                    </div>
                    <div class="nav">
                        <a href="#">Click để xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="boom">
            <div class="container-boom-user boom-item p10">
                <div class="boom-user border">
                    <div class="tbu t-red t-size">
                        <p>Người dùng hủy đơn nhiều nhất</p>
                    </div>
                    <div class="nbu name">
                        <p><?php echo $data[3]["name"] ?></p>
                    </div>
                    <div class="abu">
                        <p><?php echo $data[3]["address"] ?></p>
                    </div>
                    <div class="phone-bu">
                        <p>Số điện thoại: <?php echo $data[3]["phone"] ?></p>
                    </div>
                    <div class="quantity">
                        <p class="t-size1">Số lượng đơn hàng đã hủy: </p><p class="t-red num1"><?php echo $data[3]["count"] ?></p>
                    </div>
                    <div class="nav">
                        <a href="#">Click để xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="container-boom-branch boom-item p10">
                <div class="boom-branch border">
                    <div class="tbb t-red t-size">
                        <p>Chi nhánh bị hủy đơn nhiều nhất</p>
                    </div>
                    <div class="nbb">
                        <p>Tên chi nhánh: <?php echo $data[5]["name"] ?></p>
                    </div>
                    <div class="abb">
                        <p>Địa chỉ: <?php echo $data[5]["address"] ?></p>
                    </div>
                    <div class="quantity">
                        <p class="t-size1">Số lượng đơn hàng đã bị boom:</p> <p class="t-red num1"><?php echo $data[5]["count"] ?></p>
                    </div>
                    <div class="nav">
                        <a href="#">Click để xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="container-qua-han-giao boom-item p10">
                <div class="qua-han-giao border">
                    <div class="tqhg t-red t-size">
                        <p>Số đơn hàng quá hạn giao</p>
                    </div>
                    <div class="quantity">
                        <p><?php echo $data[4]["count"] ?> đơn hàng</p>
                    </div>
                    <div class="nav">
                        <a href="#">Click để xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>