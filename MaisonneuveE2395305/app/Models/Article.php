<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'texte', 'date_de_creation', 'langue', 'user_id'];
    
    protected $casts = [
        'date_de_creation' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
