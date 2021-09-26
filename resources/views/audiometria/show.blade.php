@extends('layouts.app')

@section('template_title')
    {{ $audiometria->name ?? 'Show Audiometria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Audiometria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('audiometrias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $audiometria->archivo }}
                        </div>
                        <div class="form-group">
                            <strong>Voucher Id:</strong>
                            {{ $audiometria->voucher_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
