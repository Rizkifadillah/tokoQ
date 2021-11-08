<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $guarded = [];

    // public function supplier(){
    //     return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    // }
}
