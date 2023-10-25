class Tabela{
    constructor(){
        this.tabela = document.getElementById("tabela-checklist");
        this.criarPerguntaBotao = document.getElementById("criar-pergunta-button");
        this.perguntaInput = document.getElementById("input-info");

        const self = this;

        this.criarPerguntaBotao.addEventListener('click', (e)=>{
            e.preventDefault();
            self.adicionarPergunta();
        });
        
    }

    adicionarPergunta(){
        let pergunta = this.perguntaInput.value;

        if(pergunta != ''){
            this.tabela.innerHTML += `<tr class='perguntas-tr'><td><input type='checkbox' name='' id=''></td><td>Titulo</td><td>${pergunta}</td><td>Sim</td><td class='action-edit'><a href=''>Editar</a><a href=''>Excluir</a></td></tr>`
            this.perguntaInput.value = "";
        }

    }
}

/*

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

*/