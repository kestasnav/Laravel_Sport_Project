<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    public $primaryKey = 'gameID';

    protected $fillable = [
        'gameID',
        'gameDate',
        'homeTeam',
        'awayTeam',
        'homeScore',
        'awayScore',
        'player',
        'playerScore'

    ];


    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    public function team() {
        return $this->belongsTo(Team::class);
    }
}
