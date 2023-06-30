<?php
class orderModel extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function getAll($id){
        $sql = "SELECT * FROM oder WHERE user_id = $id ORDER BY `oder`.`id` DESC ";
        return $this->connect->query($sql);
    }
    public function post($id , $status){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");
        $sql = "UPDATE oder SET status = '$status', order_completion = '$date' WHERE oder.id = $id";
        return $this->connect->query($sql);
    }
    public function getInfo($id){
        $sql = "SELECT * FROM oder WHERE id = $id";
        return $this->connect->query($sql);
    }
    public function getProduct($id){
        $sql = "SELECT product.image, product.description, product.name, product.discount, product.price, oder_item.quantity FROM oder join oder_item on oder_item.oder_id = oder.id join product on oder_item.product_id = product.id WHERE oder.id = $id"; 
        return $this->connect->query($sql);
    }
}
?>