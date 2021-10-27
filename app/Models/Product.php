<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id_produk';
    protected $guarded = [];

    public function kategoris(){
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }

}
