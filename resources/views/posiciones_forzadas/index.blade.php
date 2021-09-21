@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item active">Posiciones Forzadas</li>
@endsection

@section('content') <!-- Contenido -->
<div class="card">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        <!--inlcude mensaje -->
        <div class="card-header">
            <div class="card-title">
                <p style="font-size:130%"> <i class="fa fa-id-card" aria-hidden="true"></i> Posiciones Forzadas</p>
            </div>
            <div class="card-tools">
                <a href= {{ route('posiciones_forzadas.create')}}>
                    <button class="btn btn-primary">
                        <i class="fa fa-plus"></i> Nuevo
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-filter" aria-hidden="true"></i> Filtrar
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">

                        <!-- aca colocar el include-->

                    </div>
                </div>
            </div>
            <table id="tablaDetalle" style="border:1px solid black; width:100%" class="table table-bordered table-condensed table-hover">
                <thead style="background-color:#222D32">
                    <tr>
                        <th width="10%" style="color:#F8F9F9" height="15px"><p class="text-uppercase" style="font-size:120%">Nro</p></th>
                        <th width="10%" style="color:#F8F9F9" height="15px"><p class="text-uppercase" style="font-size:120%">Nombre del Paciente</p></th>
                        <th width="10%" style="color:#F8F9F9" height="15px"><p class="text-uppercase" style="font-size:120%">Fecha de carga</p></th>
                        <th width="10%" style="color:#F8F9F9" height="15px"><p class="text-uppercase" style="font-size:120%">Fecha de realizacion</p></th>
                        <th width="10%" style="color:#F8F9F9" height="15px"><p class="text-uppercase" style="font-size:120%">Opciones</p></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($posiciones_forzadas as $posiciones_forzada)
                    <tr onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td><p style="font-size:120%">{{ $posiciones_forzada->codigo }}</p></td>
                        <td><p style="font-size:120%">{{ $posiciones_forzada->paciente->nombreCompleto() }}</p></td>
                        <td><p style="font-size:120%">{{($posiciones_forzada->created_at)->format('d/m/Y') }}</p></td>
                        <td><p style="font-size:120%">{{Carbon\Carbon::parse($posiciones_forzada->fecha_realizacion)->format('d/m/Y') }}</p></td>

                        <td>



                            <!--aca incluir al modal show cuando todo funcione-->




                        </td>


                    </tr>

                    <!-- aca colocar el modaldelete-->

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{asset('js/tablaDetalle.js')}}"></script>
@endpush
@endsection

