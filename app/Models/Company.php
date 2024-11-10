<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',  

    ];


    public function categories()
    {
        return $this->hasMany(Category::class);  
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
