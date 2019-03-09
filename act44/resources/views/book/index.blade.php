@extends('layouts.master')
@section('title','Act.44 - Omayra Valdivia - Listar')
@section('content')
<div class="row">
    @foreach( $books as $key => $book )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/books/' . $book->id ) }}">
            <img src="{{$book['imagen']}}" style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$book->title}}
            </h4>
        </a>
    </div>
    @endforeach
</div>
@endsection
