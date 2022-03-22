<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilker extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
