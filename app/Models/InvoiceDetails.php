<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;

    protected $table = 'invoice_details';

    protected $fillable = [
        'invoice_details_date',
        'invoice_id',
        'category_id',
        'product_id',
        'selling_qty',
        'unit_price',
        'selling_price',
        'status'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
}