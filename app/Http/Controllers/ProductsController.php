<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->products()->orderBy('created_at', 'desc')->get();
        $data['products'] = $products;
        return view('admin.products-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['active'] = 'create';
        return view('admin.products-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Validator::make($request->all(), [
            'image' => 'required|file|mimes:jpeg,gif,png|max:2048',
        ])->validate();

        $user = Auth::user();
        $product = new Product();
        $image = \App\Facades\Image::storage($request->file('image'));

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->user_id = $user->id;
        $product->image_id = $image->id;

        $product->save();

        $data['product'] = $product;
        return redirect('home/products');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Auth::user()->products()->where('id', $id)->first();
        $data['product'] = $product;
        return view('admin.products-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $user = Auth::user();

        $product = $user->products()->where('id', $id)->first();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->user_id = $user->id;

        if($request->hasFile('image')){
            $image = \App\Facades\Image::storage($request->file('image'));
            $product->image_id = $image->id;
        }

        $product->save();

        $data['product'] = $product;
        return view('admin.products-edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
