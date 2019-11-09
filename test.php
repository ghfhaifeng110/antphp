<?php
require_once "Db.class.php";

$db = new Db("myschool","root","root");

// $db->add('student',['no'=>10001,'name'=>'32','sex'=>1,'age'=>3]);
// $ret = $db->update('student',['age'=>14]);
// var_dump($ret);



$arr = $db->getAll("student","no,name");
print_r($arr);