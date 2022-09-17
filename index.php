<?php

require 'config.php';
include '_articles.php';

$articles = new Articles($mysql);
$articles = $articles->getAll();
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
        <h1>Blog</h1>

        <?php foreach ($articles as $article) : ?>
            <h2>
                <a href="<?php echo $article["link"] ?>">
                    <?php echo $article["title"] ?>
                </a>
            </h2>

            <p>
                <?php echo $article["text"] ?>
            </p>
        <?php endforeach; ?>
    </div>
</body>

</html>