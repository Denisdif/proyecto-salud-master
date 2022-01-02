@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/personal">Indice de Personal</a></li>
    <li class="breadcrumb-item active">Editar Personal</li>
@endsection
@section('content')

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('errors.request')
        @include('personal.mensaje')

        {!!Form::model($personal, ['method'=>'PATCH','route'=>['personal.update',$personal->id]])!!}
        {{Form::token()}}

        <div class="card card-dark">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fa fa-user" aria-hidden="true"></i> Editar Personal</p>
                </div>
            </div>
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input 
                            type="string"
                            name="nombres"
                            value="{{ $personal->nombres}}"
                            class="form-control"
                            title="nombre de la persona">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="apellidos"> Apellido </label>
                        <input 
                            type="string"
                            name="apellidos"
                            value="{{ $personal->apellidos }}"
                            class="form-control"
                            title="apellido de la persona">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input
                            type="integer"
                            name="documento"
                            value="{{ $personal->documento }}"
                            class="form-control"
                            title="documento de la persona">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input
                            type="date"
                            name="fecha_nacimiento"
                            value="{{ $personal->fecha_nacimiento }}"
                            class="form-control"
                            title="fecha de nacimiento de la persona">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>
                            Sexo
                        </label>
                        <select
                            id="sexo_id"
                            name="sexo_id"
                            class="form-control">
                                @foreach ($sexos as $sexo)
                                    @if ($sexo->id==$personal->sexo_id)
                                        <option value="{{$sexo->id}}" selected>{{$sexo->definicion}}</option> 
                                    @else
                                            <option value="{{$sexo->id}}">{{$sexo->definicion}}</option>                                                
                                    @endif
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group" style="text-align:center">
                        <label>

                        </label>
                        <br>
                        <a href="/personal">
                            <button title="Cancelar" class="btn btn-secondary btn-lg" type="button"><i class="fas fa-arrow-left"></i> Cancelar</button>
                        </a>
                        <button title="Guardar" id="confirmar" class="btn btn-danger btn-lg" type="submit"> <i class="fa fa-check"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

{!!Form::close()!!}

    @push('scripts')
    <script type="text/javascript">    
        $(document).ready(function(){
            var select1 = $("#sexo_id").select2({width:'100%'});
            select1.data('select2').$selection.css('height', '100%');
        });
    </script>
@endpush

@endsection

