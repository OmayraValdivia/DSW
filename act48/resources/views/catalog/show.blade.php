@extends('layouts.master')
@section('title','Act.43 - Omayra Valdivia - Mostrar')
@section('content')
<div class="row">
  <div class="col-sm-4">
    <img src="{{$cliente->imagen}}" alt="Imagen Matrix" style="height:250px">
  </div>
  <div class="col-sm-8">
    <h3 >{{$cliente->nombre}}</h3>
    <p><b>@lang('Email'):</b> {{$cliente->correo}}</p>
    <p><b>@lang('Birthdate'):</b> {{$cliente->fecha_nacimiento}}</p>
    <p>
      <a href="{{url('/catalog/edit/'.$cliente->id)}}" class="btn btn-warning">@lang('Edit')</a>
      <button class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="display:inline">@lang('Delete')</button>
      <a href="{{url('/catalog')}}" class="btn btn-primary">@lang('Back')</a>
    </p>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog"  id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('Delete of') {{$cliente->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>@lang('Are you sure you want to delete') {{$cliente->nombre}}?</p>
      </div>
      <div class="modal-footer">
        <form action="{{action('CatalogController@putDelete', $cliente->id)}}" method="POST" style="display:inline">
          {{ method_field('DELETE') }}
          {!! csrf_field() !!}
          <button type="submit" class="btn btn-danger" style="display:inline">@lang('Delete')</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
      </div>
    </div>
  </div>
</div>
@endsection
