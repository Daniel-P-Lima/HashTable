<?php

class Node {
    private int $chave;
    private ?Node $proximo;


    public function __construct($chave) {   
        $this->chave = $chave;
        $this->proximo = null;
    }
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
    
}


?>