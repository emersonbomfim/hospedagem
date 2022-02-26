<?php
require("conexao.php");

mysqli_select_db($conexao, "imagens_senac");

$id_imagem = $_GET['cod'];

$consulta = "SELECT codigo, imagem FROM tabela_imagem WHERE codigo = '$id_imagem'";

$resultado = mysqli_query($conexao, $consulta);

$imagem = mysqli_fetch_object($resultado);

Header( "Content-type: image/gif");

echo $imagem->imagem;

mysqli_set_charset($conexao, 'utf8');
?>
