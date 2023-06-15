<?php
class add extends adminController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel('addModel');
    }
    public function add(){
        $this->view('add');
        if(isset($_FILES) && $_SERVER['REQUEST_METHOD'] == "POST"){
            $path =  "/public/images/"; 
            $path = $path . basename($_FILES["image-product"]["name"]);
            move_uploaded_file($_FILES["image-product"]["tmp_name"], __DIR__ ."/../../". $path);
            if($_POST['discount-product'] > 100){
                $_POST['discount-product'] = 100;
            }
            $this->model->add($_POST['name-product'], $_POST['description'], $_POST['price-product'], $_POST['category-product'], 6, $path, 2 , $_POST['discount-product']);
            echo '<script>alert("Thêm sản phẩm thành công")</script>';
        }
        
    }
}
?>