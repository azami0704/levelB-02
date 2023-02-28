<?php
include_once "./base.php";

$table=ucfirst($_POST['table']);
$direct=$_POST['table'];
unset($_POST['table']);

if(isset($_POST['id'])){
    foreach($_POST['id']as$idx=>$id){
        if(isset($_POST['del'])&&in_array($id,$_POST['del'])){
            $$table->del($id);
        }else if(isset($_POST['sh'])){
            $data['sh']=in_array($id,$_POST['sh'])?1:0;
            $data['id']=$id;
            $$table->save($data);
        }else if($table=='News'){
            $data['sh']=0;
            $data['id']=$id;
            $$table->save($data);
        }
    }
}

to("../admin.php?do=$direct");
?>