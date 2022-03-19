
@extends('layouts.app')

@section('content')
<section class="section"> 
  <div class="section-header">
    <h3 class="page__heading">REGISTRO DE PROSPECTOS</h3>
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
  {!! Form::model($prospecto, ['method' => 'PUT','route' => ['prospectos.update', $prospecto->id]]) !!}
   <label for="cbx_estado"> Selecciona un Cliente:</label>
   {!! Form::select('cliente', $clientes,[], array('class'=>'form-control','placeholder' => 'Seleccione un cliente...','required' => 'required')) !!}
    <!--<select class="form-control" id="cbx_cliente" name="cbx_cliente" required>-->
    <!--<select class="form-control" id="cbx_cliente" name="cbx_cliente">-->
                 
   <label for="cbx_sucursal"> Selecciona el Campus:</label>
   <!--<select class="form-control" id="cbx_campus" name="cbx_campus" required></select>-->
   {!! Form::select('campus', $campus,null, array('class'=>'form-control','placeholder' => 'Seleccione un campus...','required' => 'required')) !!}
   <!--<select class="form-control" id="cbx_campus" name="cbx_campus"></select>-->
   <label for="Nombre">Estado</label>
   {!! Form::select('estado', $estados,null, array('class'=>'form-control','placeholder' => 'Seleccione un estado...')) !!}
   <!--<input class="form-control" type="text" id="estado" name="estado" aria-label="Default" aria-describedby="inputGroup-sizing-default">-->
   <label for="Nombre">Nombre (s)</label>
   <input class="form-control" type="text" id="nombre" name="nombre" value="{{$prospecto->nombre}}" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="ApellidoP">Apellido Paterno </label>
   <input class="form-control" type="text" id="appaterno" name="appaterno" value="{{$prospecto->apellido_paterno}}" aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="ApellidoM">Apellido Materno </label>
   <input class="form-control" type="text" id="apmaterno" name="apmaterno" value="{{$prospecto->apellido_materno}}"aria-label="Default" aria-describedby="inputGroup-sizing-default">
   <label for="fechaNac">Fecha de Nacimiento:</label>
   <input class="form-control" type="date" id="fechanacimiento" name="fechanacimiento" value="{{$prospecto->fecha_nacimiento}}"onBlur="comprobarEdad()">
   <label for="edad">Edad:</label>
   <input class="form-control" type="text" id="edad" name="edad" value="{{$prospecto->edad}}">
   <label for="CURP">CURP:</label>
   <input class="form-control" type="text" id="CURPPG" name="CURPPG" value="{{$prospecto->curp}}"onBlur="comprobarCurp()" required>
   <label for="Nacionalidad">Nacionalidad:</label>
   <input class="form-control" type="text" id="nacionalidad" name="nacionalidad" value="{{$prospecto->nacionalidad}}"onBlur="comprobarCurp()" required>

   <span id="estadocurp"></span>
   <label for="Nombre">SUELDO DIARIO</label>
   <input class="form-control" type="text" id="sueldodiario" name="sueldodiario" value="{{$prospecto->sueldo_diario}}"aria-label="Default" aria-describedby="inputGroup-sizing-default" value="" required>
   <label for="foto">Foto:</label>
   <input class="form-control" type="file" id="imagen" name="imagen" value="{{$prospecto->foto}}">

   <label for="horario">Horario:</label>
   <input class="form-control" type="text" id="horario" name="horario" value="{{$prospecto->horario}}">
   
   <label for="puesto">PUESTO:</label>
   {!! Form::select('puesto', $puestos,null,array('class'=>'form-control','placeholder' => 'Seleccione un puiesto...','required' => 'required')) !!}
   <!--<input class="form-control" type="text" id="puesto" name="puesto">-->
   <label for="cuip">CUIP:</label>
   <input class="form-control" type="text" id="cuip" name="cuip" value="{{$prospecto->cuip}}">
   <button id="btn_enviar" type="submit" class="btn btn-primary btn-lg d-block mx-auto" style="background-color:green;" name="btn_enviar">REGISTRAR GUARDIA</button>
   {!! Form::close() !!}
  </div>
 </div>

</div>
@endsection