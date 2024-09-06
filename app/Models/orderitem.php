<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = null;

    public $incrementing = false;

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
