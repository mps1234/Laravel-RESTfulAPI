<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Seller;
use App\Transaction;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

	const AVAILABLE_PRODUCT = 'available';
	const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'name',
    	'description',
    	'quantity',
    	'status',
    	'image',
    	'seller_id',
    ];
    //status active nd inactive, for this create const

    /**
    *Method to see whether a product is available or not
    */
    public function isAvailable(){
    	return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function seller(){
    	return $this->belongsTo(Seller::class);
    }

    public function transactions(){
    	return $this->hasMany(Transaction::class);
    }

    public function categories(){
    	return $this->belongsToMany(Category::class);
    }
}
