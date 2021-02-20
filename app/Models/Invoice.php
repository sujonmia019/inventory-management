<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'invoice_no',
        'invoice_date',
        'description',
        'status',
        'created_by',
        'approved_by'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','created_by');
    }

    public function payment(){
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }


}
