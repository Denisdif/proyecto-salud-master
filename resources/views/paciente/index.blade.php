@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item active">Indice de Pacientes</li>
@endsection


@section('content') <!-- Contenido -->

<div class="card ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        <div class="card-header">
            <div class="card-title">
                <p style="font-size:130%"> <i class="fa fa-id-card" aria-hidden="true"></i> Indice de Pacientes</p>
            </div>
            <div class="card-tools">
                <a href= {{ route('paciente.create')}}>
                    <button class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Nuevo
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

                        @include('paciente.search')
                    </div>
                </div>
            </div>
            <table id="tablaDetalle" style="border:1px solid black; width:100%" class="table table-bordered table-condensed table-hover">
                <thead style="background-color:#222D32">
                    <tr  class="text-uppercase">
                        <th width="10%" style="color:#F8F9F9">Documento</th>
                        <th width="25%" style="color:#F8F9F9">Apellido y Nombre</th>
                        <th width="15%" style="color:#F8F9F9">Origen</th>
                        <th width="15%" style="color:#F8F9F9">Obra social</th>
                        <th width="15%" style="color:#F8F9F9">Foto de perfil</th>
                        <th width="20%" style="color:#F8F9F9">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                    <tr onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td><?php if($paciente->documento == null)
                                    echo(" ");
                                else echo(number_format( (intval($paciente->documento)/1000), 3, '.', '.'))?></td>
                        <td>{{ $paciente->nombreCompleto() }}</td>
                        <td><?php if($paciente->origen == null)
                                        echo(" ");
                                    else echo($paciente->origen->definicion)?></td>
                        <td><?php if($paciente->obraSocial == null)
                                        echo(" ");
                                    else echo($paciente->obraSocial->abreviatura)?></td>
                        <td style="text-align: center">
                            @if($paciente->imagen == null)
                                <img src="{{ asset('imagenes/paciente/default.png')}}" width="50px" class="img-circle elevation-2" alt="User Image">
                            @else
                                <img src="{{ asset('imagenes/paciente/'.$paciente->imagen)}}" width="50px" class="img-circle elevation-2" alt="User Image">
                            @endif


                        </td>

                        <td style="text-align: center" colspan="3">
                            

                            <a data-keyboard="false" data-target="#modal-show-{{ $paciente->id }}" data-toggle="modal">
                                <button title="editar" class="btn btn-info btn-md">
                                    <i class="fa fa-eye"></i>
                                </button>

                            </a>

              
                            <a href="{{URL::action('PacienteController@edit',$paciente->id)}}">
                                <button title="editar" class="btn btn-primary btn-responsive">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>


                            @if($paciente->estado_id == 1)
                                <a data-backdrop="static" data-keyboard="false" data-target="#modal-delete-{{ $paciente->id }}" data-toggle="modal">
                                    <button title="eliminar" class="btn btn-danger btn-md">
                                        <i class="fas fa-user-minus"></i>
                                    </button>
                                </a>
                            @else
                                <a data-backdrop="static" data-keyboard="false" data-target="#modal-habilitar-{{ $paciente->id }}" data-toggle="modal">
                                    <button title="habilitar" class="btn btn-info btn-md">
                                        <i class="fas fa-user-plus"></i>
                                    </button>
                                </a>
                            @endif
                   

                             <!-- aca colocar el modalshow-->
                             @include('paciente.modalshow')


                        </td>
                    </tr>
                    <!-- aca colocar el modaldelete-->
                    @include('paciente.modaldelete')
                    @include('paciente.modalhabilitar')
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

