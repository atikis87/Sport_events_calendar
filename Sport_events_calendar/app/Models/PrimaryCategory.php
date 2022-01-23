<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Event;

use Illuminate\Database\Eloquent\Relations\HasOne;

class PrimaryCategory extends Model
{
    use HasFactory;

    protected $table = 'primary_categories';
    protected $attributes = [
        'display_name'
    ];

    public function team()
    {
        return $this->hasOnbe(Team::class);
    }

    public function event()
    {
        return $this->hasOnbe(Event::class);
    }


}
