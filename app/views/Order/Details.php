<section>
    <style>
        @import url('/public/css/orderDetails.css');
    </style>
    <div class="container-order-details">
        <div class="order-details">
            <div class="container-order-info">
                <div class="order-info">
                    <div class="order-address">
                        <div class="title">
                            <p>Địa chỉ giao hàng</p>
                        </div>
                        <div class="receiver">
                            <div class="name">
                                <p>Name: <?php echo $_SESSION["user"]["name"]?></p>
                            </div>
                            <div class="phone">
                                <p>(Phone) <?php echo $_SESSION["user"]["phone"]?></p>
                            </div>
                            <div class="address">
                                <p>
                                    <?php echo $data[0]["delivery_address"] ?>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="delivery">
                        <div class="van-chuyen">
                            <p><i class="fa-solid fa-helicopter"></i>Vận chuyển máy bay</p>
                        </div>
                        <div class="delivery-time">
                            <?php if($data[0]['status'] == "cancel" ){ ?>
                            <div class="delivery-time-items" style="color: #FD8A8A;">
                                <div class="tron"><i class="fa-solid fa-helicopter"></i></div>
                                <div class="items-details">
                                    <div class="time">
                                        <p><?php echo $data[0]["order_completion"] ?></p>
                                    </div>
                                    <div class="status">
                                        <p>Đơn hàng đã bị hủy.</p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($data[0]['status'] == "success" ){ ?>
                            <div class="delivery-time-items" style="color: #50be06;">
                                <div class="tron"><i class="fa-solid fa-helicopter"></i></div>
                                <div class="items-details">
                                    <div class="time">
                                        <p><?php echo $data[0]["order_completion"] ?></p>
                                    </div>
                                    <div class="status">
                                        <p>Đã giao hàng thành công, địa chỉ: <?php echo $data[0]["delivery_address"] ?>.</p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($data[0]['status'] != "pending" ){ ?>
                            <div class="delivery-time-items" style="color: #95BDFF;">
                                <div class="tron"><i class="fa-solid fa-helicopter"></i></div>
                                <div class="items-details">
                                    
                                    <div class="status">
                                        <p>Đơn hàng đang vận chuyện đến bạn theo dự kiến, vui lòng không được boom hàng.</p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="delivery-time-items" style="color: #e8b417;">
                                <div class="tron"><i class="fa-solid fa-helicopter"></i></div>
                                <div class="items-details">
                                    <div class="time">
                                        <p><?php echo $data[0]["create_order"] ?></p>
                                    </div>
                                    <div class="status">
                                        <p>Đơn hàng đang được chuẩn bị cho bạn, vui lòng chờ lát nhé!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-product-info">
                <div class="product-info">
                    <?php $totalDiscount = 0; while($product = $data[1]->fetch_assoc()){ ?>
                    <div class="product-items">
                        <div class="image">
                            <img src="<?php echo $product["image"] ?>" alt="<?php echo $product["name"] ?>">
                        </div>
                        <div class="name-description-quantity">
                            <div class="name">
                                <p><?php echo $product["name"] ?></p>
                            </div>
                            <div class="description">
                                <p><?php echo $product["description"] ?></p>
                            </div>
                            <div class="quantity">
                                <p>Số lượng: <span><?php echo $product["quantity"] ?></span></p>
                            </div>
                        </div>
                        <div class="price">
                            <?php if($product["discount"] != null && $product["discount"] > 0) {?>
                            <div class="price-old">
                                <p><?php
                                    $discount = $product["price"] * ((int)$product["discount"] / 100);
                                    $price = $product["price"] - $discount ;
                                    
                                    echo number_format($product["price"]) ?>
                                đ</p>
                            </div>
                            <?php $totalDiscount += $discount * $product["quantity"];} ?>
                            
                            <div class="price-new">
                                <p><?php if($product["discount"] != null && $product["discount"] > 0) {
                                    echo number_format($price); }else{ echo number_format($product["price"]);}?>
                                    đ</p>
                            </div>
                            
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="container-payment">
                    <div class="payment">
                        <p><i class="fa-regular fa-credit-card"></i> Phương thức thanh toán: <span>Thanh toán khi nhận hàng</span></p>
                    </div>
                </div>
                <div class="container-price-total">
                   <div class="price-total">
                        <div class="discount">
                            <p>Giảm giá: </p><span><?php echo number_format($totalDiscount) ?> đ</span>
                        </div>
                        <div class="delivery-fee">
                            <p>Phí vận chuyển: </p> <span>0 đ</span>
                        </div>
                        <div class="price-total">
                            <p>Tổng đơn hàng: </p><span><?php echo number_format($data[0]["price_total"]); ?> đ</span>
                        </div>
                   </div>

                </div>
                <div class="container-btn-status">
                    <div class="btn-status">
                        <form action="" method="post" id="f-cancel">
                            <input type="text" name="status" value="cancel" id="cancel" value="cancel" style="display:none;">
                            <button type="submit" <?php if($data[0]["status"] == "pending") {echo "style='background-color:#f44905;'";} else {echo "disabled";} ?>>Hủy đơn ngay</button>
                        </form>
                        <form action="" method="post" id="f-delivery">
                            <input type="text" name="status"id="delivery" value="delivered" style="display:none;">
                            <button type="submit"<?php if($data[0]["status"] != "shipping" ) {echo "style='background-color:#98d8f4;' disabled";}?> >Đã nhận được hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>