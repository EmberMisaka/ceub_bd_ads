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

    try {
        $sql = $conexao->query("SELECT * FROM pacientes ORDER BY nome ASC"); // Ordena por nome
        $sql->execute();
        $pacientes = $sql->fetchAll(PDO::FETCH_ASSOC); // Busca como array associativo
    } catch (PDOException $e) {
        die("Erro ao buscar pacientes: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes - Clínica Médica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center header-title">
            <i class="bi bi-person-lines-fill me-2"></i> Lista de Pacientes
        </h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="inserir.php" class="btn btn-success btn-lg btn-action">
                <i class="bi bi-person-plus-fill"></i>
                Novo Paciente
            </a>
        </div>

        <?php if (empty($pacientes)): ?>
            <div class="alert alert-info text-center" role="alert">
                Nenhum paciente cadastrado no momento.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Cód. Paciente</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Doença</th>
                            <th scope="col" class="text-center">Ações</th> </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pacientes as $paciente) { ?>
                            <tr>
                                <td data-label="Cód. Paciente"><?php echo htmlspecialchars($paciente['codp']) ?></td>
                                <td data-label="Nome"><?php echo htmlspecialchars($paciente['nome']) ?></td>
                                <td data-label="Idade"><?php echo htmlspecialchars($paciente['idade']) ?></td>
                                <td data-label="Cidade"><?php echo htmlspecialchars($paciente['cidade']) ?></td>
                                <td data-label="CPF"><?php echo htmlspecialchars($paciente['cpf']) ?></td>
                                <td data-label="Doença"><?php echo htmlspecialchars($paciente['doenca']) ?></td>
                                <td data-label="Ações" class="text-center">
                                    <a href="excluir.php?codp=<?php echo $paciente['codp']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Tem certeza que deseja excluir o paciente <?php echo htmlspecialchars($paciente['nome']); ?>?');"
                                       title="Excluir Paciente">
                                        <i class="bi bi-trash-fill"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>