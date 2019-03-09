@extends('layouts.master')

@section('content')
  <br>
  <div class="page-header">
    <h1 class="text-center"> <i class="fa fa-shopping-cart"></i> Carrito de compra</h1>
  </div>
  <br>
  @if (empty($cart))
    <h3 class="text-center"><span class="badge badge-warning">No hay productos en el carrito =( </span></h3>
  @else
    <p class="text-center">
      <a href="{{route('cart-trash')}}" class="btn btn-danger">
        Vaciar carrito <i class="fa fa-trash"></i>
      </a>
    </p>
    <div class="table-responsive">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>Imagen</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Quitar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cart as $item)
            <tr>
              <td><img class="img-fluid" width="100px" src="{{asset('storage/'.$item->image)}}" alt=""></td>
              <td>{{$item->name}}</td>
              <td>{{number_format($item->price,2)}}€</td>
              <td>
                  <input
                    type="number"
                    min="1"
                    max="{{$item->quantity}}"
                    name="quantityCart"
                    value="{{$item->quantityCart}}"
                    id="product_{{$item->id}}"
                  >
                  <a
                    href="#"
                    class="btn btn-warning btn-update-item"
                    data-href="{{ route('cart-update', $item->id) }}"
                    data-id="{{ $item->id }}"
                  >
                    <i class="fa fa-refresh"></i>
                  </a>
              </td>
              <td>{{number_format($item->price * $item->quantityCart,2)}}€</td>
              <td>
                <a href="{{route('cart-delete',$item->id)}}" class="btn btn-danger">
                  <i class="fa fa-remove"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <hr>
      <h3 class="text-right">
        <span class="badge badge-success">Total: {{number_format($total,2)}}€</span>
      </h3>
    </div>
    <hr>
    <p class="text-center">
      <a href="{{route('products.index')}}" class="btn btn-primary">
        <i class="fa fa-chevron-circle-left"></i> Seguir comprando
      </a>
      <a href="#" class="btn btn-primary">
        Continuar <i class="fa fa-chevron-circle-right"></i>
      </a>
    </p>
  @endif
@endsection
