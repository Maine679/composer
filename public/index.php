<?php

require_once '..\vendor\autoload.php';

use app\MyQB;


$example = new MyQB();

//$results = $example->FindOne('users',['*'],14);
//$results = $example->getAll('users',['*']);
//$results = $example->Insert('users',['name'=>'name','surname'=>'surname','id'=>'233']);
$results = $example->update('users',['name'=>'name2','surname'=>'surname2'],26);

var_dump($results);