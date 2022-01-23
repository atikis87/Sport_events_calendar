<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrimaryCategory;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $attributes = [
        'primary_category_id',
        'display_name'
    ];

    public function primaryCategory()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
