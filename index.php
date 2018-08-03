<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acessso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
<div class="w3-center">
    <div class="w3-dropdown-hover">
        <button class="w3-button" action="acesso.html"><img src="view/img/logo.png" width="50"></button>
    </div>
    <div class="w3-dropdown-hover">
        <button class="w3-button" action="acesso.html">Home</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="login.html" class="w3-bar-item w3-button">Acessar</a>
        </div>
    </div>
    <div class="w3-dropdown-hover">
        <button class="w3-button">Sobre</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="#" class="w3-bar-item w3-button"><code>Web Design</code></a>
            <a href="#" class="w3-bar-item w3-button">Manual Sistema de Reservas</a>
        </div>
    </div>
</div>
<div class="w3-center">
    <h1>Bem Vindo!</h1>
    <img src="view/img/load.gif" width="15%">
</div>
</body>
</html>
<?php
$page = "view/acesso.html";
$sec = "1";
header("Refresh: $sec; url=$page");