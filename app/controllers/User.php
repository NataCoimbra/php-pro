<?php 

namespace app\controllers;

class User {

    public function show($params){
        if(!isset($params['user'])){
            return redirect('/');
        }

        $user = findBy('users', 'id', $params['user']);
        var_dump($user);
        die();   
    }

    public function create($params){
        
        return [
            'view' => 'create.php',
            'data' => ['title' => 'Create']
        ];
    }


    public function store(){
        
        $validate = validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|maxlen:5'
        ]);

        if(!$validate){
            return redirect('/user/create');
        }


        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);

        $created = create('users', $validate);
        var_dump($created);

        if(!$created){
            setFlash('message', 'Ocorreu um erro ao cadastrar, tente novamente em alguns segundos');
            return redirect('/user/create');
        }

        return redirect('/');
    }

}