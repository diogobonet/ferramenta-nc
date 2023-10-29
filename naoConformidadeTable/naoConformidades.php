<?php
    require("exe/busca.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Ferramenta de Não Conformidades</title>
</head>
<body>
    <header>
        <h1>Ferramenta de Não Conformidade</h1>
    </header>

    <main>
        <table id="tabela-checklist" style="width: 100%;">
            <tr>
                <th>ID</th>
                <th>Projeto</th>
                <th>Artefato</th>
                <th>Descrição</th>
                <th>Já ocorreu</th>
                <th>Observações</th>
                <th>Classificação</th>
                <th>Ação corretiva</th>
                <th>Ação</th>
            </tr>

            <?php 
                $idchecklist = $_GET['idchecklist'];
                buscarNaoConformidades($conn, $idchecklist);
            ?>
        </table>
        <div class="footer-buttons">
            <button onclick="redirecionar('../checklist/checklist.php?idchecklist=<?= $idchecklist ?>')">Voltar</button>
        </div>
    </main>
    <script lang="JavaScript" src="../util.js"></script>
    <script lang="JavaScript" src="js/Tabela.js"></script>
    <script> tabela = new Tabela(); </script>
</body>
</html>