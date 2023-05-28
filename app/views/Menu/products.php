<div class="alert-popup"></div>
<section class="products">
  <div class="container-product">
    <div class="tool-bar">
      <div class="product-type">
        <ul>
          <li><a href="#">Hamburger</a></li>
          <li><a href="#">Bánh mì</a></li>
          <li><a href="#">pizza</a></li>
          <li><a href="#">Bánh cuốn</a></li>
          <li><a href="#">Bánh kem</a></li>
        </ul>
      </div>
    </div>
    <div class="product-items">
      <?php while($row = $data[0]->fetch_assoc()){?>
      <div class="item">
        <div class="img-content">
          <figure>
            <img
              src="/public/images/<?php echo $row['image'];?>"
              alt="<?php echo $row['name'] ?>"
              loading="lazy"
            />
          </figure>
        </div>
        <div class="description">
          <div class="name-product">
            <h3><a href="Menu/product/<?php echo $row["id"] ?>"><?php echo $row["name"] ?></a></h3>
            <span class="sale" title="Giảm giá <?php echo $row["discount"] ?>%">-<?php echo $row["discount"] ?>%</span>
          </div>
        </div>
        <div class="price-add">
          <div class="price"><span title="Giá sản phẩm"><?php echo number_format((int)$row['price']); ?>đ</span></div>
          <div class="add">
            <a
              title="Thêm vào giỏ hàng"
              id="product-id-<?php echo $row["id"]; ?>"
              data-id="<?php echo $row["id"]; ?>"
              data-name="Bánh mì thịt chả"
              data-price="<?php echo (int)$row['price']; ?>"
              data-image="/public/images/product/<?php echo $row['image'];?>"
              data-quantity="1"
              onclick="addCart(this)"
              ><i class="fa-solid fa-cart-plus"></i
            ></a>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</section>
<section class="pagination">
  <div class="container-pagination"></div>
</section>