<?php

declare(strict_types=1);

$nome = 'Kelly';

function teste(&$nome): void
{
    $nome = 'Sara';
}

teste($nome);
echo $nome.PHP_EOL;
