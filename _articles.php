<?php

class Articles
{
  private $mysql;

  public function __construct(mysqli $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * Return all blog articles
   */
  public function getAll(): array
  {
    $result = $this->mysql->query("SELECT id, titulo as title, conteudo as text FROM artigos");
    $articles = $result->fetch_all(MYSQLI_ASSOC);

    return $articles;
  }
}
