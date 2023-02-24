<?php
include_once "./base.php";

if(isset($_POST['ac'])){
    $ac=$User->find(['ac'=>$_POST['ac']]);
    if(empty($ac)){
        echo "e查無帳號";
    }else if($ac['pw']!=$_POST['pw']){
        echo "e密碼錯誤";
    }else{
        $_SESSION['ac']=$_POST['ac'];
        if($_POST['ac']=='admin'){
            echo "admin";
        }else{
            echo "index";
        }
    }
}else if(isset($_POST['email'])){
    $ac=$User->find(['email'=>$_POST['email']]);
    if(empty($ac)){
        echo "查無此資料";
    }else{
        echo "您的密碼為:{$ac['pw']}";
    }
}






?>