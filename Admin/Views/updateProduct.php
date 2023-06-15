<style>
    @import url("/public/css/updateProduct.css");
</style>
<div class="container-add-product">
    <div class="add-product">
        <div class="form-add-product">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="a-n">
                    <label for="name-product">Tên sản phẩm: </label>
                    <input type="text" id="name-product" name="name-product" value="<?php echo $data[0]["name"]?>" >
                </div>
                <div class="a-d">
                    <label for="description">Mô tả sản phẩm: </label>
                    <textarea name="description" id="description" cols="50" rows="5"><?php echo $data[0]["description"]?></textarea>
                </div>
                <div class="a-p">
                    <label for="price-product">Giá sản phẩm: </label>
                    <input type="number" id="price-product" name="price-product" value="<?php echo (int)$data[0]["price"]?>" required>
                </div>
                <div class="a-c">
                    <label for="category-product">Loại sản phẩm: </label>
                    <select name="category-product" id="category-product">
                        <?php require_once __DIR__ . "/../../app/models/menuModel.php";
                                            $category = new menuModel();
                                            $result = $category->getCategory();
                                            while($row = $result->fetch_assoc()){ ?>
                        <option value="<?php echo $row["id"] ?>"
                            <?php if((int)$row["id"] === (int)$data[0]["category_id"]) echo "selected" ?>>
                            <?php echo $row["name"] ?>
                        </option>

                        <?php } ?>
                    </select>
                </div>
                <div class="a-i">
                    <label for="image-product">Hình ảnh sản phẩm: </label>
                    <input type="file" accept="image/png, image/jpeg" id="name-product" name="image-product">
                </div>
                <div class="a-discount">
                    <label for="discount-product">Giảm giá</label>
                    <input type="number" id="discount-product" name="discount-product" value="<?php echo $data[0]["discount"]?>" >
                </div>
                <div class="submit">
                    <input type="submit" value="Cập nhật sản phẩm">
                </div>
            </form>
        </div>
    </div>
</div>
