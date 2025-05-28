<?php
    // Bloco PHP para conexão com o banco de dados e busca dos pacientes
    try {
        $conexao = new PDO(
            "mysql:dbname=clinica; host=localhost", "root", "ceub123456",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") // Garante a codificação UTF-8
        );
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro para exceções
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }

    // Processar o formulário quando ele for submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'] ?? '';
        $idade = $_POST['idade'] ?? '';
        $cidade = $_POST['cidade'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $doenca = $_POST['doenca'] ?? '';

        // Validação básica (adicione mais validações conforme necessário)
        if (empty($nome) || empty($idade) || empty($cpf)) {
            $mensagem = '<div class="alert alert-danger" role="alert">Por favor, preencha todos os campos obrigatórios (Nome, Idade, CPF).</div>';
        } else {
            try {
                $stmt = $conexao->prepare("INSERT INTO pacientes (nome, idade, cidade, cpf, doenca) VALUES (:nome, :idade, :cidade, :cpf, :doenca)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':idade', $idade);
                $stmt->bindParam(':cidade', $cidade);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':doenca', $doenca);

                if ($stmt->execute()) {
                    $mensagem = '<div class="alert alert-success" role="alert">Paciente cadastrado com sucesso!</div>';
                    // Opcional: Redirecionar após o sucesso para evitar reenvio do formulário
                    header('Location: index.php?status=success_insert');
                    exit();
                } else {
                    $mensagem = '<div class="alert alert-danger" role="alert">Erro ao cadastrar paciente.</div>';
                }
            } catch (PDOException $e) {
                // Erro mais detalhado para depuração, remova em produção
                $mensagem = '<div class="alert alert-danger" role="alert">Erro: ' . $e->getMessage() . '</div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Paciente - Clínica Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5 p-4 bg-white rounded shadow">
        <h1 class="text-center text-primary mb-4">
            <i class="bi bi-person-plus-fill me-2"></i> Cadastrar Novo Paciente
        </h1>

        <?php if (isset($mensagem)) { echo $mensagem; } ?>

        <form action="inserir.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="idade" class="form-label">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" required min="0">
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required placeholder="Ex: 123.456.789-00">
            </div>
            <div class="mb-3">
                <label for="doenca" class="form-label">Doença:</label>
                <input type="text" class="form-control" id="doenca" name="doenca">
            </div>
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-save-fill me-2"></i> Cadastrar
                </button>
                <a href="index.php" class="btn btn-secondary btn-lg">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i> Voltar para a Lista
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>