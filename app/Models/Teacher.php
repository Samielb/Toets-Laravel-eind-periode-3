<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $fillable = ['name', 'email', 'hobbies'];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
