<?php
class dashboard extends adminController{
    private $model;
    public function __construct(){
        //$this->model = $this->loadModel('dashboardModel');
    }
    public function loadDashboard(){
        $this->view('dashboard',$this->checkCtl());
    }
    private function checkCtl(){
        if(isset($_GET["ctl"])){
            require_once $_GET["action"] . ".php";
            $ctl = new $_GET["action"]();
            return call_user_func([$ctl, $_GET["ctl"]]);
        }
    }
}
?>