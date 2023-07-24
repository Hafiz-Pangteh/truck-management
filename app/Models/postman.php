<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postman extends Model
{

    use HasFactory;
    protected $primaryKey = 'postman_id';

    protected $fillable = ['truck_number','postman_number','postman_name'];

    public function Truck(){
        return $this->belongsTo(Truck::class, 'postman_name', 'postman_name');
    }
}
