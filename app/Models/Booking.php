<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    
    protected $fillable = [
        'id', 'name',	'booking_date',	'flexibility',	'vehicle_size',	'contact_number',	'email_address', 'booking_confirmed',
    ];
}
