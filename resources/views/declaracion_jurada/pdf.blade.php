<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <title>Declaracion Jurada</title>
</head>
<body>

    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">DECLARACION JURADA DE SALUD</h3>


        <!-- DATOS PERSONALES -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>DATOS PERSONALES</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
              <th colspan="4">Apellidos y Nombres Completos: </th>
              <td colspan="3" style="text-align: left">{{$declaracion_jurada->voucher->paciente->nombreCompleto()}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th width="5%" >Sexo: </th>
                <td width="5%" style="text-align: left">{{$declaracion_jurada->voucher->paciente->sexo->abreviatura }}</td>
                <th width="25%">Fecha de Nacimiento: </th>
                <td width="15%" style="text-align: left">{{Carbon\Carbon::parse($declaracion_jurada->voucher->paciente->fecha_nacimiento)->format('d/m/Y') }}</td>
                <th width="10%">Lugar: </th>
                <td colspan="2" width="40%" style="text-align: left">{{$declaracion_jurada->voucher->paciente->lugarNacimiento() }}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="3" >Documento de identidad: </th>
                <td colspan="2" style="text-align: left">{{$declaracion_jurada->voucher->paciente->documentoIdentidad() }}</td>
                <th>Estado Civil: </th>
                <td style="text-align: left">{{$declaracion_jurada->voucher->paciente->estadoCivil->abreviatura }}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2" >Domicilio: </th>
                <td colspan="3" style="text-align: left">{{$declaracion_jurada->voucher->paciente->direccion() }}</td>
                <th>Localidad: </th>
                <td style="text-align: left">{{$declaracion_jurada->voucher->paciente->ciudad->nombre }}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2" >Provincia: </th>
                <td colspan="1" style="text-align: left">{{$declaracion_jurada->voucher->paciente->domicilio->ciudad->provincia->nombre }}</td>
                <th>CP: </th>
                <td style="text-align: left">{{$declaracion_jurada->voucher->paciente->domicilio->ciudad->codigo_postal }}</td>
                <th>TE: </th>
                <td style="text-align: left" width="30%">{{$declaracion_jurada->voucher->paciente->telefono }}</td>

            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1" >Peso (Kgrs.): </th>
                <td colspan="1" style="text-align: left">{{$declaracion_jurada->voucher->paciente->peso }}</td>
                <th colspan="1">Estatura: (Mts.) </th>
                <td style="text-align: left">{{$declaracion_jurada->voucher->paciente->estatura }}</td>
                <th colspan="2">FECHA ÚLTIMO EXAMEN </th>
                <td style="text-align: left">...</td>
            </tr>
        </table>


        <!-- ANTECEDENTES FAMILIARES -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>ANTECEDENTES FAMILIARES</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="2">¿Su padre vive? </th>
                <td  colspan="2" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteFamiliar->su_padre_vive==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">¿Su madre vive? </th>
                <td colspan="2" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteFamiliar->su_madre_vive==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="8"> ¿Su madre o padre padece alguna de las siguientes afecciones? </th>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Cancer </th>
                <td  colspan="2" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteFamiliar->cancer==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Diabetes </th>
                <td  colspan="2" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteFamiliar->diabetes==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Infarto </th>
                <td  colspan="2" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteFamiliar->infarto==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Hipertension Arterial </th>
                <td  colspan="2" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteFamiliar->hipertension_arterial==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="8"> Si su padre o madre padecen alguna enfermedad actualmente </th>
            </tr>
            <tr>
                <th colspan="2">Mencione el diagnóstico</th>
                <td style="text-align: left" colspan="6">{{$declaracion_jurada->antecedenteFamiliar->detalle}}</td>
            </tr>
        </table>


        <!-- ANTECEDENTES PERSONALES -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>ANTECEDENTES PERSONALES</b></h5>
        <table class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Fuma </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedentePersonal->fuma==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">¿En que cantidad? </th>
                <td style="text-align: left" colspan="3">{{$declaracion_jurada->antecedentePersonal->detalle1_p}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Bebe </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedentePersonal->bebe==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">¿En que cantidad? </th>
                <td style="text-align: left" colspan="3">{{$declaracion_jurada->antecedentePersonal->detalle2_p}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Act. Física </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedentePersonal->actividad_fisica==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">¿En que cantidad? </th>
                <td style="text-align: left" colspan="3">{{$declaracion_jurada->antecedentePersonal->detalle3_p}}</td>
            </tr>
        </table>


        <!-- ANTECEDENTES PERSONALES -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>ANTECEDENTES MÉDICOS DE LA INFANCIA</b></h5>
        <table  class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="12"> ¿Padeció algunas de las siguientes afecciones? </th>
            </tr>

            <tr style="text-align: left" valign="middle">
                <th colspan="2">Sarampión </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->sarampion==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Rubéola </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->rubeola==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Epilepsias </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->epilepsia==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Varicela </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->varicela==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Parotiditis </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->parotiditis==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Cefalea prolongada </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->cefalea_prolongada==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Hepatitis </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->hepatitis==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Gastritis </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->gastritis==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Úlcera gástrica </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->ulcera_gastrica==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Hemorroide </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->hemorroide==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Hemorragias </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->hemorragias==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Neumonia </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->neumonia==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="2">Asma </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->asma==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Tuberculosis </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->tuberculosis==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Tos cronica </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->tos_cronica==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <th colspan="2">Catarro </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteMedicoInfancia->catarro==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="8">Otras Afecciones: </th>
                <td style="text-align: left" colspan="4">{{$declaracion_jurada->antecedenteMedicoInfancia->otras_afecciones}}</td>
            </tr>
        </table>



        <!-- ANTECEDENTES RECIENTES -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>¿ Ha tenido Ud. O ha sido tratado en los últimos años por:</b></h5>
        <table  class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Enfermedad de los ojos, oidos , nariz o garganta ? </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta1_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>

            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle1_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Mareos, desmayos, convulsiones, dolores de cabeza, parálisis o ataques, desordenes mentales o nerviosos ? </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta2_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle2_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Insuficiencia respiratoria, ronquera persistente, tos, asma, bronquitis, enfisema, tuberculosis o enfermedad respiratoria crónica ? </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta3_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle3_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Dolor de pecho, palpitaciones, presión sanguínea, fiebre reumática, ataque al corazón u otra enfermedad del corazón o vasos sanguíneos ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta4_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle4_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Ictericia, hemorragia intestinal, úlcera, colitis, diverticulosis, otras enfermedades del intestino, hígado o vesícula ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta5_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle5_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Azúcar, sangre o pus en la orina, enfermedad del riñón, vejiga o próstata ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta6_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle6_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Diabetes, Tiroides u otra enfermedad endócrinas?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta7_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle7_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Gota, Afecciones musculares u óseas, incluidos columna, espalda o articulaciones ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta8_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle8_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Deformidades, rengueras o amputaciones ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta9_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle9_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Enfermedades de la piel ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta10_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle10_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Alergias, anemias u otras enfermedades de la sangre ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta11_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle11_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Está Ud. Actualmente bajo observación o tratamiento ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta12_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle12_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">Ha tenido algún cambio en su peso en el último año ?</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta13_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle13_reciente}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">HERNIA</th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteReciente->pregunta14_reciente==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">¿Cuáles? </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteReciente->detalle14_reciente}}</td>
            </tr>
        </table>

        <!-- ANTECEDENTES QUIRURGICOS -->
        <h5 style="text-align: center; background-color: brown; color: #FFFFFF"><b>ANTECEDENTES QUIRURGICOS: </b></h5>
        <table  class="table table-condensed table-hover" style="border:1px solid #FFFFFF; width:100%">
            <tr style="text-align: left" valign="middle">
                <th colspan="7"> ¿Fue intervenido/a quirúrgicamente por alguna causa? </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteQuirurjico->pregunta1_q==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">  ¿Tiene pendiente alguna cirugía?  </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteQuirurjico->pregunta2_q==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1"> Por favor detallar Diagnóstico y fecha:  </th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteQuirurjico->detalle2_q}}</td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="7">  ¿Padece alguna otra enfermedad no especificada en el interrogatorio anterior?  </th>
                <td  colspan="1" style="text-align: left">
                    @if ($declaracion_jurada->antecedenteQuirurjico->pregunta3_q==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
            </tr>
            <tr style="text-align: left" valign="middle">
                <th colspan="1">  ¿Cuál?</th>
                <td style="text-align: left" colspan="7">{{$declaracion_jurada->antecedenteQuirurjico->detalle3_q}}</td>
            </tr>
        </table>
        Por la presente declaro bajo juramento que los datos de la presente declaración, de mi puño y letra, son reales y corresponden a mi Historia Clínica Personal.
        <br>
        <br>
        Lugar y Fecha: Puerto Rico {{Carbon\Carbon::parse($declaracion_jurada->fecha_realizacion)->format('d/m/Y') }}
        <br><br>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div>
                    <img src="{{$declaracion_jurada->firma}}" width=130 height=130 alt="firma del paciente">
                    
                </div>
                <label>Firma del Paciente</label>
            </div>
        
            <!--Fecha de Realización -->
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div>
                    <img src="{{$declaracion_jurada->personalClinica->firma}}" width=130 height=130 alt="firma del médico">
                </div>
                <label>Firma del Médico</label>
            </div>
        </div>


        
    </div>




    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>




 <!-- Bootstrap 3.3.5 -->
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>




   <!-- AdminLTE App -->
 <script src="{{asset('js/app.min.js')}}"></script>

 <script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 800, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>


</body>
</html>
