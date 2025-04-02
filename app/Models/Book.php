<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    use HasFactory;

    public function writer(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        "title",
        "description",
        "writer",
        "cover",
        "price"
    ];
}
