<?php
    session_start();
    session_destroy();
    $page = "acesso.html";
    $sec = "0";
    header("Refresh: $sec; url=$page");
?>