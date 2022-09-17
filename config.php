<?php

/**
 * Config file to connect database
 */

$mysql = new mysqli('localhost', 'root', '', 'blog');
$mysql->set_charset('utf8');

if ($mysql == FALSE) {
  die('Database connection failed');
}
