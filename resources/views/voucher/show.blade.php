@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/voucher">Indice de Vouchers</a></li>
    <li class="breadcrumb-item active">Generar Voucher</li>
@endsection

@section('content')
    <div class="container">
        <div class="card card-outline card-dark">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fa fa-voucher" aria-hidden="true"></i> Datos Vouchers</p>
                </div>
            </div>
            <div class="card-body">
               @foreach ($voucher->vouchersEstudios as $item)
                    {{ strtoupper($item->estudio->nombre)}} <br>
               @endforeach
            </div>
        </div>
    </div> 

@push('scripts')

@endpush

@endsection

