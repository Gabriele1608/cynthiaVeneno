<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 

    protected $fillable = ['quantity'];

    public function categories(){

        return $this->belongsToMany('App\Models\Category');
    }

    public function presentPrice(){
        $price = $this->price/100; 

        return number_format($price, 2, ',', '').'€';
    }

    public function getWidth(){
        $width = $this->width/10;

        return number_format($width, 2, ',', '').' cm';
    }

    public function getHeight(){
        $height = $this->height/10;

        return number_format($height, 2, ',', '').' cm';
    }

    
}
