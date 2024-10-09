<?php 
    require("TabelaHash.php");
    $tabelaHash = new TabelaHash(100);

    $tabelaHash->popular();
    $tabelaHash->imprimeTabela();
    $tabelaHash->busca(22);
?>