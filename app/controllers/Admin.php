<?php 
class Admin extends baseController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel('adminModel');
    }
    public function index(){
        ob_end_clean();
        if(isset($_SESSION['admin'])){
            header('location: /Admin/Dashboard');
        }
        $this->view('Admin/Login');
        if(isset($_POST['Username'])){
            $admin = $this->model->checkAdmin($_POST['Username'], $_POST['Password']);
            if(!$admin){
                echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu")</script>';
            }else{
                $admin = $admin->fetch_assoc();
                $_SESSION['admin'] = [];
                $_SESSION['admin']['id'] = $admin['id'];
                $_SESSION['admin']['name'] = $admin['name'];
                header('location: /Admin/Dashboard');
            }
            
        }
    }
    public function Dashboard(){
        ob_end_clean();
        if(isset($_SESSION['admin'])){
            $this->view('Admin/Dashboard');
        }else{
            ob_end_clean();
            require_once(__DIR__ . '/../views/404.php');
        }
    }
}
?>