<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'room_type_id',
        'image_url',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }

    public static function findAll(bool $join = false): iterable
    {
        if (false === $join) {
            return self::all();
        }

        return self::with('roomType')->get();
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
