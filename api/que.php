<?php
include_once "./base.php";

$table=$_POST['table'];
$go=$_POST['from'];
$direct=strtolower($_POST['table']);
unset($_POST['table']);
$data=[];

if(is_array($_POST['opt'])){
    $$table->save(['text'=>$_POST['text']]);
    $data['main']=$$table->max('id',1);
    foreach($_POST['opt'] as $opt){
        if($opt){
            $data['text']=$opt;
            $$table->save($data);
        }
    }
}else{
    $opt=$$table->find($_POST['opt']);
    $opt['vote']+=1;
    $$table->save($opt);
}




to("../$go.php?do=$direct");