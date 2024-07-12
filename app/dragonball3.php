<?php

declare(strict_types=1);

$pessoa = new stdClass();
$pessoa->cidade = 'Fortaleza';

function teste($pessoa): void
{
    $pessoa->cidade = 'Maranguape';
}

teste($pessoa);

echo $pessoa->cidade.PHP_EOL;
