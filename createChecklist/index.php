<?php
    require("exe/getChecklists.php");
    session_start(); 

    if (!isset($_SESSION['usuario_logado'])) {
        header('Location: ../login/login.php');
        exit;
    }
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
        <h1>Criar - Checklist</h1>
        <form method="POST" action="exe/createTable.php">
            <input type="text" placeholder="Digite o nome da checklist:" name="input-checklist-name" id="input-info">
            <button id="criar-pergunta-button" type="submit">Adicionar checklist</button>
        </form>
    </header>

    <main>
        <div id="div-table">
            <table id="tabela-checklist" style="width: 100%;">
                <tr>
                    <th>ID</th>
                    <th>Checklist</th>
                    <th>Ações</th>
                </tr>
                <?php getChecklists($conn); ?>
            </table>
        </div>
    </main>
    <script lang="JavaScript" src="js/Tabela.js"></script>
</body>
</html>