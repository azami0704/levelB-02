<?php
include_once "./base.php";

$table=$_POST['table'];
$go=$_POST['from'];
$direct=strtolower($_POST['table']);
unset($_POST['table']);
unset($_POST['from']);
$data=[];



if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if(isset($_POST['del'])&&in_array($id,$_POST['del'])){
            $$table->del($id);
        }

        foreach($_POST as $col=>$val){
            if($col!='del'&&$col!='sh'){
                $data[$col]=$val[$idx];
            }
            if($col=='sh'){
                $data[$col]=in_array($id,$val)?1:0;
            }
        }
        $$table->save($data);
    }
}


to("../$go.php?do=$direct");