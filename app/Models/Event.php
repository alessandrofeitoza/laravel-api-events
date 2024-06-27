<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    const RELATION_ROOM = 'room';

    const RELATION_EVENT_TYPE = 'eventType';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'date',
        'room_id',
        'event_type_id'
    ];

    public static function getTableName(): string
    {
        return with(new self)->getTable();
    }

    public static function findAll(bool $join = false): iterable
    {
        if (false === $join) {
            return self::all();
        }

        return self::with(self::RELATION_ROOM)
            ->with(self::RELATION_EVENT_TYPE)
            ->get();
    }

    public static function findOneWithRelations(string $id): ?Event
    {
        return self::with(self::RELATION_ROOM)
            ->with(self::RELATION_EVENT_TYPE)
            ->find($id);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }
}
