<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   // In your model
    protected $fillable = ['name', 'email', 'phone', 'number_guests', 'date', 'time', 'message'];
}
