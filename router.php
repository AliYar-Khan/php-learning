<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

//dd($url);

$routes = [
  "/" => 'controllers/index.php',
  "/about" => 'controllers/about.php',
  "/contact" => 'controllers/contact.php',
];



function routeToController($url,$routes) {
  if(array_key_exists($url, $routes)) {
    require $routes[$url];
  }else {
    abort();
  }
}
function abort($code = 404) {
  http_response_code(404);
  require "controllers/404.php";
  die();
}

routeToController($url,$routes);