<?php
include_once "./base.php";

$table=$_GET['table'];
unset($_GET['table']);

if($table=='News'){
    echo json_encode($$table->all(['type'=>$_GET['id']]));
}
