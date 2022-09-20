<?php

/**
 * Delete article page
 */

require '../config.php';
include '../src/Articles.php';
require '../src/redirect.php';

// Remove article from database only if method is post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article = new Articles($mysql);
    $article->deleteArticle($_POST['id']);

    // Post redirect Get
    redirect('index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>