<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompletedMission extends Model
{
    protected $table = 'completed_missions';
    public $timestamps = true;
    public $guarded = [];
}
