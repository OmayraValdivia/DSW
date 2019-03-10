@extends('layouts.master')
@section('title','Act.43 - Omayra Valdivia - Editar')
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            @lang('Modify client')
         </div>
         <div class="card-body" style="padding:30px">
           <form action="" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
             {{method_field('PUT')}}
             <div class="form-group">
                <label for="name">@lang('Name'):</label>
                <input type="text" name="name" id="nameId" class="form-control" value="{{$cliente->nombre}}">
             </div>
             <div class="form-group">
                <label for="imagen">@lang('Profile Image'):</label>
                <input type="file" name="imagen" id="imagenId" class="form-control" accept="image/jpeg, image/x-png">
             </div>
             <div class="form-group">
                <label for="date">@lang('Birthdate'):</label>
                <input type="date" name="date" id="dateId" class="form-control" value="{{$cliente->fecha_nacimiento}}">
             </div>
             <div class="form-group">
                <label for="email">@lang('Email'):</label>
                <input type="email" name="email" id="emailId" class="form-control" value="{{$cliente->correo}}">
             </div>

             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                    @lang('Modify client')
                </button>
             </div>
           </form>
         </div>
      </div>
   </div>
</div>
@endsection
