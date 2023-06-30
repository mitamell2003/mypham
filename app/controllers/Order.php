<?php
class Order extends baseController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel("orderModel");
    }
    public function index(){
        if(!isset($_SESSION["user"])){
            echo '<script>location.href="/";</script>';
        }
        $this->view("Order/Order",$this->model->getAll($_SESSION["user"]["id"]));
    }
    public function details($id = 0){
        if ($id == 0) {
            echo '<script>location.href="/";</script>';
        }else{
            if(isset($_POST["status"])){
                $status = $_POST["status"];
                $this->model->post($id, $status);
                echo '<script>location.href="/Order/Details/'.$id. '";</script>';
            }
                
            $this->view("Order/Details", $this->model->getInfo($id)->fetch_assoc(), $this->model->getProduct($id));
        }
    }
   
    /**
     * @method POST
     * hủy đơn hàng
     */
    public function cancelOrder(){
        if (isset($_POST["cancel_id"])) {
            $id = $_POST["cancel_id"];
            $this->model->post($id);
            $msg  = array("status" => "success",
                "msg" => "Hủy đơn hàng thành công");
            ob_clean();
            header('Content-Type: application/json');
            echo json_encode($msg);
        }
    }
}
 ?>