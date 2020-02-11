<?php

namespace KjellKnapen\ServerStatistics\Models;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $casts = [
      'output' => 'json',
    ];

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'type', 'message', 'output', 'value'
    ];
}
