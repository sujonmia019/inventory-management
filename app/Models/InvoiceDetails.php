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

}