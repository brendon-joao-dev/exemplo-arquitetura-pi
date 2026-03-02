<?php
// Configura para poder receber requisições
header("Content-Type: application/json");

// Conecta com banco de dados
require "../db/conexao.php";

// Recebe qualquer requisição que for enviada para cá
$requisicao = json_decode(file_get_contents("php://input"), true);

// Verifica se a requisição existe e se nela existe uma chave
if (!$requisicao || !isset($requisicao["chave"])) {
    echo json_encode(["status" => "erro", "mensagem" => "Requisição vazia ou sem chave!"]);
} else {
    // Pega a chave enviada na requisição
    $chave = $conn->real_escape_string($requisicao["chave"]);

    // Verifica o valor da chave
    switch ($chave) {
        // Para a chave funcionario
        case "funcionario":
            // Pega os valores enviados na requisição
            $nome = $conn->real_escape_string($requisicao["nome"]);
            $cargo = $conn->real_escape_string($requisicao["cargo"]);

            // Query sql para inserir funcionário
            $sql = "INSERT INTO funcionarios (nome, cargo) VALUES ('$nome', '$cargo')";

            // Verifica se é possível rodar a query
            if ($conn->query($sql)) {
                // Se sim envia essa mensagem
                echo json_encode(["status" => "ok", "mensagem" => "Funcionário cadastrado com sucesso!"]);
            } else {
                // Se não envia essa mensagem
                echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar: " . $conn->error]);
            }
            break;
        // Mesma coisa de cima pra chave solicitacao
        case "solicitacao":
            $titulo = $conn->real_escape_string($requisicao["titulo"]);
            $funcionario = $conn->real_escape_string($requisicao["funcionario"]);
            $status = $conn->real_escape_string($requisicao["status"]);

            $sql = "INSERT INTO solicitacoes (titulo, funcionario, status) VALUES ('$titulo', '$funcionario', '$status')";

            if ($conn->query($sql)) {
                echo json_encode(["status" => "ok", "mensagem" => "Solicitação cadastrada com sucesso!"]);
            } else {
                echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar: " . $conn->error]);
            }
            break;
        default:
            echo json_encode(["status" => "erro", "mensagem" => "Erro na chave: chave enviada não existe!"]);
    } 
}
?>