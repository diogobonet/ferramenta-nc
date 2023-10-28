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
            this.tabela.innerHTML += `<tr class="perguntas-tr"><td class="checkbox-td"><h5>1</h5></td><td>Titulo</td><td><div class="input-container"><input class="td-input" type="text" value="${pergunta}"></div></td><td>Sim ☝</td><td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td><td class="action-edit"><a href="">Editar</a><a href="">Excluir</a></td></tr>`
            this.perguntaInput.value = "";
        }

    }
}

/*

<tr class="perguntas-tr"><td class="checkbox-td"><h5>1</h5></td><td>Titulo</td><td>O título foi definido e está de acordo com o projeto?</td><td>Sim ☝</td><td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td><td class="action-edit"><a href="">Editar</a><a href="">Excluir</a></td></tr>

*/

