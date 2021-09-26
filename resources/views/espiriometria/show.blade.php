@extends('layouts.app')

@section('template_title')
    {{ $espiriometria->name ?? 'Show Espiriometria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Espiriometria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('espiriometrias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $espiriometria->archivo }}
                        </div>
                        <div class="form-group">
                            <strong>Voucher Id:</strong>
                            {{ $espiriometria->voucher_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
