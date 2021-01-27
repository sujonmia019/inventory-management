<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'supplier_id',
        'unit_id',
        'category_id',
        'name',
        'quantity',
        'status',
        'created_by'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','created_by');
    }

    public function supplier(){
        return $this->hasOne(Supplier::class,'id','supplier_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function unit(){
        return $this->hasOne(Unit::class,'id','unit_id');
    }

}
