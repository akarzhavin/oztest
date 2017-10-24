@extends('layouts.app')

@section('panel-body')
    {{ Form::open(array('action' => ["ProductsController@create"], 'method' => 'POST', 'files' => true)) }}

    <br>
        {{ Form::label('title', 'Заголовок') }}
        {{ Form::text('title') }}
    <br>
        {{ Form::label('description','Описание') }}
        {{ Form::textarea('description') }}
    <br>
        {{ Form::label('count','Количество') }}
        {{ Form::number('count') }}
    <br>
        {{ Form::label('price','Цена') }}
        {{ Form::number('price') }}
    <br>
        {{ Form::file('image') }}
    <br>
        {{ Form::submit('Сохранить.') }}
    {{Form::close()}}
@endsection
