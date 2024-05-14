<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id'
    ];
    public function state(): BelongsTo
    {
        return $this->belongsTo(state::class);
    }

}
