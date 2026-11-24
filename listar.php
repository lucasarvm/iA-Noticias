
<?php
require_once "conexao.php";

$sql = "SELECT * FROM noticias ORDER BY id DESC";
$stmt = $pdo->query($sql);
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Notícias | IA Notícias</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #101820;
            color: #fff;
            padding: 30px;
        }

        header {
            background: linear-gradient(135deg, #008c99, #00b8c9);
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 30px;
        }

        header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        header p {
            color: #e8ffff;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .botao {
            display: inline-block;
            background: #00b8c9;
            color: #101820;
            padding: 12px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .botao:hover {
            background: #fff;
        }

        .noticia {
            background: #1c2933;
            padding: 22px;
            border-radius: 10px;
            margin-bottom: 18px;
            border-left: 4px solid #00b8c9;
        }

        .noticia h2 {
            color: #00d4e5;
            margin-bottom: 12px;
        }

        .categoria {
            color: #aaa;
            margin-bottom: 12px;
        }

        .conteudo {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .acoes {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .editar {
            background: #00b8c9;
        }

        .excluir {
            background: #dc3545;
            color: white;
        }

        .vazio {
            text-align: center;
            background: #1c2933;
            padding: 30px;
            border-radius: 10px;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <header>
        <h1>IA NOTÍCIAS</h1>
        <p>Painel de gerenciamento de notícias</p>
    </header>

    <div class="topo">
        <h2>Notícias cadastradas</h2>

        <a href="cadastrar.php" class="botao">
            + Nova notícia
        </a>
    </div>

    <?php if (count($noticias) > 0): ?>

        <?php foreach ($noticias as $noticia): ?>

            <div class="noticia">

                <h2>
                    <?php echo htmlspecialchars($noticia["titulo"]); ?>
                </h2>

                <p class="categoria">
                    Categoria:
                    <?php echo htmlspecialchars($noticia["categoria"]); ?>
                </p>

                <p class="conteudo">
                    <?php echo nl2br(htmlspecialchars($noticia["conteudo"])); ?>
                </p>

                <div class="acoes">

                    <a class="botao editar"
                       href="editar.php?id=<?php echo $noticia['id']; ?>">
                        Editar
                    </a>

                    <form action="excluir.php" method="POST"
                          onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?');">

                        <input type="hidden" name="id"
                               value="<?php echo $noticia['id']; ?>">

                        <button type="submit" class="botao excluir">
                            Excluir
                        </button>

                    </form>

                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="vazio">
            <h2>Nenhuma notícia cadastrada</h2>
            <p>Comece cadastrando sua primeira notícia!</p>
        </div>

    <?php endif; ?>

    <a href="index.html" class="botao">Voltar ao site</a>

</div>

</body>
</html>
