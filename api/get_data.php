<?php
include_once "./base.php";

$data=$News->all(['type'=>$_GET['type']]);
echo json_encode($data);
?>