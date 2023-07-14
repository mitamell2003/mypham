<?php
class logout{
    public function logout(){
        unset($_SESSION['admin']);
        echo "<script>window.location.href='/Admin'</script>";
    }
}
 ?>