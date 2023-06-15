<div class="container-add-product">
                        <div class="add-product">
                            <div class="form-add-product">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="a-n">
                                        <label for="name-product">Tên sản phẩm: </label>
                                        <input type="text" id="name-product" name="name-product" required>
                                    </div>
                                    <div class="a-d">
                                        <label for="description">Mô tả sản phẩm: </label>
                                        <textarea name="description" id="description" cols="50" rows="5"></textarea >
                                    </div>
                                    <div class="a-p">
                                        <label for="price-product">Giá sản phẩm: </label>
                                        <input type="number" id="price-product" name="price-product" required>
                                    </div>
                                    <div class="a-c">
                                        <label for="category-product">Loại sản phẩm: </label>
                                        <select name="category-product" id="category-product">
                                        <?php require_once __DIR__ . "/../../app/models/menuModel.php"; $chek = 4;
                                            $category = new menuModel();
                                            $result = $category->getCategory();
                                            while($row = $result->fetch_assoc()){ ?>
                                            <option value="<?php echo $row["id"] ?>" ><?php echo $row["name"] ?></option>
                                            
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="a-i">
                                        <label for="image-product">Hình ảnh sản phẩm: </label>
                                        <input type="file" accept="image/png, image/jpeg" id="name-product" name="image-product" value="hello.png" required>
                                    </div>
                                    <div class="a-discount">
                                        <label for="discount-product">Giảm giá</label>
                                        <input type="number" id="discount-product" name="discount-product">
                                    </div>
                                    <div class="submit">
                                        <input type="submit" value="Thêm sản phẩm">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>