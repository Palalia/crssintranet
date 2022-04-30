@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Campus</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        @can('crear-campus')       
                            <A class="btn btn-warning" href="{{ route('campus.create') }}">NUEVO </a>
                        @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #005388; ">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">NOMBRE</th>
                                    <th style="color: #fff;">Direccion</th>
                                    <th style="color: #fff;">Cliente</th>
                                    <th style="color: #fff;">#Vacantes</th>
                                    <th style="color: #fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach($campuses as $campus)
                                        <tr>
                                            <td style="display: none;">{{$campus->id}}</td>
                                            <td>{{$campus->nombre}}</td>
                                            <td>{{$campus->direccion}}</td>
                                            <td>{{$campus->cliente->nombre}}</td>
                                            <td>{{$campus->cantidad_personal}}</td>
                                            {{-- boton para editar --}}
                                            <td>
                                            @can('editar-campus')
                                                <a class="btn btn-info" href="{{route('campus.edit', $campus->id)}}">EDITAR</a>
                                            @endcan
                                            @can('borrar-campus')
                                            {{-- boton eliminar --}}
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['campus.destroy', $campus->id], 'style'=>'display:inline']) !!}
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
                                {!! $campuses->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

