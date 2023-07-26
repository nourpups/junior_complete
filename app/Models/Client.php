<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'name',
      'email',
      'company_name',
      'company_city',
      'company_address',
    ];

    public function projects(): HasMany {
       return $this->hasMany(Project::class);
    }

}
