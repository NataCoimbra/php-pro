<?php 

function connect(){
    return new PDO("mysql:host=localhost;dbname=phppro", 'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ 
    ]);
}