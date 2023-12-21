<?php
    define("DB_SERVER", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "database");
    $connect_sql_database = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>