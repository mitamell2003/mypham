<?php
class dashboard extends adminController{
    private $model;
    public function __construct(){
        //$this->model = $this->loadModel('dashboardModel');
    }
    public function loadDashboard(){
        //$data = $this->model->loadDashboard();
        $this->view('dashboard');
    }
}
?>