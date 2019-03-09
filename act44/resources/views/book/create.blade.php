@extends('layouts.master')
@section('title','Act.44 - Omayra Valdivia - Crear')
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir Libro
         </div>
         <div class="card-body" style="padding:30px">
           <form action="{{ route('books.store')}}" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
             <div class="form-group">
                <label for="title">Titulo:</label>
                <input type="text" name="title" id="titleId" class="form-control">
             </div>
             <div class="form-group">
                <label for="imagen">Portada:</label>
                <input type="file" name="imagen" id="imagenId" class="form-control" accept="image/jpeg, image/x-png">
             </div>
             <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autorId" class="form-control">
             </div>

             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Añadir libro
                </button>
                <a href="{{url('/books')}}" class="btn btn-warning" style="padding:8px 100px;margin-top:25px;">Volver</a>
             </div>
           </form>
         </div>
      </div>
   </div>
</div>
@endsection
