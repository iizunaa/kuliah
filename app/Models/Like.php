<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $fillable = ['user_id','film_id'];
    public $timestamps = false;

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
