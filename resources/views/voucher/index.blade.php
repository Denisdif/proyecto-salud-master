@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item active">Indice de Vouchers</li>
@endsection

@section('content') <!-- Contenido -->
<div class="card">
    <div >
        @include('errors.request')
        @include('voucher.mensaje')
        <div class="card-header fondo2">
            <div class="card-title">
                <p style="font-size:130%"> <i class="fa fa-id-card" aria-hidden="true"></i> Indice de Vouchers</p>
            </div>
            <div class="card-tools">
                <a href= {{ route('voucher.create')}}>
                    <button class="btn fondo1">
                        <i class="fa fa-plus"></i> Nuevo
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <!-- <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-filter" aria-hidden="true"></i> Filtrar
                    </a>
                </p>-->
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">

                        <!-- aca colocar el include-->
                    </div>
                </div>
            </div>
            <table id="tablaDetalle" style="border:1px solid black; width:100%" class="table table-bordered table-condensed table-hover">
                <thead style="background-color:#222D32">
                    <tr class="text-uppercase">
                        <th width="20%" style="color:#F8F9F9" >Código</th>
                        <th width="40%" style="color:#F8F9F9" >Paciente</th>
                        <th width="20%" style="color:#F8F9F9" >Fecha</th>
                        <th width="20%" style="color:#F8F9F9" >Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($vouchers as $voucher)
                    <tr onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td>{{ $voucher->codigo }}</td>
                        <td>{{ $voucher->paciente->nombreCompleto() }}</td>
                        <td>{{ $voucher->created_at->format('d/m/Y') }}</td>
                        <td style="text-align: center" colspan="3">
                            <!--
                            <a target="_blank" href="{{ route('voucher.pdf_paciente',$voucher->id) }}">
                                <button title="exportar pdf paciente" class="btn fondo1 btn-responsive">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </a>-->
                            <a target="_blank" id="pdf_js">
                                <button title="exportar pdf paciente" class="btn fondo1 btn-responsive">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </a>
                            <a target="_blank" href="{{ route('voucher.pdf_medico',$voucher->id) }}">
                                <button title="exportar pdf médico" class="btn fondo2 btn-responsive">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </a>
                            <a href="{{ route('voucher.show',$voucher->id) }}">
                                <button title="carpeta"  class="btn fondo3 btn-responsive">
                                    <i style="color: rgb(255, 255, 255)" class="fas fa-folder"></i>
                                </button>
                            </a>
                            <!-- Otros botones-->
                                <!--a data-keyboard="false" data-target="#modal-show-{{ $voucher->id }}" data-toggle="modal">
                                    <button title="editar" class="btn btn-info btn-responsive">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="{{URL::action('VoucherController@edit',$voucher->id)}}">
                                    <button title="editar" class="btn btn-primary btn-responsive">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a data-backdrop="static" data-keyboard="false" data-target="#modal-delete-{{ $voucher->id }}" data-toggle="modal">
                                    <button title="eliminar" class="btn btn-danger btn-responsive">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a-->
                            <!-- / Otros botones-->
                             <!-- aca colocar el modalshow-->
                        </td>
                    </tr>
                    <!-- aca colocar el modaldelete-->
                    <!--incluir modaldelte-->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{asset('js/tablaDetalle.js')}}"></script>
    <script>
        $(document).ready(function(){
            var prueba;
            var prueba2;
            $("#pdf_js").click(function(){
                prueba = window.open(
                    "{{ route('posiciones_forzadas.index') }}",
                    '_blank'
                );
                prueba = window.open(
                    "{{ route('posiciones_forzadas.create') }}",
                    '_blank'
                );
                prueba = window.open(
                    "http://www.google.com",
                    '_blank'
                );
            });
        }); 
    </script>
@endpush
@endsection

