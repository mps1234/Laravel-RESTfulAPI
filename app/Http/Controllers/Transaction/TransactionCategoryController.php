<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TransactionCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //we just want list of category for specific transaction
    public function index(Transaction $transaction)
    {   
        $categories = $transaction->product->categories;//it will provide list
        return $this->showAll($categories);
    }

  
}
