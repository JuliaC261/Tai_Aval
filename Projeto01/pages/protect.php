<?php


//iniciar a sessao
if(!isset($_SESSION)){
    die("Voce deve estar logado para acessar o painel!
    <p>
        <a href=\"login.php\">Logar</a>
    </p>");
}