<style>@import url("/public/css/updateProduct.css");</style>
<div class="update-container">
    
    <div class="update">
        <table>
            <thead>
                <tr class="table-header">
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th style="width: 150px;">Hình ảnh sản phẩm</th>
                    <th>Giảm giá</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $data[0]->fetch_assoc()){ ?>
                    <tr class="table-body">
                        <td>1</td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo number_format((int)$row["price"]) ?>đ</td>
                        <td>Khuyến mãi</td>
                        <td ><img src="<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>" width="100%"></td>
                        <td><?php echo $row["discount"] ?></td>
                        <td class="action">
                            <a href="?action=update&ctl=updateProduct&id=<?php echo $row["id"] ?>" >Sửa</a>
                            <a href="?action=update&&ctl=delete&id=<?php echo $row["id"] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>