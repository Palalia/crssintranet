@extends('layouts.app')

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cliente</h3>
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
        @if(isset($cliente))
        {!! Form::model($cliente, ['method' => 'PUT','route' => ['clientes.update', $cliente->id]]) !!}
        @else
        {!! Form::open(array('route'=>'clientes.store', 'method'=>'POST','enctype'=>'multipart/form-data','required' => 'required')) !!}
        @endif

        <label for="Nombre">Nombre:</label>
        <input class="form-control" type="text" name="nombre" value="{{isset($cliente) ? $cliente->nombre : ''}}" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
        <button id="btn_enviar" type="submit" class="btn btn-primary btn-lg d-block mx-auto" style="background-color:green;" name="btn_enviar">ENVIAR CLIENTE</button>
        {!! Form::close() !!}    
</section>
@endsection