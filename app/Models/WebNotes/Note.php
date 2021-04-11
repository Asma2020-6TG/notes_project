<?php

namespace App\Models\WebNotes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

protected $table= "notes";
        protected $fillable = [
        'email',
        'id',
        'title',
        'details',
        'created_at',
        'updated_at'
    ];

        protected $hidden = [
        'created_at',
        'updated_at'
            ];
    public function users()
    {
        return $this->belongsTo(App\Models\User, 'email', 'id');
    }
}
