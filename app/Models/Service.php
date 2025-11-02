<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;   

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'technician_id',
        'title',
        'description',
        'price',
        'duration_estimate',
        'image',
    ];

    //relasi ke User (teknisi)
    public function technician() {
        return $this->belongsTo(User::class,'technician_id');
    }
}
