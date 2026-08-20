<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cartas - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif; text-align: center; margin-top: 50px; background: #f4f6f9;
            background-size: cover;          
            background-position: center;     
            background-repeat: no-repeat;    
            background-attachment: fixed;
            background-image: url("https://images3.alphacoders.com/118/thumb-1920-1181595.jpg");
        }   
        .box { 
            background: white;
            width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        a { 
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Coleção de Cartas</h1>
        <p>Escolha uma ação:</p><br>
        <a href="cadastro.php">Cadastrar Nova Carta</a>
        <a href="listar.php">Listar Cartas</a>
    </div>
</body>
</html>