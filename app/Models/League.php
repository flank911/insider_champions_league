<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class League extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'team_id',
        'points',
        'played',
        'won',
        'lost',
        'draw',
        'goal_difference',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
