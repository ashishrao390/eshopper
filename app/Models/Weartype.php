<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weartype extends Model
{
    use HasFactory;

    protected $fillable = [
        'weartypes_name'
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
