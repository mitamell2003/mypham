<?php
class order extends adminController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel('orderModel');
    }
    public function order(){
        if(!isset($_GET["id"])){
            $this->view('order', $this->model->getBranch());
        }else{
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' ){
                $this->model->updateStatus($_GET["id"], $_POST["status"]);
                echo "<script>window.location.href = '/Admin/?action=order';</script>";
            }
            $this->view('order', $this->model->getBranch() ,$this->model->getOrderDetails($_GET["id"]), $this->model->getStatus($_GET["id"]));
        }
    }

}
?>