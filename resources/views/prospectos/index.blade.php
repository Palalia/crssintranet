@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Prospectos</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error )
                <span class="badge badge-danger">{{$error}}</span>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <div class="card-body">
                        @can('crear-prospecto')
                        <a class="btn btn-warning" href="{{ route('prospectos.create') }}">NUEVO </a>
                        @endcan
                        <table class="table table-striped mt-2">
                                <thead style="background-color: #005388; ">
                                    <th style="color: #fff;">ID</th>
                                    <th style="color: #fff;">Nombre</th>
                                    <th style="color: #fff;">Apellidos</th>
                                    <th style="color: #fff;">Curp</th>
                                    <th style="color: #fff;">Campus</th>
                                    <th style="color: #fff;">Cliente</th>
                                    <th style="color: #fff;">ACCIONES</th>
                                </thead>

                                <tbody>
                                    @foreach($prospectos as $prospecto)
                                        <tr>
                                            <td>{{$prospecto->id}}</td>
                                            <td>{{$prospecto->nombre}}</td>
                                            <td>{{$prospecto->apellido_paterno}} {{$prospecto->apellido_materno}}</td>
                                            <td><a href="{{ route('prospectos.show',$prospecto->id) }}">{{$prospecto->curp}}</a></td>
                                            <td>
                                                <h5><span class="badge badge-dark">{{$prospecto->campus->nombre}}</span></h5>    
                                            </td>
                                            <td>{{$prospecto->campus->cliente->nombre}}</td>
                                            
                                            <td>
                                            @can('entreistar')
                                                <a class="btn btn-primary">Entrevistar</a>
                                            @endcan
                                            @can('contratar')
                                                <a class="btn btn-success">Contratar</a><!--si ya se hizo la entrevista que se vea este boton -->
                                            @endcan
                                            {{-- boton para editar --}}
                                            @can('editar-prospecto')
                                                <a class="btn btn-info" href="{{route('prospectos.edit', $prospecto->id)}}">Editar</a>
                                                @endcan  
                                            {{-- boton eliminar --}}
                                                @can('borrar-prospecto')
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['prospectos.destroy', $prospecto->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            {{-- boton contratar --}}    
                                            
                                           
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            {{-- Paginacion --}}
                            <div class="pagination justify-content-end">
                                {!! $prospectos->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

