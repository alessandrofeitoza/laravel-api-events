<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }
}
