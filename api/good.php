<?php
include_once "./base.php";

$meth=$_POST['meth'];
unset($_POST['meth']);
$_POST['ac']=$_SESSION['ac'];
if($meth=='save'){
    $Log->save($_POST);
}else{
    $log=$Log->find($_POST);
    $Log->del($log['id']);
}

?>