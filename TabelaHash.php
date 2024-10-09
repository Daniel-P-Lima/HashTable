<?php 
    require("ListaEncadeada.php");

    class TabelaHash {
        private array $tabela;
        private int $colisao;




        public function __construct(int $tamanho)
        {
            $this->tabela = array_fill(0, $tamanho, null);
            for ($i = 0; $i < $tamanho; $i++) {
                $this->tabela[$i] = new ListaEncadeada();
            }
            $this->colisao = 0;
        }

        public function hash(int $chave) {
            return $chave % count($this->tabela);
        }

        public function insere($chave) {
            $indice = $this->hash($chave);
            if(!$this->tabela[$indice]->vazia()) {
                $this->colisao++;
            }   
            $this->tabela[$indice]->insere($chave);
        }

        public function imprimeTabela() {
            $tamanhoTabela = count($this->tabela);
            for($i = 0; $i < $tamanhoTabela; $i++) {
                echo "Índice $i: ";
                if($this->tabela[$i]->vazia()) {
                    echo "-1 <br/>";
                }
                else {
                    $this->tabela[$i]->imprimeLista(); 
                    echo "<br/>";
                }
            }
            echo "Total de colisões: " . $this->colisao . "<br/>";
        }


        public function popular() {
            $tamanhoReduzido = count($this->tabela) * 0.9;
            for ($i = 0; $i < $tamanhoReduzido; $i++) {
                $numeroAleatorio = random_int(0, 1000000);
                $this->insere($numeroAleatorio);
            }
        }

        public function busca($chave) {
            $tamanhoTabela = count($this->tabela);
            for ($i = 0; $i < $tamanhoTabela; $i++) {
                if($this->tabela[$i]->contem($chave)) {
                    echo "O elemento foi encontrado! <br/>";
                    return true;
                }
            }
            echo "O elemento não foi encontrado! <br/>";
            return false;
        }
    }



?>