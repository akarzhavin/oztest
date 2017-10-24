@extends('layouts.app')

@section('panel-body')
    <table class="table" border="1">
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Дата</th>
            <th></th>
        </tr>
        @if (isset($products))
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }} бел.руб.</td>
                    <td>{{ $product->count }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td><a href="/home/products/{{ $product->id }}/edit">Edit</a></td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection
