<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['title','sinopsis','tahun_terbit','link','category_id','thumbnail'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function like()
    {
        return $this->belongsTo(like::class);
    }
}

