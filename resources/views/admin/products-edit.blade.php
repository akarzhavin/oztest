@extends('layouts.app')

@section('panel-body')
    {{ Form::open(array('action' => ["ProductsController@update", $product->id], 'method' => 'PUT', 'files' => true)) }}

    <br>
        {{ Form::label('title', 'Заголовок') }}
        {{ Form::text('title', $product->title) }}
    <br>
        {{ Form::label('description','Описание') }}
        {{ Form::textarea('description', $product->description) }}
    <br>
        {{ Form::label('count','Количество') }}
        {{ Form::number('count', $product->count) }}
    <br>
        {{ Form::label('price','Цена') }}
        {{ Form::number('price', $product->price) }}
    <br>
        {{ Form::file('image') }}
    <br>
        {{ Form::submit('Сохранить.') }}
    {{Form::close()}}
@endsection
