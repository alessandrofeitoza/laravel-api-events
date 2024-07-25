<?php

declare(strict_types=1);

namespace App\Log;

class ErrorLog extends AbstractLog
{
    public function __construct(string $title, string $content = '') 
    {
        parent::__construct('error', $title, $content);
    }
}
