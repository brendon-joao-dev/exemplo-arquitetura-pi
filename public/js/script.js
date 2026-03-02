// Importa a função de enviar
import { enviar } from "./utils/utils.js";

// Recomendo colocar para só carregar o JS depois de apresentar a página (torna carregamento mais rápido)
document.addEventListener("DOMContentLoaded", () => {
    // Pega os botões da página
    const btnFuncionario = document.getElementById("cadastrar-funcionario");
    const btnSolicitacao = document.getElementById("cadastrar-solicitacao");

    // Colocae evento no botão btnFuncionario, tem q ser com função async para usar await ao chamar enviar
    btnFuncionario.addEventListener("click", async (e) => {
        // Tem que bloquear o evento padrão (submit) se não recarrega a página e quebra o resto
        e.preventDefault();
        
        // Pega as entradas da página
        const nomeFuncionario = document.getElementById("nome-funcionario").value;
        const cargoFuncionario = document.getElementById("cargo-funcionario").value;

        // Usa a função enviar() para enviar a requisição pro PHP, enviar() tem que ser chamada com await, usa BASE_URL pra poder pegar o caminho certo
        const resposta = await enviar(`${BASE_URL}/api/criar.php`, { chave: "funcionario", nome: nomeFuncionario, cargo: cargoFuncionario });
        
        // Mostra a requisição no terminal
        // Só pra visualização, não faça isso
        console.log(resposta);
        console.log(resposta.mensagem);
    });

    // Memas coisa de cima mas pro botão btnSolicitacoes
    btnSolicitacao.addEventListener("click", async (e) => {
        e.preventDefault();
        
        const tituloSolicitacao = document.getElementById("titulo").value;
        const funcionarioSolicitacao = document.getElementById("funcionario").value;
        const statusSolicitacao = document.getElementById("status").value;

        const resposta = await enviar(`${BASE_URL}/api/criar.php`, { chave: "solicitacao", titulo: tituloSolicitacao, funcionario: funcionarioSolicitacao, status: statusSolicitacao });
        
        console.log(resposta);
        console.log(resposta.mensagem);
    });
});