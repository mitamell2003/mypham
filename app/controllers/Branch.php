<?php
class Branch extends baseController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel("modelBranch");
    }
    public function index(){
        $this->view("Branch",$this->model->get());
    }
}
 ?>