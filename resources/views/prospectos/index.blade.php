@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Prospectos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <A class="btn btn-warning" href="{{ route('prospectos.create') }}">NUEVO </a>
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
                                            <td>{{$prospecto->cliente->nombre}}</td>
                                            {{-- boton para editar --}}
                                            <td>
                                                @can('editar-prospecto')
                                                <a class="btn btn-info" href="{{route('prospectos.edit', $prospecto->id)}}">EDITAR</a>
                                                @endcan
                                            {{-- boton eliminar --}}
                                                @can('borrar-prospecto')
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['prospectos.destroy', $prospecto->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endcan
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

