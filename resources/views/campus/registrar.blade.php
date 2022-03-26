
@extends('layouts.app')

@section('content')
<section class="section"> 
  <div class="section-header">
    <h3 class="page__heading">Crear Campus</h3>
  </div> 
  @if ($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong>¡REVISE LOS CAMPOS!</strong>
      @foreach ($errors->all() as $error )
        <span class="badge badge-danger">{{$error}}</span>
       @endforeach
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  {!! Form::open(array('route'=>'campus.store', 'method'=>'POST','enctype'=>'multipart/form-data','required' => 'required')) !!}
   <label for="Nombre">Nombre:</label>
   <input class="form-control" type="text" name="nombre" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
   <label for="Direccion">Direccion</label>
   <input class="form-control" type="text" name="direccion" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
   <label >url:</label>
   <input class="form-control" type="text" name="url_maps" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
   <label >Vacantes:</label>
   <input class="form-control" type="number" name="cantidad_personal" required>
   <label>Sueldo autorizado:</label>
   <input class="form-control" type="number" name="sueldo_autorizado" name="edad" required>
   <label >Estado:</label>
   {!! Form::select('idestado', $estados,null, array('class'=>'form-control','placeholder' => 'Seleccione un estado...','required' => 'required')) !!}
   <label>Cliente:</label>   
   {!! Form::select('idcliente', $clientes,null, array('class'=>'form-control','placeholder' => 'Seleccione un cliente...','required' => 'required')) !!}
   <button id="btn_enviar" type="submit" class="btn btn-primary btn-lg d-block mx-auto" style="background-color:green;" name="btn_enviar">REGISTRAR GUARDIA</button>
   {!! Form::close() !!}
  </section>
@endsection