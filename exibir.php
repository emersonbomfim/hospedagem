<?php

require("conexao.php");

@mysqli_select_db($conexao, "imagens_senac");

$select = "SELECT * FROM tabela_imagem";

$result = mysqli_query($conexao, $select);

$row = mysqli_fetch_object($result);

echo "<img src='pesquisar_imagem.php?cod=$row->codigo' \">";
 
mysqli_set_charset($conexao, 'utf8');

?>