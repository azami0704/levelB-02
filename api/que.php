<?php
include_once "./base.php";


if(is_array($_POST['opt'])){
    $Que->save(['text'=>$_POST['text']]);
    $main=$Que->max('id',1);
    $data['main']=$main;
    foreach($_POST['opt'] as $text){
        if($text){
            $data['text']=$text;
            $Que->save($data);
        }
    }
    to("../admin.php?do=que");
}else{
    $opt=$Que->find($_POST['opt']);
    $opt['vote']+=1;
    $Que->save($opt);
    to("../index.php?do=res&id={$_POST['id']}");
}


?>