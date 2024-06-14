<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $keyType = 'string';

    public $incrementing = false;

    public static function getTableName(): string
    {
        return with(new self)->getTable();
    }
}
