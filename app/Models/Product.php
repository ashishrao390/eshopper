<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function sale(){
        return $this->hasMany(Sale::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function weartype(){
        return $this->belongsTo(Weartype::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    } 

    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }
}
