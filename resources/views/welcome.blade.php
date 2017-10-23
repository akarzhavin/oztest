@extends('layouts.welcome')
@section('content')
    <div class="row" style="margin-bottom: 20px; margin-top: 18px;">
        <div class="col-md-offset-1">
            <h4 style="margin: 5px; margin-left: 15px;">Сортировать по: <a href="/?sort=name">названию</a>, <a href="/?sort=price">цене</a>, <a href="/?sort=now">новизне</a></h4>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <a href="/{{ $product->id }}">
                <div class="col-sm-3 col-md-offset-1 m-b-md">
                    <span class="title">{{ $product->title }}</span> <br>
                    Цена: <span style="font-weight: bold;">{{ $product->price }}</span> бел.руб. <br>
                    <img src="{{ $product->image->original() }}" alt="" width="150" height="150"><br>
                </div>
            </a>
        @endforeach
    </div>
    {{ $products->links() }}
@endsection