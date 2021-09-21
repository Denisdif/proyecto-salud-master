{{--ventanita modal cuando se haga clic en eliminar--}}


<div class="modal fade modal-slide-in-right"
    aria-hidden="true"
    role="dialog"
    tabindex="-1"
    id="modal-show-{{$user->id}}">



    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F39C12">
                <h3 class="modal-title" style="color: white"><i style="color: white" class="fa fa-exclamation-triangle" aria-hidden="true"></i> Detalle de la persona {{ $user->id }}</h3>
                <div class="modal-body">
                    <table class="table table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Apellido</th>
                                <td>{{ $user->apellido }}</td>
                            </tr>
                            <tr>
                                <th>Nombres</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>DNI</th>
                                <td>{{ $user->dni }}</td>
                            </tr>
                            <tr>
                                <th>Domicilio</th>
                                <td>{{ $user->domicilio }}</td>

                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $user->email }}</td>

                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td>{{ $user->telefono }}</td>

                            </tr>
                            <tr>
                                <th>Fecha de nacimiento</th>
                                <td>{{Carbon\Carbon::parse($user->fecha_nac)->format('d/m/Y') }}</td>

                            </tr>
                            <tr>
                                <th>Cuit</th>
                                <td>{{ $user->cuit }}</td>
                            </tr>
                            <tr>
                                <th>Sexo</th>
                                <td>{{ $user->sexo->descripcion }}</td>

                            </tr>
                           

                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>

