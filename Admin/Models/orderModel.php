<?php 
require_once  __DIR__ . "/../../configs/config.php";
require_once  __DIR__ . "/../../app/models/connectDB.php";
class orderModel

extends connectDB{
    private $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function run(){
        if(isset($_GET["action"])){
            switch ($_GET['action']){
                case "getBranch":
                    $this->output($this->getBranch());
                    break;
                case "getOrderDetails":
                    $this->getOrderDetails($_GET["id"]);
                    break;
                case "updateStatus":
                    $this->updateStatus($_GET["id"], $_GET["status"]);
                    break;
            }
        }
        
        
    }
    public function getBranch(){
        $sql = "SELECT oder.id, oder.delivery_time, oder.user_id, oder.price_total, oder.id_branch, branch.name, branch.address, branch.img FROM `oder` JOIN branch ON `oder`.`id_branch` = `branch`.`id` WHERE `oder`.`status` = 'pending' OR `oder`.`status` = 'shipping' OR `oder`.`status` = 'delivered' ORDER BY `oder`.`delivery_time` ASC";
        $result = $this->connect->query($sql);
        return $result;
    }
    private function countProductsInTheOrder($id){
        $sql = "SELECT COUNT(*) FROM oder_item WHERE oder_id == $id";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc()["COUNT(*)"];
    }
    public function getOrderDetails($id){
        $sql = "SELECT oder.id, product.name AS product_name, product.price, product.image, oder_item.quantity, oder.delivery_address, account.name AS account_name, account.phone FROM oder JOIN oder_item ON oder.id = oder_item.oder_id JOIN product ON product.id = oder_item.product_id JOIN account ON oder.user_id = account.id WHERE oder.id = '$id'";
        return $this->connect->query($sql);
    }
    public function updateStatus($id, $status){
        $sql = "UPDATE `oder` SET `status` = '$status' WHERE `oder`.`id` = $id";
        $this->connect->query($sql);

    }
    public function getStatus($id){
        $sql = "SELECT status FROM oder WHERE id = $id";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc()["status"];
    }
    private function output($data){
        $array = array();
        while($row = $data->fetch_assoc()){
            $array[] = $row;
        }
        header("Content-Type: application/json");
        echo json_encode($array);
    }
    
}

?>