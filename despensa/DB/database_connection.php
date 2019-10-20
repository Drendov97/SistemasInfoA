<?php
    $conf = parse_ini_file('db.ini');
    $connect = new PDO("mysql:host=localhost;dbname=" .  $conf['db'], $conf['username'], $conf['password']);
?>