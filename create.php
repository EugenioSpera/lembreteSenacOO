
<?php

 
require('./config.php');

use Applembretes\Models\Lembrete;
use Applembretes\Dao\LembreteDaoMySql;
 
$metodo= strtoupper($_SERVER['REQUEST_METHOD']);
 
if ($metodo==='POST') {
 
    $titulo = filter_input(INPUT_POST,'titulo');
    $corpo = filter_input(INPUT_POST,'corpo');
 
    if ($titulo && $corpo) {
 
       $meuLembrete = new Lembrete(null,$titulo,$corpo);
       $meuLembreteDAOMySql = new LembreteDAOMySql($pdo);
       $novoLembrete=$meuLembreteDAOMySql->addLembrete($meuLembrete);

       $array['result'] = [

        "id" => $novoLembrete->getId(),
        "tituloLembrete" => $novoLembrete->getTitulo(),
        "corpoLembrete" => $novoLembrete->getCorpo()
       ];
        



 
    } else {
        $array['error'] = 'Erro: Valores nulos ou inválidos';
    }
 
} else {
    $array['error'] = "Erro: Ação inválida - método permitido apenas POST";
}
 
require('./return.php');


 /*
- Como faço para pegar o id do último item inserido na tabela através do PDO
- Como retornar um array(json) contendo os dados do último elemento inserido
*/
?>