<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentTrackingLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id', 'status', 'description', 'logged_at'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
