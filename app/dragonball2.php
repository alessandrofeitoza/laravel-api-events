<?php

$nome = 'Kelly';

function teste(&$nome) {
    $nome = 'Sara';
}

teste($nome);
echo $nome.PHP_EOL;
