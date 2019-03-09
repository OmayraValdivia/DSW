@extends('layouts.master')
@section('title','Act.47 - Omayra Valdivia - Listar')
@section('content')
<br>
<div class="row">
    <div class="col-sm-12 text-center">
        <h2>Listados de Libros</h2>
    </div>
</div>
<br>
<div class="row">
    @foreach( $products as $product )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <h6>
            {{$product->name}}
        </h6>
        <img src="{{asset('storage/'.$product['image'])}}" style="height:200px"/>
        <p>
            <span class="badge badge-success">Precio: {{$product->price}} €</span>
        </p>
        <p>
            <a class="btn btn-warning" href="{{route('cart-add',$product->id)}}">
              <i class="fa fa-cart-plus"></i> Lo quiero
            </a>
            <a class="btn btn-primary" href="{{route('products.show',$product->id)}}">
              <i class="fa fa-chevron-circle-right"></i> Detalles
            </a>
        </p>
    </div>
    @endforeach
</div>
@endsection
