<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens,
       HasFactory,
       Notifiable,
       HasRoles,
       SoftDeletes,
       InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects(): BelongsToMany {
        return $this->belongsToMany(Project::class);
    }

    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }

    public function registerMediaCollections(): void
    {
      $this
         ->addMediaCollection('avatar')
         ->useFallbackUrl(asset('media/avatars/avatar15.jpg'))
         ->singleFile();
    }

}
