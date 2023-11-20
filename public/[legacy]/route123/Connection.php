<?php

class Connection
{
    function connect(): PDO
    {
        $dsn = "pgsql:host=postgres;port=5432;dbname=app;";

        return new PDO(
            $dsn,
            'root',
            'root',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}
