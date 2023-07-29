<?php
class thongke extends adminController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel("thongKeModel");
    }
    public function thongke(){
        try{
            $this->view("thongKeDonHang", $this->model->getRevenue(), $this->model->getHotBranch(), $this->model->getHotProduct(), $this->model->boomAccount(), $this->model->quaHan(), $this->model->boomBranch());
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
}
 ?>