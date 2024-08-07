<?php

declare(strict_types=1);

namespace App\Log;

abstract class AbstractLog
{
    public function __construct(
        private string $type,
        private string $title,
        private string $content = ''
    ) {
    }

    public function store(): void
    {
        $file = fopen(dirname(__DIR__, 2)."/logs/{$this->type}.csv", 'a+');

        $date = date('Y-m-d H:i:s');
        $content = "{$this->title};{$date};{$this->content}";

        fwrite($file, $content.PHP_EOL);
    }
}
