<?php

function validate(array $validations){
    
    $result = [];
    $param = '';
    foreach($validations as $field => $validate){
        $result[$field] = (!str_contains($validate, '|')) ? singleValidation($validate, $field, $param) : $result[$field] = multipleValidations($validate, $field, $param);
        
    }

    if(in_array(false, $result)){
        return false;
    }

    return $result;
}


function singleValidation($validate, $field, $param){
    if(str_contains($validate, ':')){
        [$validate, $param] = explode(':', $validate);
    }

    return $validate($field, $param);
}


function multipleValidations($validate, $field, $param){

    $explodePipeValidate = explode("|", $validate);
 
    foreach($explodePipeValidate as $validate){

        if(str_contains($validate, ':')){
            [$validate, $param] = explode(':', $validate);
        }
        $result = $validate($field, $param);
    }

    return $result;
}

function required($field){

    if($_POST[$field] === ''){
        setFlash($field, 'O campo é obrigatório');
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}


function email($field){
    $emailIdValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if(!$emailIdValid){
        setFlash($field, "O email precisa ser válido");
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}

function unique($field, $param){

    $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    $user = findBy($param, $field, $data);

    if($user){
        setFlash($field, "Esse campo já está cadastrado");
        return false;
    }

    return $data;
}

function maxlen($field, $param){
    $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

    if(strlen($data) > $param){
        setFlash($field, "Esse campo não pode ser maior que {$param}");
        return false;
    }

    return $data;
}