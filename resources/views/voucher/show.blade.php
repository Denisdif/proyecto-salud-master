@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/voucher">Indice de Vouchers</a></li>
    <li class="breadcrumb-item active">Datos de Voucher</li>
@endsection

@section('content')
    <div class="container">
        <div class="card ">
            <div class="card-header fondo2">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fa fa-voucher" aria-hidden="true"></i> Datos de Voucher</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table id="tablaDetalle" style="border:1px solid black; width:100%" class="table table-bordered table-condensed table-hover">
                            <thead style="background-color:#222D32">
                                <tr class="text-uppercase">
                                    <th style="color:#F8F9F9" >Estudios</th>
                                    <th style="color:#F8F9F9" >Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudios as $item)
                                <tr onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                                    <td style="width: 65%">{{ $item }}</td>
                                    <td style="text-align: center">
                                        <a href="">
                                            <button title="Exportar pdf" class="btn fondo1 btn-responsive">
                                                <i class="fas fa-file-pdf"></i>
                                            </button>
                                        </a>
                                        <a href="">
                                            <button title="Cargar pdf" class="btn fondo2 btn-responsive">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card "> 
                    <div class="card-header fondo2">
                        <div class="card-title">
                            <strong> OTROS ESTUDIOS</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @foreach ($tipo_estudios as $tipo)
                                <div class="col-12" style="padding-bottom: 2%;">
                                    <div class=""> 
                                        <h2>{{ $tipo->nombre}}</h2>
                                        <ul> 
                                            <div class="row " style="padding: 1%;">
                                                @foreach ($voucher->vouchersEstudios as $item)
                                                    @if ($item->estudio->tipo_estudio_id == $tipo->id)
                                                        <div class="col-6"><li>{{ strtoupper($item->estudio->nombre)}}</li> </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </ul>
                                        <hr>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

@push('scripts')

@endpush

@endsection