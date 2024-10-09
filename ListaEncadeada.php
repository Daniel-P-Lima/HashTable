<?php

require("Node.php");

class ListaEncadeada {
    private ?Node $Lista;

    public function __construct()
    {
        $this->Lista = null;
    }

    public function vazia() {
        return $this->Lista === null;
    }

    public function insere($chave) {
        if($this->vazia()) {
            $this->Lista = new Node($chave);
            return;
        }
        $ponteiro = $this->Lista;
        while($ponteiro->__get('proximo') != null) {
            $ponteiro = $ponteiro->__get('proximo');
        }
        $novoNo = new Node($chave);
        $ponteiro->__set('proximo', $novoNo);
    }

    public function imprimeLista() {
        $ponteiro = $this->Lista;
        while ($ponteiro != null) {
            echo $ponteiro->__get('chave') . "\n";
            $ponteiro = $ponteiro->__get('proximo'); 
        }
    } 
}
