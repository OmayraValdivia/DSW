@extends('layouts.master')
@section('title','Act.43 - Omayra Valdivia - Editar')
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar cliente
         </div>
         <div class="card-body" style="padding:30px">
           <form action="" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
             {{method_field('PUT')}}
             <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="nameId" class="form-control" value="{{$cliente->nombre}}">
             </div>
             <div class="form-group">
                <label for="imagen">Imagen de Perfil:</label>
                <input type="file" name="imagen" id="imagenId" class="form-control" accept="image/jpeg, image/x-png">
             </div>
             <div class="form-group">
                <label for="date">Fecha de Nacimiento:</label>
                <input type="date" name="date" id="dateId" class="form-control" value="{{$cliente->fecha_nacimiento}}">
             </div>
             <div class="form-group">
                <label for="email">Correo-e:</label>
                <input type="email" name="email" id="emailId" class="form-control" value="{{$cliente->correo}}">
             </div>

             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Modificar cliente
                </button>
             </div>
           </form>
         </div>
      </div>
   </div>
</div>
@endsection
