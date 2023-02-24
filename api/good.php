<?php
include_once "./base.php";

$_POST['ac']=$_SESSION['ac'];
$meth=$_POST['meth'];
unset($_POST['meth']);

if($meth=='del'){
    $log=$Log->find($_POST);
    $Log->del($log['id']);
}else{
    $Log->save($_POST);
}


