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
                        @foreach($campuses as $campus)
                        <table class="table table-striped mt-2">
                            <thead style="background-color: #005388; ">
                                <th style="color: #fff;">Nombre</th>
                                <th style="color: #fff;">{{$campus->nombre}}</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%">Direccion</td>
                                    <td>{{$campus->direccion}}</td>
                                </tr>
                                <tr>
                                    <td style="background: #005388; color: #fff;width:10%"> Url</td>
                                    <td><a href="https://{{$campus->url_maps}}">{{$campus->url_maps}}</a></td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>                
@endsection