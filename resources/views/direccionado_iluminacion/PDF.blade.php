<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Iluminación Insuficiente</title>

    <style>
        h1{
            font-weight: bold;
            font-size: 25px;
            padding-bottom: 20px;
        }
        h2{
            font-weight: bold;
            text-decoration: underline;
            font-size: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        h3{
            font-weight: bold;
            font-size: 15px;
        }}
        label{
            font-weight: bold;
        }
        .datos{
            font-size: 12px;
        }
    </style>

</head>
<body style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h1 class="titulo" style="text-align: center"> Agente: Iluminación Insuficiente <br> Cuestionario Direccionado </h1>
        
        <!-- Criterio -->
        <h2>Criterio de exposición al riesgo                               </h2>
        <p class="datos"> Está orientado a trabajadores de minas o galerías subterráneas </p>

        <!-- Empresa -->
        <h2>Datos de la empresa o establecimiento                          </h2>
        <table>
            <tbody>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                       <label for=""> Nombre:                   </label>    
                           {{$iluminacion->voucher->paciente->origen->definicion           }}  
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                       <label for=""> CUIT:                      </label>    
                           {{$iluminacion->voucher->paciente->origen->cuit                 }}  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                       <label for=""> Domicilio:                 </label>    
                           {{$iluminacion->voucher->paciente->origen->domicilio->direccion }}  
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Tabajador -->
        <h2>Datos de la trabajador                                         </h2>
        <table>
            <tbody>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for=""> Nombre completo:                   </label>    
                            {{$iluminacion->voucher->paciente->nombreCompleto()             }}  
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for=""> CUIL/DNI N°:                       </label>    
                            {{$iluminacion->voucher->paciente->cuil                         }}  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for=""> Sexo:                              </label>    
                            {{$iluminacion->voucher->paciente->sexo->definicion             }}  
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for=""> Fecha de nacimiento:               </label>    
                            {{$iluminacion->voucher->paciente->fecha_nacimiento()           }}  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for=""> Puesto de trabajo:                 </label>    
                            {{$iluminacion->puesto                                          }}  
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for=""> Antigüedad en la empresa:          </label>    
                            {{$iluminacion->antiguedad                                      }}  
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Antecedentes -->
        <h2>Antecedentes                                                   </h2>
        <table>
            <tbody>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for=""> Antecedentes de enfermedades:                                            </label>    
                            {{$iluminacion->enfermedades                                    }}  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for=""> Antecedentes de trastornos congénitos:                                   </label>    
                            {{$iluminacion->transtornos_congenitos                          }}  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for=""> Antecedentes de enfermedades profesionales o accidentes de trabajo:      </label>    
                            {{$iluminacion->enfermedades_profecionales                      }}  
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Exposición al riesgo -->
        <h2>Exposición al riesgo                                           </h2>
        <table>
            <tbody>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for="">Exposición anterior:                </label>
                        <p>{{$iluminacion->exposicion_anterior           }}  </p>  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for="">Exposición actual:                  </label>
                        <p>{{$iluminacion->exposicion_actual             }}  </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Salto de página -->
        <div style="page-break-after:always;"></div>

        <!-- Examen clínico -->
        <h2>Examen clínico                                                 </h2>
        <h3>Presencia de:                                                  </h3>
        <table>
            <tbody>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Cefaleas:                                       </label>    
                            {{$iluminacion->cefaleas          }}  
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Visión doble:                                   </label>    
                            {{$iluminacion->vision_doble          }}  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Mareos / Vértigo:                               </label>    
                            {{$iluminacion->mareo_vertigo          }}  
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Conjuntivitis:                                  </label>    
                            {{$iluminacion->conjuntivitis          }}  
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Visión borrosa:                                 </label>    
                            {{$iluminacion->vision_borrosa          }}  
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Presencia de inseguridad en posición de pie:    </label>    
                            {{$iluminacion->inseguridad_de_pie          }}  
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Examen ocular -->
        <h2>Examen ocular                                                  </h2>
        <h3>Ojos:                                                          </h3>
        <table>
            <tbody>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Centrados:                                       </label>    
                            @if ($iluminacion->no_centrados           )
                                No
                            @else
                                Si
                            @endif   
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Pupilase:                                        </label>    
                            @if ($iluminacion->pupilas_anormales           )
                                Anormal 
                            @else
                                Normal
                            @endif   
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Conjuntivas:                                     </label>    
                            @if ($iluminacion->conjuntivas_anormales           )
                                Anormal 
                            @else
                                Normal
                            @endif   
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Córneas:                                         </label>    
                            @if ($iluminacion->corneas_anormales           )
                                Anormal 
                            @else
                                Normal
                            @endif   
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Motilidad ocular:                                </label>    
                            @if ($iluminacion->motilidad_anormal           )
                                Anormal 
                            @else
                                Normal
                            @endif   
                    </td>
                    <td class="datos" style="text-align: left; width: 350px">
                        <label for="">Nistagmus:                                       </label>    
                            @if ($iluminacion->nistagmus_ausente           )
                                Ausente
                            @else
                                Presente
                            @endif   
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="datos" style="text-align: left;">
                        <label for="">Informe:                                       </label>    
                        {{$iluminacion->informe_ocular}}
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>Agudeza visual:                                                </h3>
        <table>
            <tbody>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for="">Con correción:                                       </label>    
                        {{$iluminacion->av_correccion}}
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for="">Sin correción:                                       </label>    
                        {{$iluminacion->av_sin_correccion}}
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for="">Fecha y hora:                                        </label>    
                        {{$iluminacion->created_at}}
                    </td>
                </tr>
                <tr>
                    <td class="datos" style="text-align: left; width: 700px">
                        <label for="">Observaciones:                                       </label>    
                        {{$iluminacion->observaciones}}
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</body>
</html>