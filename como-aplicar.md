Todas as páginas devem estar na raiz do projeto e conter o seguinte bloco de código

```
<script>
    const BASE_URL = "<?= dirname($_SERVER['SCRIPT_NAME']) ?>";
</script>
```

(JavaScript e CSS nessas páginas seram chamados normalmente)

--- 

Para usar módulos do JavaScript (importar algo de um arquivo para outro), contanto que ambos estejam dentro de public/js basta começar o caminho com ./ e direcionar pro arquivo

---

Para importar o banco de dados basta adicionar a seguinte linha ao seu PHP

```
require_once __DIR__ . "/../db/conexao.php";
```

---

Para importar módulos do PHP, contanto que ambos estejam em API, seu require ou include deve ter o seguite caminho:

- __DIR__ - Pega a pasta atual (no caso API)
- . - Concatena a pasta atual com o resto do caminho
- /seu_arquivo.php - Deve começar com / por conta da concatenação com o restante do caminho.

---

É recomendado que os arquivos de JS que seram chamados nas páginas comecem com um eventListener("DOMContenteLoaded") para só carregar o JS depois de apresentar a página e dentro desse da função dele não tenha código bruto, apenas escutas que chamaram funções com o código bruto de acordo com as ações do usuário.

---

Para enviar uma requisição do JS para o PHP basta usar a função enviar e um caminho com a seguinte estrutura:

- ${BASE_URL} - Variável definida na página q chama o JS que dá a ele a URL de onde ele deve continuar o caminho.
- /api/ - Aponta para a pasta do back-end.
- /arquivo.php - Arquivo que deve receber a requisição.

(Esse caminho deve estar entre crases (``) para permitir a injeção do valor da variável BASE_URL)

---