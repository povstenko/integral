<?php
require "db.php";
include_once 'functions.php';

if (isset($_POST['array']) && !empty($_POST['array'])) {
    $data = json_decode($_POST['array']);

    $array[] = null;
    $cntr =0;
    foreach ($data as $value) {
        $array[$cntr]['question'] = $value->question;
        $array[$cntr]['answer'] = $value->answer;
        $cntr++;
    }
    show_array($array);

    // foreach($array as $a){
    //     echo "<br>".$a['question']." - ".$a['answer']."</br>";
    // }
}
