@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item active">Declaraciones Juradas</li>
@endsection

@section('content') <!-- Contenido -->
<div class="card">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        @include('paciente.mensaje')
        <div class="card-header">
            <div class="card-title">
                <p style="font-size:130%"> <i class="fa fa-id-card" aria-hidden="true"></i> Declaraciones Juradas</p>
            </div>
            <div class="card-tools">

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
                    <tr class="text-uppercase" style="font-size:120%">
                        <th width="15%" style="color:#F8F9F9">Nro Declaracion</th>
                        <th width="30%" style="color:#F8F9F9">Nombre del Paciente</th>
                        <th width="15%" style="color:#F8F9F9">Fecha de carga</th>
                        <th width="20%" style="color:#F8F9F9">Fecha de realizacion</th>
                        <th width="20%" style="color:#F8F9F9">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($declaraciones_juradas as $declaracion_jurada)
                    <tr onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td><p style="font-size:120%">{{ $declaracion_jurada->codigo }}</p></td>
                        <td><p style="font-size:120%">{{ $declaracion_jurada->voucher->paciente->nombreCompleto() }}</p></td>
                        <td><p style="font-size:120%">{{($declaracion_jurada->created_at)->format('d/m/Y') }}</p></td>
                        <td><p style="font-size:120%">{{Carbon\Carbon::parse($declaracion_jurada->fecha_realizacion)->format('d/m/Y') }}</p></td>

                        <td>



                            <!--aca incluir al modal show cuando todo funcione-->

                            <a href="{{ route('declaracion_jurada.pdf',$declaracion_jurada->id) }}">
                                <button title="exportar pdf" class="btn btn-danger btn-responsive">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </a>


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

