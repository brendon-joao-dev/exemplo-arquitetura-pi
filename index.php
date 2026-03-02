<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Arquitetura PI</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <h1>Exemplo com arquivo único</h1>
    </header>
    <section>
        <form method="POST" id="form-funcionario">
            <h2>Funcionário</h2>

            <div class="entrada">
                <label for="nome-funcionario">Nome do funcinário</label>
                <input type="text" name="nome-funcionario" id="nome-funcionario">
            </div>

            <div class="entrada">
                <label for="cargo-funcionario">Cargo do funcionário</label>
                <input type="text" name="cargo-funcionario" id="cargo-funcionario">
            </div>

            <button name="cadastrar-funcionario" id="cadastrar-funcionario" type="submit">Cadastrar</button>
        </form>
        <form action="">
            <h2>Soliciações</h2>

            <div class="entrada">
                <label for="titulo">Título da solicitação</label>
                <input type="text" name="titulo" id="titulo">
            </div>

            <div class="entrada">
                <label for="funcionario">Funcionário relacionado</label>
                <input type="text" name="funcionario" id="funcionario">
            </div>

            <div class="entrada">
                <label for="status">Status da solicitação</label>
                <select name="status" id="status">
                    <option value="Pendente">Pendente</option>
                    <option value="Analise">Em Análise</option>
                    <option value="Concluida">Concluída</option>
                </select>
            </div>

            <button name="cadastrar-solicitacao" id="cadastrar-solicitacao">Cadastrar</button>
        </form>
    </section>

    <!-- Tem que colocar esse script em todas as páginas pra pegar o caminho dela -->
    <script>
      const BASE_URL = "<?= dirname($_SERVER['SCRIPT_NAME']) ?>";
    </script>
    <script type="module" src="public/js/script.js"></script>
</body>
</html>