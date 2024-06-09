<?php

$piccolo = 'vivo';
$kamisama = 'vivo';

$piccolo =& $kamisama;

$piccolo = 'Morto';


echo "Piccolo: $piccolo".PHP_EOL;
echo "Kamisama: $kamisama".PHP_EOL;
