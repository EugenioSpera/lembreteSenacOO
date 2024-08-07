<?php
 
require('./config.php');
 
$metodo= strtoupper($_SERVER['REQUEST_METHOD']);
 
if ($metodo==='DELETE') {
 
    parse_str(file_get_contents("php://input"),$delete);
 
    $id = $delete['id'] ?? null;
 
    //para proteger o id de colocarem letras//
    $id = filter_var($id,FILTER_VALIDATE_INT);
        //código delete
        if ($id) {
            $sql=$pdo->prepare("SELECT * FROM lembrete WHERE idLembrete=:id");
            $sql->bindValue(":id",$id);
            $sql->execute();
   
            if ($sql->rowCount()>0) {
       
                $sql = $pdo->prepare("DELETE FROM lembrete WHERE idLembrete=:id");
                $sql->bindValue(":id", $id);
                $sql->execute();
               
                $array['result']='Item excluído com sucesso!';
 
        }
        else {
            $array['error'] = "Erro: Id inexistente!";
        }
    } else {
 
        $array['error'] = "Erro: Id Inválido";
    }
 
} else {
    $array['error'] = "Erro: Ação inválida - método permitido apenas DELETE";
}
 
require('./return.php');

?>