<?php
$json = file_get_contents('php://input');
$json = stripslashes($json);
$values = json_decode($json, true);

echo $values;