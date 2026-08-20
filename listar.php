<?php
require_once "conexao.php";
require_once "funcoes.php";

$sql = "SELECT id, nome, qualidade, quantidade, raridade, preco FROM usuarios";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cartas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-image:url('https://images.pluto.tv/channels/687007a8ee4155e89a8f6d67/featuredImage_1780328988756.jpg?auto=&q=70&fit=fill&fill=blur&ixlib=react-9.1.5&h=1080&w=1920');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%; background: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th { 
            background-color: #ffd900;
            color: white;
        }
        .content{
            margin-top: 20px;
        }  
        a.btn {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            background: #ffd900;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="content">
    <h2>Coleção de Cartas</h2><br>
    <a href="cadastro.php" class="btn">Cadastrar Nova Carta</a>
    <a href="index.php" class="btn" style="background:#6c757d;">Início</a>
</div>

<br>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Qualidade</th>
        <th>Quantidade</th>
        <th>Raridade</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>

    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <?php while($usuario = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= escape($usuario['id']) ?></td>
                <td><?= escape($usuario['nome']) ?></td>
                <td><?= escape($usuario['qualidade']) ?></td>
                <td><?= escape($usuario['quantidade']) ?></td>
                <td><?= escape($usuario['raridade']) ?></td>
                <td>R$ <?= number_format($usuario['preco'], 2, ',', '.') ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario['id'] ?>">Editar</a> | 
                    <a href="excluir.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="7">Nenhuma carta cadastrada.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>