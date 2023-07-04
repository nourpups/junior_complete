<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
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

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class)->withDefault(['title' => 'Deleted']);
    }

}
