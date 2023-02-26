<?php

namespace App\Controllers;

use Framework\Controller;

class TaskController extends Controller
{
    public function task($name, $value = null){
        return $this->view('task.php', ['name' =>  $name, 'value' => $value]);
    }

//    public function data($user_name, $group_name){
////        return $this->view('data.php',['name'=>$user_name,'group'=>$group_name]);
////    }
}