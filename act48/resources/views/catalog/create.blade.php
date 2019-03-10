@extends('layouts.master')
@section('title','Act.43 - Omayra Valdivia - Crear')
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            {{__('Add Client')}}
         </div>
         <div class="card-body" style="padding:30px">
           <form action="" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
             <div class="form-group">
                <label for="name">@lang('Name'):</label>
                <input type="text" name="name" id="nameId" class="form-control" value="{{old('name')}}">
                {!! $errors->first('name','<small>:message</small>')!!}
             </div>
             <div class="form-group">
                <label for="imagen">@lang('Profile Image'):</label>
                <!-- Elimino del input el accept="image/jpeg, image/x-png" para probar la validacion-->
                <input type="file" name="imagen" id="imagenId" class="form-control" >
                {!! $errors->first('imagen','<small>:message</small>')!!}
             </div>
             <div class="form-group">
                <label for="date">@lang('Birthdate'):</label>
                <input type="text" name="date" id="dateId" class="form-control" value="{{old('date')}}">
                {!! $errors->first('date','<small>:message</small>')!!}
             </div>
             <div class="form-group">
                <label for="email">@lang('Email'):</label>
                <input type="text" name="email" id="emailId" class="form-control" value="{{old('email')}}">
                {!! $errors->first('email','<small>:message</small>')!!}
             </div>

             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                    {{__('Add Client')}}
                </button>
             </div>
           </form>
         </div>
      </div>
   </div>
</div>
@endsection
