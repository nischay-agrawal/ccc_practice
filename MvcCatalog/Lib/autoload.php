<style>
    div {
        margin-bottom: 10px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th {
        background-color: #dfe4ea;
    }

    th,
    td {
        padding: 5px;
        text-align: center;
    }

    tr:hover {
        background-color: gainsboro;
    }

    .link {
        display: inline-block;
        margin: 10px 10px 0 0;
        padding: 10px;
        color: black;
        background-color: #dfe4ea;
        text-decoration: none;
    }
</style>

<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("_", "/", $class_name);
    if (file_exists($class_name . '.php')) {
        include_once $class_name . '.php';
    } else {
        include_once $class_name . '/index.php';
    }
});