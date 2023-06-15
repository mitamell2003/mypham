<?php
class login extends adminController{
    private $model;
    public function __construct(){
        $this->model = $this->loadModel('loginModel');
    }
    public function checkAdmin(){
        if(isset($_POST['Username'])){
            $admin = $this->model->checkAdmin(htmlspecialchars($_POST['Username']), htmlspecialchars($_POST['Password']));
            if(!$admin){
                echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu")</script>';
            }else{
                $admin = $admin->fetch_assoc();
                $_SESSION['admin'] = [];
                $_SESSION['admin']['id'] = $admin['id'];
                $_SESSION['admin']['name'] = $admin['name'];
                echo '<script>alert("Đăng nhập thành công"); location.href="/Admin/"</script>';
            }
            
        }
    }
}
?>