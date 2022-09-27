<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, FilterByTenant;

    public function products(){
        return $this->hasMany(Produk::class);
    }
}
