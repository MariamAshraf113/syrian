<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'government',
        'city',
        'detailed_address',
        'notes',
       
    ];
}
