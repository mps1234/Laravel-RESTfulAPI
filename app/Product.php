<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	const AVAILABLE_PRODUCT = 'available';
	const UNAVAILABLE_PRODUCT = 'unavailable';

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
}
