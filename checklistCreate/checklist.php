<?php
    require("exe/busca.php");
    session_start(); 
    
    $sqlName = "SELECT nome FROM checklist WHERE id = " . $_GET['idchecklist'];
    $queryName = $conn->query($sqlName);
    $resultName = $queryName->fetch_assoc();
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
        <h1>Checklist - <?= $resultName['nome']; ?></h1>
        <form method="POST" action="exe/criar.php?idchecklist=<?= $_GET['idchecklist']; ?>">
            <input type="text" placeholder="Digite a pergunta:" name="input-info" id="input-info">
            <button id="criar-pergunta-button" type="submit" onclick="redirecionar('checklist.php?idchecklist=<?= $_GET['idchecklist']; ?>')">Adicionar pergunta</button>
        </form>
    </header>

    <main>
        <div id="div-table">
            <table id="tabela-checklist" style="width: 100%;">
                <tr>
                    <th>ID</th>
                    <th>Área</th>
                    <th>Pergunta</th>
                    <th>Resultado</th>
                    <th>Observação</th>
                    <th>Ações</th>
                </tr>
                <?php
                    $idchecklist = $_GET['idchecklist'];
                    buscarPergunta($conn, $idchecklist);
                ?>
            </table>
        </div>

        <div class="footer-buttons">
            <?php
                $sql = "SELECT FK_id_checklist_nc FROM nao_conformidades WHERE FK_id_checklist_nc = " . $_GET['idchecklist'];
                $query = $conn->query($sql);
                if($query->num_rows > 0){ 
            ?>
                <button onclick="redirecionar('../naoConformidadeTable?idchecklist=<?= $_GET['idchecklist']; ?>')">Ver tabela de Não Conformidades</button>
            <?php } else { ?>
                <button onclick="redirecionar('exe/gerarNC.php?idchecklist=<?= $_GET['idchecklist']; ?>')">Gerar Não Conformidades</button>
            <?php } ?>
        </div>
        
    </main>
    <script lang="JavaScript" src="../util.js"></script>
</body>
</html>