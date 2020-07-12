<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $guarded = [];
    
    public function children()
    {
        return $this->hasMany(Self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Self::class, 'parent_id');
    }
}
