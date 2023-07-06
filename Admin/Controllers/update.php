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
            $dataUpdate = $result->fetch_assoc();
            $this->view('updateProduct',$dataUpdate);
            if(isset($_FILES) && $_SERVER["REQUEST_METHOD"] == "POST"){
                if ($_FILES["image-product"]["name"] == ""){
                    $image = $dataUpdate["image"]; 
                }
                $name = $_POST["name-product"];
                $category = $_POST["category-product"];
                $description = $_POST["description"];
                $price = $_POST["price-product"];
                $discount = $_POST["discount-product"];
                $id = $_GET["id"];
                $this->model->update($name, $description, $category, $price, $discount, $image, $id);
                echo "<script>alert('Cập nhật thành công'); location.href='/Admin?action=update'</script>";
            }
        }

    }
    public function delete(){
        if(isset($_GET["id"])){
            $this->model->delete();
            echo "<script>alert('Xóa thành công'); location.href='/Admin?action=update'</script>";
        }
    }

}
?>