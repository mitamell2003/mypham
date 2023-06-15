<?php 
require_once  __DIR__ . "/../../configs/config.php";
require_once  __DIR__ . "/../../app/models/connectDB.php";
class apiOrder extends connectDB{
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
    private function getBranch(){
        $sql = "SELECT oder.id, oder.user_id, oder.id_branch, branch.name, branch.address, branch.img FROM `oder` JOIN branch ON `oder`.`id_branch` = `branch`.`id` WHERE `oder`.`status` = 'pending' ORDER BY `oder`.`create_order` ASC";
        $result = $this->connect->query($sql);
        return $result;
    }
    private function countProductsInTheOrder($id){
        $sql = "SELECT COUNT(*) FROM oder_item WHERE oder_id == $id";
        $result = $this->connect->query($sql);
        return $result->fetch_assoc()["COUNT(*)"];
    }
    private function getOrderDetails($id){
        $sql = "SELECT * FROM `oder_item` JOIN product ON `oder_item`.`product_id` = `product`.`id` WHERE `oder_item`.`oder_id` = '$id'";
        return $this->connect->query($sql);
    }
    private function updateStatus($id, $status){
        $sql = "UPDATE `oder` SET `status` = '$status' WHERE `oder`.`id` = $id";
        $this->connect->query($sql);
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
$api = new apiOrder();
$api->run();
?>