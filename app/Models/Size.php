<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'size_label', // Add this line
    ];

    public function size(){
        return $this->hasMany(Product::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
