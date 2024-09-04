<?php

namespace Applembretes\Models;

class Lembrete{

    private int $id;

    private string $titulo;

    private string $corpo;


    public function __construct(int $id = null, string $titulo,  string $corpo){

        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setCorpo($corpo);       


    }



    
        public function setTitulo($titulo): self
        {
                $this->titulo = $titulo;

                return $this;
        }
   


  
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

   

    public function getTitulo(): string
    {
        return $this->titulo;
    }


    
    public function getCorpo(): string
    {
        return $this->corpo;
    }



    public function setCorpo(string $corpo): self
    {
        $this->corpo = $corpo;

        return $this;
    }


    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}


?>