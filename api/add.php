<?php
include_once "./base.php";

$direct=$_POST['table'];
$go=$_POST['from'];
unset($_POST['table']);
unset($_POST['from']);

$User->save($_POST);

to("../$go.php?do=$direct");
?>