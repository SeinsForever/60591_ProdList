<?php

namespace App\Controllers;

use Framework\Controller;

class HelloController extends Controller
{
    public function hello($name, $value){
        return $this->view('main.php', ['name' =>  $name, 'value' => $value]);
    }
}