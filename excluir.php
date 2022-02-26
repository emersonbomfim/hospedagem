<?php
require("conexao.php");

@mysqli_select_db($conexao, "imagens_senac");

$id_imagem = $_GET['codigo'];

$excluir = "DELETE FROM tabela_imagem WHERE codigo='$id_imagem' ";

@mysqli_query($conexao, $excluir);

echo 'Imagem excluída com sucesso!';

Header('Location: ver_imagem.php');

?>
