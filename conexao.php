<?php
//conectar banco de dados

$conexao = MySQLi_connect("localhost","root","123");

if (!$conexao){
    die('nao foi possivel conectar ao banco de dados 
            Erro detectado '.MySQLi_connect_error());
}

mysqli_set_charset($conexao, 'utf8');

?>