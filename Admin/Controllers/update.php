<?php
class update extends adminController{
    public $result;
    private $model;
    public function __construct(){
        $this->model = $this->loadModel('updateModel');
    }
    public function update(){
      
        $this->view('update', $this->model->getAll());
       if($_SERVER["REQUEST_METHOD"] == "POST"){
           var_dump($_FILES);
            echo $_POST["name-product"];
        }
    
    }
    public function updateProduct(){
        if(isset($_GET["id"])){
            $result = $this->model->getInfo($_GET["id"]);
            $this->view('updateProduct', $result->fetch_assoc());
            if(isset($_FILES) && $_SERVER["REQUEST_METHOD"] == "POST"){
                
                $name = $_POST["name-product"];
                $description = $_POST["description-product"];
                $price = $_POST["price-product"];
                $discount = $_POST["discount-product"];
                $image = $_FILES["image-product"];
                $id = $_GET["id"];
                $this->model->updateProduct($name, $description, $price, $discount, $image, $id);
            }
        }

    }
    public function delete(){
        
    }

}
?>