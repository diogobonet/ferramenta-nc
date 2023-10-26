<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Tabela - Ferramenta Não Conformidade</title>
</head>
<body>
    <header>
        <h1>Ferramenta de Não Conformidade - Tabela</h1>
        <h3>Usuário: <?= $_SESSION['nome_logado'] ?></h3>
    </header>

    <main>
        <table style="width: 100%;">
            <tr>
                <th>Checklist</th>
                <th>Área</th>
                <th>Pergunta</th>
                <th>Resultado</th>
                <th>Ações</th>
            </tr>
            <tr style="width: 100%;">
                <td>
                    <input type="checkbox" name="" id=""> <!-- Checkbox -->
                </td>
                 <td>Titulo</td> <!-- Area -->
                <td>O título foi definido e está de acordo com o projeto?</td> <!-- Pergunta -->
                <td>Sim</td> <!-- Resultado -->
                <td class="action-edit">
                    <a href="">Editar</a>
                    <a href="">Excluir</a>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>