<?php

require ('./config.php');

$metodo = strtoupper($_SERVER['REQUEST_METHOD']);

if ($metodo === 'PUT') {

    parse_str(file_get_contents("php://input"), $put);

    $id = $put['id'] ?? null;
    $titulo = $put['titulo'] ?? null;
    $corpo = $put['corpo'] ?? null;

    $id = filter_var($id,FILTER_VALIDATE_INT);
    $titulo = filter_var($titulo,FILTER_SANITIZE_FULL_SPECIAL_CHARS); //sanitize limpa o codigo, não mostrando os caracteres especiais 
    $corpo = filter_var($corpo,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($id && $titulo && $corpo) {

        $sql = $pdo->prepare("SELECT * FROM lembrete WHERE idLembrete=:id.");
        $sql->bindValue(":id", $id);        
        $sql->execute();

        if ($sql->rowCount()>0) {
            
            $sql = $pdo->prepare("UPDATE lembrete SET tituloLembrete=:titulo, corpoLembrete=:corpo WHERE idLembrete=:id");

            

        $sql->bindValue(":id", $id);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":corpo", $corpo);
        $sql->execute();

        $array['result']= [
            "id" => $id,
            "tituloLembrete" => $titulo,
            "corpoLembrete" => $corpo
        ];


        } else {

            $array['error'] = 'Erro: id inexistente!';
        }

    } else {
        $array['error'] = "Erro: Id nulo ou inválido!";

    }
} else {

    $array['error'] = "Erro: Ação inválida - método permitido apenas PUT";
}

require ('./return.php');


?>