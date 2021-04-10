<?php

namespace App\Models\WebNotes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


        protected $fillable = [
        'title',
        'details',
        'created_at',
        'updated_at'
    ];

        protected $hidden = [
        'created_at',
        'updated_at'
            ];


}
