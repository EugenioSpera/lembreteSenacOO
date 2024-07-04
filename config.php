<?php


//servidor, bd, usuario, senha 

$db_servidor = 'localhost';
$db_database = 'lembreteSenac';
$db_usuario = 'EugenioSpera';
$db_pwd = '373468Eu';

$pdo = new PDO('mysql:host='.$db_servidor.';dbname='.$db_database,$db_usuario,$db_pwd);


$array = [

    "error"=>"",
    "result"=>[ 
        "hello"=>"world"
    ]

    ];
?>