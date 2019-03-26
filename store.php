<?php

require 'database/QueryBuilder.php';

$db = new QueryBuilder;


//$db->addTask($data);
$db->store("tasks", $_POST);

header('Location: /mysite/5/');
