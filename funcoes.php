<?php
$conn = new mysqli(
    '127.0.0.1',
    'root',
    '',
    'meu_banco'
);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = 'SELECT id, nome, email, senha FROM usuarios';
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        text-align: center; /* Centraliza textos e elementos inline */
    }

    /* Centraliza a tabela na tela */
    table {
        margin: 0 auto; /* O 'auto' nas laterais joga a tabela para o centro */
        border-collapse: collapse;
        width: 60%; /* Largura da tabela */
        border-radius: 6px;
    }

    th, td {
        padding: 10px;
        text-align: left; /* Mantém o texto de dentro das células alinhado à esquerda para leitura */
    }

    .content {
        margin-top: 20px;
    }
    </style>
</head>
<body>
    
<div class="content">
    <h2>Usuários</h2>
    <a href="cadastro.php">Cadastrar usuário</a>
</div>

<br><br>

<table class="table" border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php 
    // Verifica se a consulta foi bem-sucedida e se existem registros
    if ($resultado && $resultado->num_rows > 0) {
        foreach ($resultado as $usuario) { 
    ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $usuario['id'] ?>">Excluir</a>
                </td>
            </tr>
    <?php 
        } 
    } else {
        echo "<tr><td colspan='4'>Nenhum usuário cadastrado ou tabela não encontrada.</td></tr>";
    } 
    ?>
</table>

</body>
</html>