<?php

/**
 * Admin home page
 */

require '../config.php';
include '../src/Articles.php';

$articles = new Articles($mysql);
$articles = $articles->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>

        <div>
            <?php foreach ($articles as $article) : ?>
                <div id="artigo-admin">
                    <p><?= $article["title"] ?></p>
                    <nav>
                        <a class="botao" href="./editar-artigo.html?id=<?= $article['id']; ?>">Editar</a>
                        <a class="botao" href="./excluir-artigo.html?id=<?= $article['id']; ?>">Excluir</a>
                    </nav>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="botao botao-block" href="./adicionar-artigo.php">Adicionar Artigo</a>
    </div>
</body>

</html>