<?php
    require ("../conn.php");

    function verificarSession(){
        return isset($_SESSION["email_logado"]);
    }

    function buscarNaoConformidades($conn, $idchecklist) {
        if(verificarSession()){
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
                    WHERE nc.FK_id_checklist_nc = '$idchecklist';";
    
            $query = $conn->query($sql);
            if($query->num_rows > 0){
                
                while($result = $query->fetch_assoc()){
                    $selectedSelecionar = ""; $selectedSim = "";
                    $selectedNao        = ""; $selectedNA  = "";
 
                    if($result['ja_ocorreu'] == "Selecionar") {
                        $selectedSelecionar = "selected";
                    }
                    elseif($result['ja_ocorreu'] == "Sim") {
                        $selectedSim = "selected";
                    }
                    elseif($result['ja_ocorreu'] == "Não") {
                        $selectedNao = "selected";
                    }
                    else {
                        $selectedNA = "selected";
                    }

                    $selectedSelecionar = ""; $selectedAlta = "";
                    $selectedMedia        = ""; $selectedBaixa  = "";
 
                    if($result['classificacao'] == "Selecionar") {
                        $selectedSelecionar = "selected";
                    }
                    elseif($result['classificacao'] == "Alta - 2 dias") {
                        $selectedAlta = "selected";
                    }
                    elseif($result['classificacao'] == "Média - 3 dias") {
                        $selectedMedia = "selected";
                    }
                    else {
                        $selectedBaixa = "selected";
                    }

                    echo "
                    <tr class='perguntas-tr'>
                    <form action='exe/atualizar.php?idnaoconformidade=". $result['nao_conformidade_id'] ."&idchecklist=". $idchecklist ."' method='POST'>
                        <td>". $result['FK_id_pergunta'] ."</td> <!-- ID -->
                        <td style='width: 10%;'> <!-- Projeto -->
                            <textarea name='input-projeto' class='textarea-input' id='input-projeto' type='text'>" . $result['projeto'] . "</textarea>
                        </td>
                        <td style='width: 10%;'> <!-- Artefato -->
                            <textarea name='input-artefato' class='textarea-input' id='input-artefato' type='text'>" . $result['artefato'] . "</textarea>
                        </td>
                        <td>". $result['pergunta'] ."</td> <!-- Descrição -->
                        <td style='width: 5%;'> <!-- Já ocorreu -->
                            <select name='input-ja-ocorreu' id='input-ja-ocorreu'>  
                                <option value='Selecionar' $selectedSelecionar>Selecionar</option>
                                <option value='Sim' $selectedSim>Sim</option>
                                <option value='Não' $selectedNao>Não</option>
                                <option value='N/A' $selectedNA>N/A</option>
                            </select>
                        </td>
                        <td>". $result['observacoes'] ."</td> <!-- Observações -->
                        <td style='width: 5%;'> <!-- Classificação -->
                            <select name='input-classificacao' id='input-classificacao'>  
                                <option value='Selecionar' $selectedSelecionar>Selecionar</option>
                                <option value='Alta - 2 dias' $selectedAlta>Alta - 2 dias</option>
                                <option value='Média - 3 dias' $selectedMedia>Média - 3 dias</option>
                                <option value='Baixa - 4 dias' $selectedBaixa>Baixa - 4 dias</option>
                            </select>
                        </td>
                        <td style='width: 10%;'> <!-- Ação corretiva -->
                            <textarea name='input-acao-corretiva' class='textarea-input' id='input-acao-corretiva' type='text'>" . $result['acao_corretiva'] . "</textarea>
                        </td>
                        <td>
                            <button>Salvar</button>
                            <a href='../comunicacaoNC/comunicacaoNC.php?idnaoconformidade=". $result['nao_conformidade_id'] ."&idchecklist=". $idchecklist ."'>Gerar Comunicado</a>
                        </td> <!-- Ação corretiva -->
                    </form>
                    </tr>
                    ";
                }
            }else{
                echo "<h1>Nenhuma não conformidade gerada até agora!</h1>";
            }
        }
    }
?>