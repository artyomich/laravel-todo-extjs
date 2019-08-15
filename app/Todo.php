<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /*
     * Table name
     */
    protected $table = 'todos';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'name',
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];
}
