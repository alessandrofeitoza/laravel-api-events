<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
    ];

    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }
}
