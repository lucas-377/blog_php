<?php

/**
 * Article structure page
 */

require 'config.php';
include 'src/Articles.php';

$article_obj = new Articles($mysql);
$article = $article_obj->getOne($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Meu Blog</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div id="container">
    <h1>
      <?php echo $article['title'] ?>
    </h1>

    <p>
      <?php echo nl2br($article['text']) ?>
    </p>

    <div>
      <a class="botao botao-block" href="index.php">Voltar</a>
    </div>
  </div>
</body>

</html>