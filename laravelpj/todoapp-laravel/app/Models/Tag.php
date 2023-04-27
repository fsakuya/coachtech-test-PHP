<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = array('id');

    use HasFactory;

    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
