<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$hihi = "05-20";
$now = date("m-d");
echo "$now <br> $hihi <br>";
var_dump(strtotime($now) > strtotime($hihi));
 ?>