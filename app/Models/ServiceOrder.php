<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'service_id', 'status', 'notes','estimated_finish_date', 
        'additional_cost'];

    // Relasi: Satu pesanan dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Satu pesanan merujuk pada satu Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
