<?php

/**
 * Redirect to prevent post loop
 */
function redirect(string $url): void
{
  header("Location: $url");
  die();
}
