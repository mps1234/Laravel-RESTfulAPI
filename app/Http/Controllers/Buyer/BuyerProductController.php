<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        //transactions is a collection, use query builder
        //instead of relationship use method
        //list of transactions with product details
        $products = $buyer->transactions()->with('product')->get()->pluck('product');//buyer has many transactions
        return $this->showAll($products);
    }

}
