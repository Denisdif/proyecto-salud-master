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
        <!-- Estudios por cargar -->
        <!-- HIDDEN -->
        <div class="row">
            <input type="text" id="cantTipo" value={{sizeof($estudios)}} hidden>
        </div>
        @for ($i = 0; $i < sizeof($estudios); $i++)
            <!-- HIDDEN -->
            <input type="text" id="cantEstudio{{$i}}" value={{sizeof($estudios[$i][1])}} hidden>
            <div class="col-6">
                <div class="card">
                    <div class="card-header fondo2">
                        {{$estudios[$i][0]->nombre}} {{sizeof($estudios[$i][1])}}
                    </div>
                    <div class="card-body">
                        <!-- Inputs de estudios por cada tipo de estudio -->
                        @for ($j = 0; $j < sizeof($estudios[$i][1]); $j++)
                            <div class="row form-group">
                                <div class="col-10">
                                    <label for="">{{$estudios[$i][1][$j]->nombre}}: </label>
                                    <input class="form-control preexistencias observaciones" type="text"  id="POinput_{{$i}}_{{$j}}">
                                </div>
                                <div class="col-1">
                                    <label><input class="preexistencias observaciones" type="radio" name="POinput_{{$i}}_{{$j}}_check" value="O" checked>Obs</label>
                                </div>
                                <div class="col-1">
                                    <label><input class="preexistencias observaciones" type="radio" name="POinput_{{$i}}_{{$j}}_check" value="P">Pre</label>
                                </div>
                            </div>
                            <hr>
                        @endfor
                    </div>
                </div>
            </div>
        @endfor
    </div>   
</div>