<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    protected $fillable = [
        'supplier_id',
        'unit_id',
        'category_id',
        'product_id',
        'purchase_no',
        'date',
        'description',
        'buying_qty',
        'unit_price',
        'buying_price',
        'status',
        'created_by'
    ];

}
