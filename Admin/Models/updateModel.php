<?php 
class updateModel extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function getInfo($id){
        $sql = "SELECT * FROM `product` WHERE `id` = '$id'";
        $result = $this->connect->query($sql);
        return $result;
    }
    public function getAll(){
        $sql = "SELECT * FROM `product` ORDER BY `product`.`id` DESC";
        $result = $this->connect->query($sql);
        return $result;
    }
    public function update($name, $description, $category, $price, $discount, $image, $id){
        $sql = "UPDATE `product` SET `name`='$name',`description`='$description',`price`='$price',`category_id` = '$category' ,`image`='$image',`discount`='$discount' WHERE `id` = '$id'";
        $result = $this->connect->query($sql);
        return $result;
    }
    
    public function delete(){
        $sql = "DELETE FROM product WHERE `product`.`id` = '$_GET[id]'";
        $result = $this->connect->query($sql);
        return $result;
    }
}
?>