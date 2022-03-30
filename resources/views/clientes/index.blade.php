@extends('layouts.app')

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cliente</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">       
                            <A class="btn btn-warning" href="{{ route('clientes.create') }}">NUEVO </a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #005388; ">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">NOMBRE</th>
                                    <th style="color: #fff;">Campus</th>
                                    <th style="color: #fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach($clientes as $cliente)
                                        <tr>
                                            <td style="display: none;">{{$cliente->id}}</td>
                                            <td>{{$cliente->nombre}}</td>
                                            {{-- boton para ver los campus asociados a un cliente --}}
                                            <td>
                                                <a class="btn btn-info" href="{{route('clientes.verCampus', $cliente->id)}}">Ver</a>
                                            </td>  
                                            <td>
                                              {{-- boton para editar --}}
                                                <a class="btn btn-info" href="{{route('clientes.edit', $cliente->id)}}">EDITAR</a>
                                            {{-- boton eliminar --}}
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['clientes.destroy', $cliente->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                            {{-- Paginacion --}}
                            <div class="pagination justify-content-end">
                                {!! $clientes->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection