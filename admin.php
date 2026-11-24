
<?php
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo | IA Notícias</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #101820;
            color: white;
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        header {
            background: linear-gradient(135deg, #008c99, #00b8c9);
            padding: 40px 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 35px;
        }

        header h1 {
            margin-bottom: 10px;
        }

        .opcoes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .card {
            background: #1c2933;
            padding: 30px;
            border-radius: 12px;
        }

        .card h2 {
            color: #00d4e5;
            margin-bottom: 15px;
        }

        .card p {
            color: #ccc;
            line-height: 1.5;
            margin-bottom: 22px;
        }

        .botao {
            display: inline-block;
            background: #00b8c9;
            color: #101820;
            padding: 12px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .voltar {
            display: inline-block;
            margin-top: 30px;
            color: #00d4e5;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <header>
        <h1>IA NOTÍCIAS</h1>
        <p>Painel administrativo</p>
    </header>

    <h2>Bem-vindo à administração!</h2>

    <br>

    <div class="opcoes">

        <div class="card">
            <h2>Gerenciar notícias</h2>
            <p>Visualize, edite e exclua as notícias cadastradas.</p>

            <a href="listar.php" class="botao">
                Acessar notícias
            </a>
        </div>

        <div class="card">
            <h2>Cadastrar notícia</h2>
            <p>Adicione novas notícias ao banco de dados.</p>

            <a href="cadastrar.php" class="botao">
                Nova notícia
            </a>
        </div>

    </div>

    <a href="index.html" class="voltar">
        Voltar ao site principal
    </a>

</div>

</body>
</html>
