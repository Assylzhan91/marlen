<?php

$url = $_SERVER['REQUEST_URI'];
var_dump($url);
exit;

if ($url == '/marlen/web/about'){

  echo "Switch on files aboutme.php";

  exit;

}elseif ($url == '/marlen/web/contact'){

  echo "Switch on files contact.php";

  exit;
}
echo '404 | ERROR';