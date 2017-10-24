<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function purchases()
    {
        $purchases = Auth::user()->purchases()->orderBy('updated_at', 'desc')->with('customer', 'product')->get();
        $data['orders'] = $purchases;
        $data['active'] = 'purchases';
        return view('admin.purchases', $data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function sales()
    {
        $sales = Auth::user()->sales()->orderBy('updated_at', 'desc')->with('customer', 'product.owner')->get();
        $data['orders'] = $sales;
        $data['active'] = 'sales';
        return view('admin.sales', $data);
    }
}
