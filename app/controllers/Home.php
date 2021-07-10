<?php 

namespace app\controllers;

class Home {

    public function index(){
        return [
            'view' => 'home.php',
            'data' => ['name' => 'Drake', 'teste' => 'testando']
        ];
    }
}