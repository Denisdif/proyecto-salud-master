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
                    <p style="font-size:130%"> <i class="fa fa-voucher" aria-hidden="true"></i>Datos de Voucher</p>
                </div>
                <div class="card-tools">
                    <a href= {{ route('aptitudes.create',$voucher->id)}} class="btn fondo1">Informe Final</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- PACIENTE -->
                    <div class="col-6 d-flex align-items-stretch">
                        <div class="card flex-fill">
                            <div style="text-align: center" class="card-header fondo2">
                                DATOS DEL PACIENTE
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="added"> <input type="hidden" value="'+nombres+'">
                                            <p style="font-size:100%" class="text-left"> <strong> Nombre completo:              </strong> {{$voucher->paciente->nombreCompleto()     }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> CUIL:                         </strong> {{$voucher->paciente->cuil                 }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Fecha de nacimiento:          </strong> {{$voucher->paciente->fecha_nacimiento()   }} </p> 
                                            <p style="font-size:100%" class="text-left"> <strong> Edad:                         </strong> {{$voucher->paciente->edad()               }} </p>
                                            <p style="font-size:100%" class="text-left"> <strong> Sexo:                         </strong> {{$voucher->paciente->sexo->definicion     }} </p>        
                                            <p style="font-size:100%" class="text-left"> <strong> Turno de este Voucher:        </strong> {{$voucher->turno     }} </p>  
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="added"> 
                                            @if($voucher->paciente->imagen==null)
                                                <img class="img-thumbnail" height="200px" width="200px" src="{{ asset('imagenes/paciente/default.png')}}">
                                            @else
                                                <img class="img-thumbnail" height="200px" width="200px" src="{{$voucher->paciente->imagen}}">
                                            @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ESTUDIOS DEL SISTEMA -->
                    <div class="col-6 d-flex align-items-stretch ">
                        <div class="card flex-fill">
                            <div style="text-align: center" class="card-header fondo2">
                                ESTUDIOS DEL SISTEMA
                            </div>
                            <div class="card-body">
                                <table id="tablaEstudios" style="width:100%" class="table-sm table-bordered table-condensed table-hover">
                                    <tbody>
                                        @foreach ($estudios_sistema[2] as $item)
                                        <tr onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                                            <td style="width: 65%">{{ $estudios_sistema[0][$item]->estudio->nombre }}</td>
                                            @if ($estudios_sistema[0][$item]->archivo_adjunto)
                                                <td style="text-align: center">
                                                    <a target="_blank" href="{{ route('voucherEstudio.show',$estudios_sistema[0][$item]->id) }}" class="btn fondo1 btn-responsive">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </td>
                                            @else
                                            <td> 
                                                <a  title="Cargar pdf" class="btn fondo2 btn-responsive" href={{ route($estudios_sistema[1][$item], $voucher->id)}} >
                                                    <i class="fa fa-plus" ></i>
                                                </a>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ESTUDIOS CARGADOS -->
                    <div class="col">
                        <div class="card flex-fill">
                            <div style="text-align: center" class="card-header fondo2">
                                ESTUDIOS CARGADOS
                            </div>
                            <div class="card-body">
                                <table data-page-length='10' id="tablaDetalle" style="border:1px solid black; width:100%" class="table-sm table-bordered table-condensed table-hover ">
                                    <thead class="fondo2">
                                        <tr>
                                            <th style="width: 30%"> Tipo de estudio       </th>
                                            <th style="width: 30%"> Estudio               </th>
                                            <th style="width: 25%"> Estado                </th>
                                            <th style="width: 15%"> Acción                </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estudios_cargar as $item)
                                        <tr onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                                            <td style="text-align: left"> {{strtoupper($item->estudio->nombre)    }}    </td>
                                            <td style="text-align: left"> {{($item->estudio->tipoEstudio->nombre) }}    </td> 
                                            @if ($item->archivo_adjunto)
                                                <td><label class="badge badge-success" style="font-size:90%">Cargado</label></td>
                                                <td style="text-align: center">
                                                    <a target="_blank" href="{{ route('voucherEstudio.show',$item->id) }}" class="btn fondo1 btn-responsive">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td><label class="badge badge-danger" style="font-size:90%">Pendiente</label></td>
                                                <td style="text-align: center">
                                                    <button type="button" class="btn fondo2" data-toggle="modal" data-target="#archivoModal" data-whatever="[{{$item->estudio}}, {{$item}}]">
                                                        <i class="fa fa-plus" ></i>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TODOS LOS ESTUDIOS 
                <div class="card "> 
                    <div style="text-align: center" class="card-header fondo2">
                            TODOS LOS ESTUDIOS
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @foreach ($tipo_estudios as $tipo)
                                <div class="col-12"  style="padding-bottom: 2%;">
                                    <div class=""> 
                                        <h3 style="font-weight: bold;font-size: 20px" >{{ $tipo->nombre}}</h3>
                                        <ul> 
                                            <div class="row " style="padding: 1%;">
                                                @foreach ($voucher->vouchersEstudios as $item)
                                                    @if ($item->estudio->tipo_estudio_id == $tipo->id)
                                                        <div class="col-4" style="font-size: 15px">
                                                            <li>
                                                                {{ strtoupper($item->estudio->nombre)}}
                                                            </li> 
                                                        </div>
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
                </div>-->
            </div>
        </div>
    </div>
    <!-- MODAL PARA ARCHIVOS -->
    <div class="modal fade" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="archivoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- HEADER -->
                <div class="modal-header fondo1">
                    <h5 class="modal-title" id="archivoModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form method="POST" action="{{route('voucherEstudio.archivo')}}" enctype="multipart/form-data">
                @csrf
                <!-- BODY -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Archivo:</label>
                        <input class="form-control-file" name="anexo" type="file">
                    </div>
                    <div class="form-group">
                        <input type="text" name="voucher_estudio_id" class="form-control" id="voucher_estudio" hidden>
                        <input type="text" name="estudio" class="form-control" id="estudio" hidden>
                    </div>
                </div>
                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn fondo1" >Guardar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@push('scripts')
    <script src="{{asset('js/tablaDetalle.js')}}"></script>
    <script>
        $('#archivoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Carga de archivo de ' + recipient[0].nombre)
            modal.find('#estudio').val(recipient[0].nombre)
            modal.find('#voucher_estudio').val(recipient[1].id)
          })
    </script>
@endpush
@endsection