<?php
$row = $data[0]->fetch_assoc();
 ?>
 <section>
    <div class="container-detail">
        <div class="detail">
            <div class="img">
                <img src="/public/images/banh-mi-kep-trung.png" alt="" width="300px">
            </div>
            <div class="details-content ">
                <div class="details-name-product ">
                    <h3><?php echo $row["name"] ?></h3>
                </div>
                <div class="price-details ">
                    <span>Giá: <?php echo number_format($row["price"]) ?>đ</span>
                </div>
                <div class="detail-description ">
                    <p><?php echo $row["description"] ?></p>
                </div>
                <div class="detail-buy">
                    <div class="details-addCart">
                        <button>Thêm vào giỏ hàng</button>
                    </div>
                    <div class="details-buy">
                        <button>Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>