<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['id', 'name', 'desc', 'cate_id', 'price'];
    public $timestamps = true;
    public function cate(){
    	return $this->belongsTo('App\Cate');
    }
}
