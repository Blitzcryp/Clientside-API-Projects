<?php
    $host = 'localhost';
    $user = 'nasa';
    $password = 'pass';
    $dbname = 'iss_data';

    $dsn = 'mysql:host='.$host.';dbname='.$dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>