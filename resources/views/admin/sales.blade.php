@extends('layouts.app')

@section('panel-body')
    <table class="table" border="1">
    <tr>
        <th>Название</th>
        <th>Сумма заказа</th>
        <th>Количество</th>
        <th>Дата</th>
        <th>Покупатель</th>
        <th>Телефон</th>
    </tr>
    @if (isset($orders))
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->product->title }}</td>
                <td>{{ $order->total_price }} бел.руб.</td>
                <td>{{ $order->count }}</td>
                <td>{{ $order->updated_at }}</td>
                <td>{{ $order->customer->full_name }}</td>
                <td>{{ $order->customer->phone }}</td>
            </tr>
        @endforeach
    @endif
    </table>
@endsection
