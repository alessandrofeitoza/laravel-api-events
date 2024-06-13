<?php

$pessoa = new stdClass();
$pessoa->cidade = 'Fortaleza';

function teste($pessoa) {
    $pessoa->cidade = 'Maranguape';
}

teste($pessoa);

echo $pessoa->cidade.PHP_EOL;

