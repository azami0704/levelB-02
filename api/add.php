<?php
include_once "./base.php";

$table=$_POST['table'];
$go=$_POST['from'];
$direct=strtolower($_POST['table']);
unset($_POST['table']);
unset($_POST['from']);


$$table->save($_POST);

to("../$go.php?do=$direct");