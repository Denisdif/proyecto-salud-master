@extends('layouts.app')

@section('template_title')
    {{ $tipoEstudio->name ?? 'Show Tipo Estudio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipo Estudio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-estudios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipoEstudio->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
