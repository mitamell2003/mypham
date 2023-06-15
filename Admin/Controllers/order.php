<?php
class order extends adminController{
    private $model;
    public function __construct(){
    }
    public function order(){
        $this->view('order');
    }

}
?>