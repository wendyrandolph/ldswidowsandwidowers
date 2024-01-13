<?php

function widowsConnect()

{
    $server = '35.208.110.95';

    $dbname = 'dbc5le46avauj6';

    $username = 'uh3rpj48scvi0';

    $password = 'mjvfgbmkdg26';

    $dsn = "mysql:host=$server;dbname=$dbname";

    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {

        $link = new PDO($dsn, $username, $password, $options);

        return $link;
    } catch (PDOException $e) {

        echo "It didn't work, error:" . $e;

        header('Location: /500.php');

        exit;
    }
}

widowsConnect();
