<?php

require "functions.php";
require "Database.php";

//require "router.php";


$config = require "config.php";

try {

  $id = $_GET["id"];
  $db = new Database($config['database']);
  $posts = $db->query("select * from posts where id = ?", [$id])->fetchAll();;


  foreach ($posts as $post) {
    echo "<li>".$post['title']."</li>";
  }
}
catch (PDOException $e) {
  echo 'Exception '. $e->getMessage();
}