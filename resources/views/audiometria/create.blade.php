@extends('layouts.admin')

@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item active">Formulario de Audiometría</li>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Audiometria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('audiometrias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('audiometria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
