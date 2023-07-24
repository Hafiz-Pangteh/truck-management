<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $primaryKey = 'package_id';

    protected $fillable = ['truck_number', 'package_number', 'receiver_name', 'destination'];
    
     public function Truck(){
        return $this->belongsTo(Truck::class);
    }

}