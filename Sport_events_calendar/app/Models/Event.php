<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\PrimaryCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = [
        'home_team_id', 
        'away_team_id',
        'start_time',
        'primary_category_id' 
    ];


    public function primaryCategory()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class);
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class);
    }


}
