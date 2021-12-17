<div class="col-12">
    <div class="row">
        <!-- Declaracion Jurada -->
        @if ($declaracion_jurada)
            <div class="col-6">
                <div class="card">
                    <div class="card-header fondo2">
                        Declaracion Jurada
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                            <div class="col-12">
                                @php
                                    echo $diagnosticoD;
                                @endphp
                            </div>
                            <!-- Preexistencia u observaciones -->
                            <div class="col-12">
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Preexistencias</label>
                                        <textarea class="form-control preexistencias" id="pre_declaracion_jurada" name="" cols="15" rows="5"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Observaciones</label>
                                        <textarea class="form-control observaciones" id="obs_declaracion_jurada" name="" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Historia Clínica -->
        @if ($historia_clinica)
            <div class="col-6">
                <div class="card">
                    <div class="card-header fondo2">
                        Historia Clínica
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                            <div class="col">
                                @php
                                    echo $diagnosticoH;
                                @endphp
                            </div>
                            <!-- Preexistencia u observaciones -->
                            <div class="col-12">
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Preexistencias</label>
                                        <textarea class="form-control preexistencias" name="" id="pre_historia_clinica" cols="15" rows="5"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Observaciones</label>
                                        <textarea class="form-control observaciones" id="obs_historia_clinica" name="" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Posiciones Forzadas -->
        @if ($posiciones_forzadas)
            <div class="col-6">
                <div class="card">
                    <div class="card-header fondo2">
                        Posiciones Forzadas
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                            <div class="col">
                                @php
                                    echo $diagnosticoP;
                                @endphp
                            </div>
                            <!-- Preexistencia u observaciones -->
                            <div class="col-12">
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Preexistencias</label>
                                        <textarea class="form-control preexistencias" name="" id="pre_posiciones_forzadas" cols="15" rows="5"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Observaciones</label>
                                        <textarea class="form-control observaciones" id="obs_posiciones_forzadas" name="" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Iluminacion Insuficiente -->
        @if ($iluminacion_direccionado)
            <div class="col-6">
                <div class="card">
                    <div class="card-header fondo2">
                        Iluminacion Insuficiente
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-12"><label for=""><u>Diagnóstico:</u> </label></div>
                            <div class="col">
                                @php
                                    echo $diagnosticoI;
                                @endphp
                            </div>
                            <!-- Preexistencia u observaciones -->
                            <div class="col-12">
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Preexistencias</label>
                                        <textarea class="form-control preexistencias" name="" id="pre_iluminacion_insuficiente" cols="15" rows="5"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Observaciones</label>
                                        <textarea class="form-control observaciones" id="obs_iluminacion_insuficiente" name="" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Estudios por cargar 
        @for ($i = 0; $i < sizeof($estudios); $i++)
            <div class="col-6">
                <div class="card">
                    <div class="card-header fondo2">
                        {{$estudios[$i]->estudio->nombre}}
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col">
                                <label for="">Diagnóstico: </label>
                                <textarea class="form-control" name={{$i}}  cols="15" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor-->
    </div>   
</div>