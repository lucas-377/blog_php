<?php

/**
 * Update article page
 */

require '../config.php';
include '../src/Articles.php';
require '../src/redirect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article = new Articles($mysql);
    $article->updateArticle($_POST['id'], $_POST['titulo'], $_POST['conteudo']);

    // Post redirect Get
    redirect('index.php');
}

$article = new Articles($mysql);
$art = $article->getOne($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?= $art['title']; ?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo">
                    <?= $art['text']; ?>
                </textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?= $art['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>