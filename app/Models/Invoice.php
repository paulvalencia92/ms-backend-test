<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        if (!app()->runningInConsole()) {
            self::saving(function ($table) {

                if (auth()->user()->type !== 'admin') {
                    $table->sender_id = auth()->id();
                }

                $consecutive = 1;
                $invoice = Invoice::orderBy('id', 'desc')->first();
                if ($invoice) {
                    $consecutive = $invoice->number + 1;
                }
                $table->number = $consecutive;
            });
        }
    }

    protected $casts = [
        'items' => 'array',
    ];

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'iva',
        'iva',
        'items',
        'total',
        'totalInvoice',
    ];


    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
