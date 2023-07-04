<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'title',
        'description',
        'deadline',
        'status'
    ];

    protected $casts = [
        'status' => Status::class
    ];

    protected function deadline(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('F j, Y'),
            set: fn (string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class)->withDefault(['name' => 'Deleted']);
    }

    public function client(): BelongsTo {
       return $this->belongsTo(Client::class)->withDefault(['name' => 'Deleted']);
    }

    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }
}
