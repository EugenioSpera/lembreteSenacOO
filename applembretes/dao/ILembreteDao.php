<?php


namespace Applembretes\Dao;

use Applembretes\Models\Lembrete;
interface ILembreteDao{

    public function addLembrete(Lembrete $lembrete);
    public function removeLembrete(int $id);

    public function updateLembrete(Lembrete $lembrete);

}

?>