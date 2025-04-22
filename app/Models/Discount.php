<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'discount_label', // Add this line
        'discount_percentage', // Add this line
        'start_date', // Add this line
        'end_date', // Add this line
    ];

    public function sale(){
        return $this->hasMany(Sale::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
