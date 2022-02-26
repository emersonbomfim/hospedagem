<?php
require_once("conexao.php");

mysqli_select_db($conexao, "imagens_senac");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Armazenando imagens no banco de dados Mysql</title>
</head>
<body>
    <h2>Selecione um novo arquivo de imagem</h2>
    <form enctype="multipart/form-data" action="upload.php" method="post">
    <div><label> NOME DA IMAGEM <BR><input name="nome_evento" type="text" /></label></div><BR>
        <div><label> DESCRIÇÃO DA IMAGEM <BR><input name="descricao_evento" type="textarea" /></label></div><BR>
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
        <div><input name="imagem" type="file" /></div><BR>
        <div><input type="submit" value="Salvar" /></div>
    </form>
    <br />
    <table border="2">
        <tr>
            <td align="center">
                Código
            </td>
            <td align="center">
                Evento
            </td>
            <td align="center">
                Descrição
            </td>
            <td align="center">
                Nome da imagem
            </td>
            <td align="center">
                Tamanho
            </td>
            <td align="center">
                Tipo de Arquivo
            </td>
            <td align="center">
                Visualizar imagem
            </td>
            <td align="center">
                Excluir imagem
            </td>
        </tr>
        <?php
        $querySelecao = "SELECT codigo, evento, descricao,
    nome_imagem, tamanho_imagem, tipo_imagem, imagem FROM tabela_imagem";
        $resultado = mysqli_query($conexao, $querySelecao);
        while ($aquivos = mysqli_fetch_array($resultado)) { ?>
            <tr>
                <td align="center">
                    <?php echo $aquivos['codigo']; ?>
                </td>
                <td align="center">
                    <?php echo $aquivos['evento']; ?>
                </td>
                <td align="center">
                    <?php echo $aquivos['descricao']; ?>
                </td>
                <td align="center">
                    <?php echo $aquivos['nome_imagem']; ?>
                </td>
                <td align="center">
                    <?php echo $aquivos['tamanho_imagem']; ?>
                </td>
                <td align="center">
                    <?php echo $aquivos['tipo_imagem']; ?>
                </td>
                <td align="center">
                    <?php echo '<a href="exibir.php?id=' . $aquivos['codigo'] .
                        '">Imagem ' . $aquivos['codigo'] . '</a>';                   
                    ?>
                </td>
                <td align="center">
                    <?php echo '<a href="excluir.php?id=' . $aquivos['codigo'] .
                        '">Imagem ' . $aquivos['codigo'] . '</a>'; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
