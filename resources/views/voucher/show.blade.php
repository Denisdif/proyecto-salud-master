@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/voucher">Indice de Vouchers</a></li>
    <li class="breadcrumb-item active">Datos de Voucher</li>
@endsection

@section('content')
    <div class="container col-12">
        <div class="card">
            <div class="card-header fondo2">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fa fa-voucher" aria-hidden="true"></i> Datos de Voucher</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 d-flex align-items-stretch">
                        <div class="card">
                            <div style="text-align: center" class="card-header fondo2">
                                DATOS DEL PACIENTE
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="added"> <input type="hidden" value="'+nombres+'">
                                            <p style="font-size:100%" class="text-left">Nombre completo: '+nombres+'</p>
                                            <p style="font-size:100%" class="text-left">Documento: '+documento+'</p>
                                            <p style="font-size:100%" class="text-left">Fecha de nacimiento: '+fecha_nacimiento+'</p>
                                            <p style="font-size:100%" class="text-left">CUIL: '+cuil+'</p>
                                            <p style="font-size:100%" class="text-left">Sexo: '+sexo+'</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="added"> 
                                            @if('+foto+'==null)
                                                <img class="img-thumbnail" height="85px" width="85px" src='+foto+'>
                                            @else
                                                <img class="img-thumbnail" height="350px" width="350px" src="{{ asset('imagenes/paciente/default.png')}}">
                                            @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-flex align-items-stretch ">
                        <div class="card flex-fill">
                            <div style="text-align: center" class="card-header fondo2">
                                ESTUDIOS
                                <button id="generar2">+</button>
                            </div>
                            <div class="card-body">
                                <table id="tablaDetalle" style="border:1px solid black; width:100%" class="table table-bordered table-condensed table-hover">
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
                    </div>
                </div>
                <div class="card "> 
                    <div style="text-align: center" class="card-header fondo2">
                        <div class="card-title">
                            OTROS ESTUDIOS
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @foreach ($tipo_estudios as $tipo)
                                <div class="col-12"  style="padding-bottom: 2%;">
                                    <div class=""> 
                                        <h2>{{ $tipo->nombre}}</h2>
                                        <ul> 
                                            <div class="row " style="padding: 1%;">
                                                @foreach ($voucher->vouchersEstudios as $item)
                                                    @if ($item->estudio->tipo_estudio_id == $tipo->id)
                                                        <div class="col-4"><li>{{ strtoupper($item->estudio->nombre)}}</li> </div>
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

    <div class="form-group">
        <input type="text" class="form-control" value={{$generar_formularios}} name="generar" id="generar" placeholder="" hidden>
        <input type="text" class="form-control" value={{$voucher->id}} name="voucher_id" id="voucher_id" placeholder="" hidden>
    </div>

@push('scripts')
<script>
    $(document).ready(function(){
        var prueba;
        var voucher_id = $("#voucher_id").val();
        if ( $("#generar").val() == true ) {
            prueba = window.open(
                    "{{ route('audiometrias.pdf', 1) }}",
                    '_blank'
                );
        }
        $("#generar2").click(function(){
            prueba = window.open(
                "http://www.google.com",
                '_blank'
            );
        });
    }); 
</script>
@endpush

@endsection