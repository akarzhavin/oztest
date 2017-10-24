@extends('layouts.app')

@section('panel-body')
    <table class="table" border="1">
    <tr>
        <th>Название</th>
        <th>Сумма заказа</th>
        <th>Количество</th>
        <th>Дата</th>
        <th>Продавец</th>
        <th>Телефон</th>
    </tr>
    @if (isset($orders))
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->product->title }}</td>
                <td>{{ $order->total_price }} бел.руб.</td>
                <td>{{ $order->count }}</td>
                <td>{{ $order->updated_at }}</td>
                <td>{{ $order->product->owner->full_name }}</td>
                <td>{{ $order->customer->phone }}</td>
            </tr>
        @endforeach
    @endif
    </table>
@endsection
