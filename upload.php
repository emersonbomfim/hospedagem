<?php
require("conexao.php");

mysqli_select_db($conexao, "imagens_senac");

$nomeEvento = $_POST['nome_evento'];
$descricaoEvento = $_POST['descricao_evento'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];

if ($imagem != "none") {
    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);

    $queryInsercao = "INSERT INTO tabela_imagem (evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem, imagem) VALUES ('$nomeEvento', '$descricaoEvento','$nome','$tamanho', '$tipo','$conteudo')";

    mysqli_query($conexao, $queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");

    echo 'Registro inserido com sucesso!';

    header('Location: ver_imagem.php');

    if (mysqli_affected_rows($conexao) > 0)
        print "A imagem foi salva na base de dados.";
    else
        print "Não foi possível salvar a imagem na base de dados.";
} else
    print "Não foi possível carregar a imagem.";
?>
