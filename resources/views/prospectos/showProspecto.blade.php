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
                        <table class="table table-striped mt-2">
                            <thead style="background-color: #005388; ">
                                <th style="color: #fff;">Nombre</th>
                                <th style="color: #fff;">{{$prospecto->nombre}} {{$prospecto->apellido_paterno}} {{$prospecto->apellido_materno}}</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Estado</td>
                                    <td>{{$estado}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Fecha Nacimiento</td>
                                    <td>{{$prospecto->fecha_nacimiento}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Edad</td>
                                    <td>{{$prospecto->edad}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">CURP</td>
                                    <td>{{$prospecto->curp}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">CUIP</td>
                                    <td>{{$prospecto->cuip}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Campus</td>
                                    <td>Nombre:{{$prospecto->campus->nombre}}</br>
                                        Estado:{{$prospecto->campus->idestado}}</br>
                                        Direccion:{{$prospecto->campus->direccion}}</br>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Cliente</td>
                                    <td>{{$prospecto->cliente->nombre}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Puesto</td>
                                    <td>{{$puesto->name}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Horario</td>
                                    <td>{{$prospecto->horario}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Sueldo(diario)</td>
                                    <td>{{$prospecto->sueldo_diario}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Nacionalidad</td>
                                    <td>{{$prospecto->nacionalidad}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>                
@endsection