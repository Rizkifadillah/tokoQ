<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'category';
        protected $primaryKey = 'id_kategori';

    protected $guarded = [];

    public function product(){
        return $this->hasMany('App\Models\Product','id_produk');
    }


}
