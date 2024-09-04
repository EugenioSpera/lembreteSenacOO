<?php


namespace Applembretes\Dao;

use Applembretes\Models\Lembrete;
use Applembretes\Dao\ILembreteDao;
use PDO;

class LembreteDaoMySql implements ILembreteDao{

    private $pdo;


            //Esse PDO vem de fora
    public function __construct(PDO $pdo){

        $this->pdo = $pdo;

    }

    public function addLembrete(Lembrete $lembrete){

        $sql=$this->$pdo->prepare("INSERT INTO lembrete (tituloLembrete,corpoLembrete) VALUES (:titulo, :corpo)");
        $sql->bindValue(":titulo",$lembrete->getTitulo());
        $sql->bindValue(":corpo",$lembrete->getCorpo());
        $sql->execute();
        $lembrete->setId($this->$pdo->lastInsertId());
        return $lembrete;


    }

    public function removeLembrete(int $id) : bool{

        $sql = $this->pdo->prepare("DELETE FROM lembrete WHERE idLembrete=:id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;

        

    } 


    
}




?>