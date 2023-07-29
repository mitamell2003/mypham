<div class="alert-popup"></div>
<section class="products">
      <div class="main-menu">
        <div class="container-menu">
          <div class="container-category">
            <div class="category-list">
              <div class="item-category">
                <a href="/Menu/page/"
                  ><span class="img-category"
                    ><img
                      src="https://cdn-icons-png.flaticon.com/256/11465/11465806.png"
                      alt="" /></span
                  ><span class="name-category">Tất cả</span></a
                >
              </div>
              <?php while($row = $data[1]->fetch_assoc()){?>
                <div class="item-category">
                <a href="<?php echo "/Menu/category/". $row['id'] ;?>"
                  ><span class="img-category"
                    ><img
                      src="<?php echo $row['image'] ;?>"
                      alt="<?php echo $row['name'] ;?>" 
                      title="<?php echo $row['name'] ;?>"/></span
                  ><span class="name-category"><?php echo $row['name'] ;?></span></a
                >
              </div>
              <?php } ?>

            </div>
          </div>
          <div class="container-product">
            <div class="product-list">
            <?php while($row = $data[0]->fetch_assoc()){?>
              <div class="item-product">
                <div class="inner-product">
                  <div class="img-product">
                    <a href="/Menu/details/<?php echo $row["id"] ?>">
                      <img src="<?php echo $row['image'];?>" alt="<?php echo $row['name'] ?>">
                    </a>
                  </div>
                  <div class="name-product">
                    <h3 >
                      <a href="/Menu/details/<?php echo $row["id"] ?>"><?php echo $row['name'] ?></a>
                    </h3>
                  </div>
                  <div class="price-product">
                    <p><?php 
                       $price = (int)$row['price'];
                      if($row["discount"] == NULL){
                       echo number_format($price);
                    }else{
                      if ((int)$row["discount"] > 100){
                        $row["discount"] = 100;
                      }
                      $price = (int)($row["price"] - ($row["price"] * $row["discount"] / 100));
                      echo number_format($price);
                    }?>
                      <span class="vnd">đ</span>
                    </p>
                  </div>
                  <div class="discount-product">
                  <?php if($row["discount"] > 0 && $row["discount"] != NULL){ ?>
                    <p><?php echo number_format((int)$row['price']); ?>
                      <span class="vnd">đ</span>
                    </p>
                  <?php } ?>
                  </div>
                  <div class="add-to-cart">
                    <button type="button"data-id="<?php echo $row["id"] ?>"data-name="<?php echo $row["name"] ?>"data-price="<?php echo $price ?>"data-image="<?php echo $row["image"] ?>" onclick="addCart(this)">Thêm vào giỏ hàng</button>
                  </div>
                </div>
              </div>
            <?php }?>
            </div>
          </div>
        </div>
      </div>
    </section>