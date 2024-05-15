<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'phonecode'
    ];
    public function state():HasMany
    {
        return $this->hasMany(state::class);
    }




}