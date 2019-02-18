<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function owner()
    {
        return $this->belongsTo('\App\Models\User', 'owner_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
}
