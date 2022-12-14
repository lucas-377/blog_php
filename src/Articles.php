<?php

class Articles
{
  private $mysql; // Database connection object

  /**
   * Create database connection object on class instantiation
   */
  public function __construct(mysqli $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * Return all blog articles from database
   */
  public function getAll(): array
  {
    $result = $this->mysql->query("SELECT id, titulo as title, conteudo as text FROM artigos");
    $articles = $result->fetch_all(MYSQLI_ASSOC);

    return $articles;
  }

  /**
   * Return a single blog article from database
   */
  public function getOne(string $id): array
  {
    // Prepare query to prevent mysql injections
    $result = $this->mysql->prepare(
      "SELECT id, titulo as title, conteudo as text FROM artigos WHERE id = ?"
    );

    $result->bind_param('s', $id);
    $result->execute();
    $result = $result->get_result()->fetch_assoc();

    return $result;
  }

  /**
   * Create new article on database
   */
  public function createArticle(string $title, string $text): void
  {
    $result = $this->mysql->prepare(
      "INSERT INTO artigos (titulo, conteudo) VALUES(?,?)"
    );

    $result->bind_param('ss', $title, $text);
    $result->execute();
  }

  /**
   * Delete article from database
   */
  public function deleteArticle(string $id): void
  {
    $result = $this->mysql->prepare(
      "DELETE FROM artigos WHERE id = ?"
    );

    $result->bind_param('s', $id);
    $result->execute();
  }

  /**
   * Update article from database
   */
  public function updateArticle(string $id, string $title, string $text): void
  {
    $result = $this->mysql->prepare(
      "UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?"
    );

    $result->bind_param('sss', $title, $text, $id);
    $result->execute();
  }
}
