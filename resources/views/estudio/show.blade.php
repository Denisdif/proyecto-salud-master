@extends('layouts.app')

@section('template_title')
    {{ $estudio->name ?? 'Show Estudio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Estudio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estudio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Estudio Id:</strong>
                            {{ $estudio->tipo_estudio_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
