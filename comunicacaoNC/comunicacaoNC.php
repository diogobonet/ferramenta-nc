<?php
    require("../conn.php");
    $sql = "SELECT nc.id AS nao_conformidade_id,
                nc.projeto,
                nc.artefato,
                nc.ja_ocorreu,
                nc.classificacao,
                nc.acao_corretiva,
                i.id AS FK_id_pergunta,
                i.pergunta,
                i.resultado,
                i.observacoes
            FROM nao_conformidades nc
            JOIN itens i ON nc.FK_id_pergunta = i.id
            WHERE nc.id = ". $_GET['idnaoconformidade'] .";
            ";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Comunicação NC</title>
</head>
<body>
    <header>
        <h1>Comunicação NC</h1>
    </header>
    
    <main>
        <table>
            <caption>Solicitação de Resolução de Não Conformidade</caption>
            <tr>
                <th>Código de Controle:</th>
                <td colspan="3"><?= $result['FK_id_pergunta']; ?></td>
            </tr>
            <tr>
                <th>Projeto</th>
                <td colspan="3"><?= $result['projeto']; ?></td>
            </tr>
            <tr>
                <th>Responsável:</th>
                <td>Diogo</td>
                <th>Prazo de Resolução:</th>
                <td>11/2021</td>
            </tr>
            <tr>
                <th>Data da Solicitação:</th>
                <td>03/11/2021</td>
                <th>Nº de Escalonamentos:</th>
                <td>0</td>
            </tr>
            <tr>
                <th>RQA Responsável:</th>
                <td colspan="3">Vinícius</td>
            </tr>
            <tr>
                <th colspan="4"><strong>Você tem 24 horas úteis para contestação.</strong></th>
            </tr>
            <tr>
                <th>Descrição</th>
                <th>Classificação</th>
                <th colspan="2">Ação Corretiva Indicada</th>
            </tr>
            <tr>
                <td><?= $result['pergunta']; ?></td>
                <td><?= $result['classificacao']; ?></td>
                <td colspan="2"><?= $result['acao_corretiva']; ?></td>
            </tr>
            <tr>
                <th>Histórico de Escalonamento</th>
                <th>Superior Responsável</th>
                <th colspan="2">Prazo para Resolução</th>
            </tr>
            <tr>
                <th><strong>Observações:</strong></th>
                <td colspan="3"><?= $result['observacoes']; ?></td>
            </tr>
        </table>

        <div class="footer-buttons">
            <input type="email" name="email" id="email" placeholder="Destinatário">
            <button>Enviar via e-mail</button>
        </div>
    </main>
</body>
</html>