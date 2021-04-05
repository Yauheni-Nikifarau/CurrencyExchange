<?php
define('ROOT' , $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/php/functions.php';

if (isset($_GET['from']) && isset($_GET['to'])) {
    echo responseAjax($_GET['from'], $_GET['to']);
} else {
    render();
}