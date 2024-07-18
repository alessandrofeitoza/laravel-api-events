<?php

declare(strict_types=1);

namespace App\Log;

class DebugLog extends AbstractLog
{
    public function __construct(string $title, string $content = '')
    {
        parent::__construct('debug', $title, $content);
    }
}
