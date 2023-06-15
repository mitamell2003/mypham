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
        $sql = "SELECT * FROM `product`";
        $result = $this->connect->query($sql);
        return $result;
    }
    public function update($name, $description, $price, $type, $image, $discount){
        $sql = "UPDATE `product` SET `name`='$name',`description`='$description',`price`='$price',`type`='$type',`image`='$image',`discount`='$discount' WHERE `id` = '$_GET[id]'";
        $result = $this->connect->query($sql);
        return $result;
    }
    
    public function delete(){
        $sql = "DELETE FROM `product` WHERE `id` = '$_GET[id]'";
        $result = $this->connect->query($sql);
        return $result;
    }
}
?>