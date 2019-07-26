<?php
require "db.php";
include_once 'functions.php';

if (isset($_POST['array']) && !empty($_POST['array'])) {
    $arr = $_POST['array'];
    //var_dump($arr);
    //console_log($arr);
    //$arr1 = json_decode($arr);
    // $myArray = json_decode($_POST['array']);
    //echo "<script>console.log(".$arr.");</script>";
    echo $arr;
}
