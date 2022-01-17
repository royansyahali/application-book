<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function categories()
    {
        return $this->hasOne(Category::class,"id","id_category");
        
    }

    public function authors()
    {
        return $this->hasOne(Author::class,"id","id_author");
        
    }
}
