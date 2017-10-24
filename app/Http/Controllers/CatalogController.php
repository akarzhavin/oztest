<?php

namespace App\Http\Controllers;

use App\Facades\Alert;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CatalogController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function product(int $id)
    {
        $product = Product::find($id);

        //Check if product is trashed
        if(!$product && $product = Product::withTrashed()->find($id)) {
            $data['contacts'] = $product->owner;
        } elseif(empty($product)) {
            return abort(404, 'Not found!');
        }

        $data['product'] = $product;

        //If user can buy this product
        $data['disabled'] = !Auth::check() ||
                Auth::user()->products()->where('id', $id)->exists();

        return view('product', $data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function order(int $id)
    {
        $count = 1;
        $customer = Auth::user();
        $product = Product::find($id);

        if($customer->products()->where('id', $id)->exists()){ //Validate
            Alert::message('Приобритение своих товаров заблокировано!');
        } else {
            $status = $product->takeFromStock($count);
            if ($status) {
                $order = $this->addToCart($customer->id, $id, $count);
                Alert::message('Куплено ' . $order->count . ' товар(ов)');
            } else {
                Alert::message('Недостаточно товаров на складе!');
            }
        }

        return Alert::toJson();
    }


    /**
     * @param int $customerId
     * @param $productId
     * @param $count
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function addToCart(int $customerId, $productId, $count)
    {
        //Create new order
        $order = Order::firstOrNew([
            'customer_id' => $customerId,
            'product_id' => $productId,
        ]);
        $order->count += $count;
        $order->save();

       return $order;
    }
}
