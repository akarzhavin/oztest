<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = new Product();
        switch($request->sort) {
            case 'now':
                $query = $query->orderBy('created_at', 'desc');
                break;
            case 'price':
                $query = $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query = $query->orderBy('title', 'desc');
                break;
        }
        $products = $query->paginate(15);
        $products->appends(Input::all());

        $data['products'] = $products;
        return view('welcome', $data);
    }

    public function product(int $id)
    {
        $data['product'] = Product::find($id);
        $data['disabled'] = !Auth::check() ||
                Auth::user()->products()->where('id', $id)->exists();

        return view('product', $data);
    }

    public function order(int $id)
    {
        $customer = Auth::user();
        if($customer->products()->where('id', $id)->exists()){
            $alert = 'Приобритение своих товаров заблокировано!';
            return json_encode(['message' => $alert]);
        }

        $order = Order::firstOrNew([
            'customer_id' => $customer->id,
            'product_id' => $id,
        ]);

        $order->count++;
        $order->save();

        $alert = 'Куплено ' . $order->count . ' товар(ов)';
        return json_encode(['message' => $alert]);
    }
}
