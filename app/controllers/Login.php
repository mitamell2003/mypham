<?php
class Login extends baseController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel('loginModel');
    } 

    public function index(){
        if(isset($_SESSION['user'])){
            echo '<script>alert("Bạn đã đăng nhập"); location.href="/";</script>';

        }else{
            $this->view('Login');
            # require_once __DIR__ . "/../views/Login.php";
            if(isset($_POST['username']) && isset($_POST['password'])){
                $userName = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $this->checkLogin($userName, $password);
            }
        }
        
    }
    private function checkLogin($userName, $password){
        $result = $this->model->post($userName, $password);
        if($result){
            $user = $result->fetch_assoc();
            $__user = array(
                'id' => $user['id'], 
                'userName' => $user['userName'],
                'password' => $user['password'],
                'name' => $user['name'],
                'email' => $user['email'],
                'address' => $user['address'],
                'phone' => $user['phone'],
            );
            $__cart = [];
            // khởi tạo phiên đăng nhập
            $_SESSION['user'] = $__user;
            $_SESSION['cart'] = $__cart;
            echo '<script>alert("Đăng nhập thành công"); location.href="/";</script>';
        }
        else{
            echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
        }

    }
}
 ?>