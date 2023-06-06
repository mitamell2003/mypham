<?php
class Register extends baseController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel('registerModel');
    }
    public function index(){
        if(isset($_SESSION['user'])){
            echo '<script>alert("Bạn đã đăng nhập"); location.href="/";</script>';

        }else {
            $this->view('Register');
            # require_once __DIR__ . "/../views/Register.php";
            if(isset($_POST['submit'])){self::checkRegister();}
        }
        
    }
    private function checkRegister(){
       $register = $this->model->post(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['address']), htmlspecialchars($_POST['phone']), htmlspecialchars($_POST['name']), $_POST['gender']);
         if($register){
              echo "<script>alert('Đăng ký thành công'); location.href='/Login';</script>";
         }else{
              echo "<script>alert('Đăng ký thất bại trùng tên đăng nhập')</script>";
         }
    }
}
 ?> 